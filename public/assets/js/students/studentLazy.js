$(document).ready(function() {
    $('.itemStudent').each(function() {
        var $currentItem = $(this);

        $currentItem.waitForImages(function() {
            $currentItem.find('.contentItems').removeClass('hidden');
            $currentItem.find('.lazy-placeholder').remove();
            $currentItem.lazy();
        });
    });
    $('.img-classes').waitForImages(function() {
        $(this).find('.cntnTopImage').removeClass('hidden');
        $(this).find('.lazy-placeholder').remove();
    });
    $('.teachers-class').waitForImages(function() {
       $(this).find('.contentTeachersClass').removeClass('hidden');
       $(this).find('.placeHolderTeacherClass').remove(); 
    });
});