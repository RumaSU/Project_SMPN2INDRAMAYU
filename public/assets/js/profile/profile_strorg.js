$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    

    $('#_filLftImg, #_filRghtImg').change(function() {
        $('#_btnSubmitImageOrgStrc').show();
        setTimeout(() => {
            $('#_btnSubmitImageOrgStrc').removeClass('opacity-0 invisible');
        }, 50);
    });
    $('#_btnInpImageLft').click(function() {
        var $idInput = $('#_filLftImg');
        var $idInputToken = $('#_tokenResetLftImg');
        var $idPrev = $('#_imgStrcOrgLft');
        $idInput.click();
        
        $idInput.change(function () {
            setPrevImage(this, $idPrev, $idInputToken);
        });
    });
    $('#_btnInpImageRght').click(function() {
        var $idInput = $('#_filRghtImg');
        var $idInputToken = $('#_tokenResetRghtImg');
        var $idPrev = $('#_imgStrcOrgRght');
        $idInput.click();
        
        $idInput.change(function () {
            setPrevImage(this, $idPrev, $idInputToken);
        });
    });
    $('#_btnResetImageLft').click(function() {
        var $idInput = $('#_filLftImg');
        var $idBtn = $('#_btnResetImageLft');
        var $idInputToken = $('#_tokenResetLftImg');
        var $idPrev = $('#_imgStrcOrgLft');
        
        setResetImage($idInput, $idPrev);
        setTokenResetImage($idInputToken, $idBtn);
    });
    $('#_btnResetImageRght').click(function() {
        var $idInput = $('#_filRghtImg');
        var $idBtn = $('#_btnResetImageRght');
        var $idInputToken = $('#_tokenResetRghtImg');
        var $idPrev = $('#_imgStrcOrgRght');
        
        setResetImage($idInput, $idPrev);
        setTokenResetImage($idInputToken, $idBtn);
    });
    
    /**
     *  function
     */
    function setPrevImage(input, $idPrev, $idInputToken) {
        const previewImg = $idPrev;
        const file = input.files[0];
        if (file){
            let img = new Image();
            img.src = URL.createObjectURL(file);
            
            img.onerror = function() {
                alert("Gagal memuat gambar. Pastikan file yang Anda pilih ada gambar yang valid");
                previewImg.attr('src', window.location.origin + '/assets/img/dumb/imgtemp 4.jpg');
                $(input).val('');
            }
            img.onload = function() {
                previewImg.attr('src', img.src);
                $idInputToken.val('');
            }
        }
    }
    function setResetImage($idInput, $idPrev) {
        $idInput.val('');
        $idPrev.attr('src', window.location.origin + '/assets/img/dumb/imgtemp 4.jpg');
        // $idInputToken
    }
    function setTokenResetImage($idInputToken, $idBtn) {
        var $dataAction = $idBtn.data('actionOrgstrcReset');
        var $urlToken = window.location.origin + '/profil/resetimgtoken';
        $.ajax({
            type: "POST",
            url: $urlToken,
            data: {
                dataAction: $dataAction,
            },
            success: function (response) {
                // console.log(response.tokenImage);
                $idInputToken.val(response.tokenImage);
                $('#_btnSubmitImageOrgStrc').show();
                setTimeout(() => {
                    $('#_btnSubmitImageOrgStrc').removeClass('opacity-0 invisible');
                }, 50);
            }
        });
        console.log($dataAction);
    }
});

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}