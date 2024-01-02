$(document).ready(function () {
    let contentImage = ['.schollLogoBall', '.imgSchool', '.mgSogImg', '.mgsImg' ]
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    $('.topHeaderPageProfileSchool').waitForImages(function() {
        $(this).find('.lazy-placeholder').remove();
        $(this).find('.cntnTopImage').show();
    });
    $.each(contentImage, function (idx, val) {
        $(val).waitForImages(function() {
            $(this).find('.lazy-placeholder').remove();
            $(this).find('img').show();
        })
    });
});

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}