let $numNameInpMi = 2;

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    /**
        * Click visi misi image
     */
    $('#_filImgViMi').change(function() {
        $('#_btnSubmitImageViMi').show();
        setTimeout(() => {
            $('#_btnSubmitImageViMi').removeClass('opacity-0 invisible');
        }, 50);
    });
    $('#_btnInpImageViMi').click(function() {
        var $idInput = $('#_filImgViMi');
        var $idInputToken = $('#_tokenResetImgViMi');
        var $idPrev = $('#_imgViMiView');
        $idInput.click();
        
        $idInput.change(function () {
            setPrevImage(this, $idPrev, $idInputToken);
        });
    });
    $('#_btnResetImageViMi').click(function() {
        var $idInput = $('#_filImgViMi');
        var $idBtn = $('#_btnResetImageViMi');
        var $idInputToken = $('#_tokenResetImgViMi');
        var $idPrev = $('#_imgViMiView');
        
        setResetImage($idInput, $idPrev);
        setTokenResetImage($idInputToken, $idBtn);
    });
    
    /**
     * function
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
        $idPrev.attr('src', window.location.origin + '/storage/images/pages/profile/default.png');
        // $idInputToken
    }
    function setTokenResetImage($idInputToken, $idBtn) {
        var $dataAction = $idBtn.data('actionVimiReset');
        console.log($idBtn);
        console.log($dataAction);
        var $urlToken = window.location.origin + '/profil/resetimgtoken';
        $.ajax({
            type: "POST",
            url: $urlToken,
            data: {
                dataAction: $dataAction,
            },
            success: function (response) {
                $idInputToken.val(response.tokenImage);
                $('#_btnSubmitImageViMi').show();
                setTimeout(() => {
                    $('#_btnSubmitImageViMi').removeClass('opacity-0 invisible');
                }, 50);
            }
        });
    }
});
/**
    * Click visi misi
*/
$(document).on('click', '.delItmInp', function() {
    $itmInpField = $(this).closest('.itmInpMi');
    $itmInpField.remove();
});

$(document).on('click', '.btnEdVisiMisi', function() {
    $containerFrmViMi = $('.frmViMiProfile');
    $containerFrmViMi.empty();
    
    getViMiLoad();
    $('.liMiProfile, .visiProfile').hide();
    $urlTo = window.location.origin + '/profile/formload';
    $.ajax({
        type: "GET",
        url: $urlTo,
        success: function (data) {
            var $elementForm = $(data).get(2).outerHTML;
            
            $containerFrmViMi.append($elementForm);
            getDataViMi();
        }
    });
});
$(document).on('click', '#cancelEdViMi', function() {
    getViMiLoad();
    $('.frmViMiProfile form').remove();
    
    setTimeout(() => {
        $('.frmViMiProfile').empty();
        $('.liMiProfile, .visiProfile').show();
    }, 500);
    $numNameInpMi = 2; 
});
$(document).on('click', '#addMisiProfile', function() {
    var $containerListMisi = $('#containerListInpMiProfile');
    $containerListMisi.append('<div class="itmInpMi relative flex items-center gap-4"><i class="bi bi-check-circle-fill text-2xl text-blue-600"></i><div class="inpField w-full flex items-center gap-2"><textarea name="misiProfil_'+$numNameInpMi+'" id="misiProfil_'+$numNameInpMi+'" class="resize-none w-full py-1 px-2 border border-black rounded-lg focus:outline-none"></textarea><div class="delElemn"><span role="button" class="delItmInp border border-red-800 p-1.5 rounded-md bg-red-100 transition-all group hover:bg-red-600"><i class="bi bi-trash-fill text-red-600 transition-all group-hover:text-red-50"></i></span></div></div></div>');
    $numNameInpMi += 1; 
});
$(document).on('input', '.frmViMiProfile form textarea', function() {
    var $txtarInp = this;
    $txtarInp.style.height = 'auto';
    $txtarInp.style.height = (($txtarInp.scrollHeight) + 2) + 'px';
});



