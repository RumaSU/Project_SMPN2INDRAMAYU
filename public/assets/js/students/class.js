$(document).ready(function() {
    $('.itemClass').each(function() {
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
    
    setTimeout(() => {
        $('.errorSomething').remove();
        $('.succedSomething').remove();
        $('.updateSomething').remove();
    }, 3000);
    // $('.itemStudent .contentItems').removeClass('hidden');
    // $('.itemStudent .contentItems').prev().remove();
    // $('.itemStudent').load("kelas/getData", "data", function (response, status, request) {
    //     // this; // dom element
    //     if (status == 'success') {
    //         $('.lazy-placeholder').remove();
    //         var data = JSON.parse(response);
            
    //         let contentItem = $(this).find('contentItems');   
            
    //     } else {
    //         alert('error url');
    //     }
    // });
    // $(selector).load("url", "data", function (response, status, request) {
    //     this; // dom element
        
    // });
    // $.ajax({
    //     type: "GET",
    //     url: "kelas/getKelas",
    //     data: "data",
    //     dataType: "dataType",
    //     success: function (response) {
            
    //     }
    // });
});