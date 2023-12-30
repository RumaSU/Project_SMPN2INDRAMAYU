$(document).ready(function () {
    let linkActive = ["facebook-active", "instagram-active", "twitter-active", "tiktok-active", "youtube-active", "emails-active"];
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    $('#btrcr-fm, .buttonAddStudent').click(function() {
        let $popForm = $('#pop-upFormAddStudent');
        var $nowUrl = window.location.href;
        var $urlLoad = window.location.origin + '/siswa/formload';
        
        getElementFormLoad();
        $popForm.show();
        
        $popForm.find('form').attr('action', $nowUrl);
        
        putTokenToForm();
        $('#overlayPopUp').removeClass('hidden');
        $('body').addClass('overflow-hidden');
    });
    
    $('#btrpp-clsFrm').click(function(){
        let $popForm = $('#pop-upFormAddStudent');
        var $nowUrl = window.location.origin;
        
        $popForm.hide();
        $('#overlayPopUp').addClass('hidden');
        $('body').removeClass('overflow-hidden');
        
        $popForm.find('#nameFrmStudent, #imgFrmStudent, #nisFrmStudent').val('');
        $popForm.find('form').attr('action', '');
        $popForm.find('img').attr('src', $nowUrl + '/assets/img/dumb/imgtemp 1.jpg');
        
        linkActive.forEach(link => {
            const linkEvent = $(`#${link}`);
            const inpLnkTeachers = linkEvent.parent().next().find('input');
            const dvBgLabelCheck = linkEvent.prev().find('label div');
            const ballRollLabelCheck = linkEvent.prev().find('label div span');
            
            linkEvent.val('');
            linkEvent.attr('aria-checked', 'false');
            dvBgLabelCheck.css('backgroundColor', '');
            ballRollLabelCheck.css({
                'backgroundColor': '',
                'borderColor': '',
                'left': '0',
                'transform': 'translate(0, -50%)',
            });
            inpLnkTeachers.removeClass('opacity-0');
            setTimeout(() => {
                inpLnkTeachers.addClass('hidden');
            }, 50);
        });
    });
    
    function getElementFormLoad() {
        var rootFormElement = $('#pop-upFormAddStudent');
        var $nowUrl = window.location.origin;
        $.ajax({
            type: "GET",
            url: $nowUrl + '/siswa/formload',
            success: function (data) {
                elementForm = $(data).get(0).outerHTML;
                console.log(elementForm);
                rootFormElement.append(elementForm);

                var $elementForm = rootFormElement.find('.frmAddStudent');
                $elementForm.waitForImages(function() {
                    rootFormElement.find('.lazyLoadFormStudent').remove()
                    $elementForm.show();
                })
            },
            error: () => {
            }
        });
    }
});

function putTokenToForm() {
    var $nowUrl = window.location.origin;
    var $getPathName = window.location.pathname;
    var $idClass = (window.location.href).split('?ic=');
    var $splitGet = $getPathName.split('/');
    var $gradeClass = $splitGet[3];
    var $tagClass = $splitGet[4];

    $.ajax({
        type: "POST",
        url: $nowUrl + '/siswa/formtoken',
        data: {
            gradeClass: $gradeClass,
            tagClass: $tagClass,
            idClass: $idClass[1],
        },
        success: function (response) {
            var tokenForm = response.tokenForm;
            $('#_tokenFormStudent').val(tokenForm);
            // alert('succes, token is ' + tokenForm);
        },
        error: () => {
            // alert('error');
        }
    });
    
}

$(document).on('change', '#imgFrmStudent', function(event) {
    const previewImg = $('#previewImage');
    const file = event.target.files[0];
    if (file){
        let img = new Image();
        img.src = URL.createObjectURL(file);
        
        img.onerror = function() {
            alert("Gagal memuat gambar. Pastikan file yang Anda pilih ada gambar yang valid");
            previewImg.attr('src', '');
            $(this).val('');
        }
        img.onload = function() {
            previewImg.attr('src', img.src);
        }
    }
});


function getURL() {
    return window.location.href;
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}