function getDataViMi() {
    var $rootInpViMi = $('.frmViMiProfile');
    var $containerFrmViMi = $('.frmViMiProfile');
    var $inpVi = $rootInpViMi.find('#visiProfile');
    var $inpLiMi = $rootInpViMi.find('#containerListInpMiProfile');
    
    var $urlGet = window.location.origin + '/profil/getdatavimi';
    
    $.ajax({
        type: "GET",
        url: $urlGet,
        success: function (response) {
            // if (response) {
            //     var valueVisi = response.valVisi;
            //     var valueMisi = response.valMisi;
                
            //     $inpVi.html(valueVisi);
            //     $.each(valueMisi, function (idx, valMi) {
            //         $inpLiMi.append('<div class="itmInpMi relative flex items-center gap-4"><i class="bi bi-check-circle-fill text-2xl text-blue-600"></i><div class="inpField w-full flex items-center gap-2"><textarea name="misiProfil_'+ (idx+1) +'" id="misiProfil_'+ (idx+1) +'" class="resize-none w-full py-1 px-2 border border-black rounded-lg focus:outline-none">'+ valMi.misi +'</textarea><div class="delElemn"><span role="button" class="delItmInp border border-red-800 p-1.5 rounded-md bg-red-100 transition-all group hover:bg-red-600"><i class="bi bi-trash-fill text-red-600 transition-all group-hover:text-red-50"></i></span></div></div></div>');
            //     });
            // }
            if (response && response.valVisi && response.valMisi && response.valMisi.length > 0) {
                var valueVisi = response.valVisi;
                var valueMisi = response.valMisi;

                $inpVi.html(valueVisi);
                $numNameInpMi = valueMisi.length + 1;
                $.each(valueMisi, function (idx, valMi) {
                    $inpLiMi.append('<div class="itmInpMi relative flex items-center gap-4"><i class="bi bi-check-circle-fill text-2xl text-blue-600"></i><div class="inpField w-full flex items-center gap-2"><textarea name="misiProfil_'+ (idx+1) +'" id="misiProfil_'+ (idx+1) +'" class="resize-none w-full py-1 px-2 border border-black rounded-lg focus:outline-none">'+ valMi.misi +'</textarea><div class="delElemn"><span role="button" class="delItmInp border border-red-800 p-1.5 rounded-md bg-red-100 transition-all group hover:bg-red-600"><i class="bi bi-trash-fill text-red-600 transition-all group-hover:text-red-50"></i></span></div></div></div>');
                });
            } else {
                $inpLiMi.append('<div class="itmInpMi relative flex items-center gap-4"><i class="bi bi-check-circle-fill text-2xl text-blue-600"></i><div class="inpField w-full flex items-center gap-2"><textarea name="misiProfil_1" id="misiProfil_1" class="resize-none w-full py-1 px-2 border border-black rounded-lg focus:outline-none"></textarea><div class="delElemn"><span role="button" class="delItmInp border border-red-800 p-1.5 rounded-md bg-red-100 transition-all group hover:bg-red-600"><i class="bi bi-trash-fill text-red-600 transition-all group-hover:text-red-50"></i></span></div></div></div>');
                // Tambahkan logika jika data tidak ditemukan
                // $rootInpViMi.html('Data tidak tersedia');
            }
            
            
            $('.formElementViMiProfile').waitForImages(function() {
                $containerFrmViMi.find('.lzyPlaceHolder').remove();
                // setTimeout(() => {
                // }, 75);
                $('.formElementViMiProfile').show();
            });
        },
        error: function() {
            $('.frmViMiProfile').empty();
            $('.liMiProfile, .visiProfile').show();
        }
    });
}

function getViMiLoad() {
    var $containerFrmViMi = $('.frmViMiProfile');
    
    var $urlTo = window.location.origin + '/profile/formload';
    $.ajax({
        type: "GET",
        url: $urlTo,
        success: function (data) {
            var $loadElement = $(data).get(0).outerHTML;
            $containerFrmViMi.append($loadElement);
        }
    });
}


function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}