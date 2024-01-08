$(document).ready(function () {
    let $isOpenLogoDesc = false; 
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    
    $('#_spnBtnEdPgOsTop').click(function() {
        var $containerFrm = $('.containerFrmOsisLogoBall');
        var $urlView = window.location.href + '/formload';
        
        $containerFrm.empty();
        if(!$isOpenLogoDesc) {
            $isOpenLogoDesc = true;
            $.ajax({
                type: "GET",
                url: $urlView,
                success: function (data) {
                    $elmFrm = $(data).get(4).outerHTML;
                    $containerFrm.append($elmFrm);
                    
                    $containerFrm.waitForImages(function() {
                        $('.contentDisplayOsLg').hide();
                        $containerFrm.show();
                    });
                },
                complete: function() {
                    $isOpenLogoDesc = false;
                    var $urlGet = window.location.href + '/page/logodesc';
                    $.ajax({
                        type: "GET",
                        url: $urlGet,
                        success: function (response) {
                            var $imgLogo = response.logo;
                            var $description = response.description;
                            
                            $containerFrm.find('.osisLogoBall img').attr('src', window.location.origin + $imgLogo);
                            $containerFrm.find('.osisDesc .contentDesc textarea').html($description);
                        }
                    });
                },
            });
        }
    });
});


$(document).on('click', '#_cncEdPgOs', function() {
    var $containerFrm = $('.containerFrmOsisLogoBall');
    $containerFrm.hide();
    $('.contentDisplayOsLg').show();
    $containerFrm.empty();
});

$(document).on('change', '#lgoBallImg', function(event) {
    var $originUrl = window.location.origin;
    const previewImg = $('#prevBgBallOsis');
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
            previewImg.removeClass('grayscale');
        }
    }
});

function getDataLogoDescOsis() {
    
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}