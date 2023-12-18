$(document).ready(function () {
    
    $('.itemStudent').each(function() {
        var $currentItem = $(this);
        var $dataCurrentItem = $currentItem.data('studentId');
        var $currentContent = $currentItem.find('.contentItems');
        var $currentLazy = $currentItem.find('.lazy-placeholder');
        
        $.ajax({
            type: "POST",
            url: "/kelas/siswa/get",
            data: {
                studentId: $dataCurrentItem,
            },
            success: function (response) {
                $currentContent.find('img').attr('src', 'storage/images/students/' + response);
                $currentItem.waitForImages(function() {
                    $currentContent.removeClass('hidden');
                    $currentLazy.remove();
                    $currentItem.lazy();
                    
                });
            }
        });

        $currentItem.waitForImages(function() {
            $currentItem.find('.contentItems').removeClass('hidden');
            $currentItem.find('.lazy-placeholder').remove();
            $currentItem.lazy();
        });
    });
});