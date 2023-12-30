$(document).ready(function () {
    let loadForm = '<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>';
    let linkActive = ["facebook-active", "instagram-active", "twitter-active", "tiktok-active", "youtube-active"];
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    $('#btrcr-fm, .buttonAddStudent').click(function() {
        resetValue();
        let $popForm = $('#pop-upFormAddStudent');
        let $elementForm = $popForm.find('.frmAddStudent');
        
        var $originUrl = window.location.origin;
        var $nowUrl = (window.location.href).split('?ic=');
        
        var $windowHeight = $(window).height();
        var $displayWindowsHeight = $windowHeight * 0.9;
        var $minHeight = $windowHeight * 0.4;

        $popForm.append(loadForm);
        $popForm.height($minHeight);
        $popForm.show();
        
        $elementForm.find('img').attr('src', $originUrl + '/assets/img/dumb/imgtemp 1.jpg');
        $popForm.find('form').attr('action', $nowUrl[0]  + '/store?ic=' + $nowUrl[1]);
        
        $elementForm.waitForImages(function() {
            $popForm.find('.loadWaiting').remove();
            $popForm.height($displayWindowsHeight);
            $elementForm.show();;
        });
        
        putTokenToForm();
        $('#overlayPopUp').removeClass('hidden');
        $('body').addClass('overflow-hidden');
    });
    
    $('#btrpp-clsFrm').click(function(){
        let $popForm = $('#pop-upFormAddStudent');
        var $nowUrl = window.location.origin;
        
        var $windowHeight = $(window).height();
        var $minHeight = $windowHeight * 0.4;
        
        $popForm.height($minHeight);
        
        setTimeout(() => {
            $popForm.hide();
            $popForm.find('.frmAddStudent').hide();
            $('#overlayPopUp').addClass('hidden');
            $('body').removeClass('overflow-hidden');
            
            resetValue();
        },500);
        
    });
    
    function resetValue() {
        let $popForm = $('#pop-upFormAddStudent');
        let $elementForm = $popForm.find('.frmAddStudent');
        
        $elementForm.find('#imgFrmStudent, #nameFrmStudent, #nisFrmStudent').val('');
        $popForm.find('form').attr('action', '');
        $popForm.find('img').attr('src', '');

        let listSocmed = ["facebook", "instagram", "twitter", "tiktok", "youtube"];
        listSocmed.forEach((itemSocmed) => {
            let isActive = '';
            let ariaChecked = 'false';
            
            let inputActive = '#' + itemSocmed + '-active';
            let socmedInput = '#' + itemSocmed + 'Link';
            let styleParentRollActive = "";
            let styleRollActive = "left:0 ; transform: translateX(0, -50%)";
            
            let parentDiv = $(inputActive).prev().find('label div');
            let spanInside = $(inputActive).prev().find('label div span');
            parentDiv.css('backgroundColor', styleParentRollActive);
            spanInside.attr('style', styleRollActive);
            
            $(inputActive).prop('checked', false); // Check/Uncheck checkbox based on itemLink
            $(inputActive).val(isActive).attr('aria-checked', ariaChecked);
            $(socmedInput).val('');
            $(socmedInput).addClass('hidden').addClass('opacity-0');
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

$(document).on('click', '#resetImageStudent', function() {
    var $originUrl = window.location.origin;
    var $getPathName = window.location.pathname;
    
    var $tokenUrl = $originUrl + '/siswa/resetimagetoken';
    var $splitGet = $getPathName.split('/');
    var $idStudent = $('#pop-upFormAddStudent form').attr('action').split('?si=');
    var $gradeClass = $splitGet[3];
    var $tagClass = $splitGet[4];
    
    $.ajax({
        type: "POST",
        url: $tokenUrl,
        data: {
            gradeClass: $gradeClass,
            tagClass: $tagClass,
            idStudent: $idStudent[1],
        },
        success: function (response) {
            $('#_tokenResetImage').val(response.tokenImage);
            
            $('#previewImage').attr('src', $originUrl + '/storage/images/students/siswa.png');
            $('#imgFrmStudent').val('');
        }
    });
});

// $('#resetImageStudent').click(function() {
//     var $originUrl = window.location.origin;
//     $('#previewImage').attr('src', $originUrl + '/storage/images/students/siswa.png');
//     $('#imgFrmStudent').val('siswa.png');
// });

$(document).on('change', '#imgFrmStudent', function(event) {
    var $originUrl = window.location.origin;
    const previewImg = $('#previewImage');
    const file = event.target.files[0];
    if (file){
        let img = new Image();
        img.src = URL.createObjectURL(file);
        
        img.onerror = function() {
            alert("Gagal memuat gambar. Pastikan file yang Anda pilih ada gambar yang valid");
            previewImg.attr('src', $originUrl + '/assets/img/dumb/imgtemp 1.jpg');
            $(this).val('');
        }
        img.onload = function() {
            previewImg.attr('src', img.src);
            $('#_tokenResetImage').val('');
        }
    }
});


function getURL() {
    return window.location.href;
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}