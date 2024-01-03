$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    
    $('#_spnBtnEdPgOsTop').click(function() {
        var $containerFrm = $('.containerFrmSchllLogoBall');
        var $urlView = window.location.href + '/formload';
        
        $containerFrm.empty();
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
            }
        });
    });
    $('.edStatOsis').click(function() {
        getElemOsisStat();
    })
});
$(document).on('click', '#_cnclChsStdn', function() {
    $('#containerFormStatOsis').empty();
    $('#containerFormStatOsis').hide();
    $('#containerDisplayStatOsis').show();
    
});

$(document).on('keyup keypress', '#searchStdLe, #searchStdMem', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
$(document).on('keyup', '#searchStdLe', function() {
    var value = $(this).val().toLowerCase();
    $('.liStdntChsLe ul li').filter(function() {
        var text = $(this).text().toLowerCase();
        $(this).toggle(text.indexOf(value) > -1);
        $('#shwLiChsLeStdnt').prop('checked', 'checked');
    });
});
$(document).on('keyup', '#searchStdMem', function() {
    var value = $(this).val().toLowerCase();
    $('.liStdntChsMemr ul li').filter(function() {
        var text = $(this).text().toLowerCase();
        $(this).toggle(text.indexOf(value) > -1);
        $('#shwLiChsMemrStdnt').prop('checked', 'checked');
    });
});


$(document).on('keyup keypress', '#myForm' ,function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
      e.preventDefault();
      return false;
    }
  });

$(document).on('click', '#_cncEdPgOs', function() {
    var $containerFrm = $('.containerFrmSchllLogoBall');
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

function getElemOsisStat() {
    var $containerElem = $('#containerFormStatOsis');
    var $urlElem = window.location.href + '/formload';
    $.ajax({
        type: "GET",
        url: $urlElem,
        success: function (data) {
            var $elemFrm = $(data).get(6).outerHTML;
            $containerElem.append($elemFrm);
            getDataStudent();
            
            $containerElem.waitForImages(function() {
                $('#containerDisplayStatOsis').hide();
                $(this).show();
            });
        }
    });
}

function getDataStudent() {
    var $liStdnLeChs = $('#containerFormStatOsis form .liStdntChsLe ul');
    var $liStdnMemChs = $('#containerFormStatOsis form .liStdntChsMemr ul');
    var $urlElem = window.location.href + '/liststudent';
    $.ajax({
        type: "POST",
        url: $urlElem,
        success: function (response) {
            console.log(response);
            if(response) {
                var $datForLeStd = response.listLeStudent;
                var $datForMemStd = response.listMemStudent;
                $.each($datForLeStd, function ($idx, $val) { 
                    $liStdnLeChs.append('<li><label for="chsLeOsisStdn_'+ $val.student_id +'" class="cursor-pointer relative block"><input type="radio" name="stdntLeOsis" id="chsLeOsisStdn_'+ $val.student_id +'" value="'+ $val.student_id +'" class="hidden sr-only peer"><div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm"><div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden"><img src="'+ window.location.origin + '/storage/images/students/' + $val.name_files +'" alt="" class="w-full h-full object-cover object-center"></div><p class="w-full select-none">'+ $val.name +'</p></div><div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible"><i class="bi bi-check-circle-fill text-green-600 text-xl"></i></div></label></li>');
                });
                
                $.each($datForMemStd, function ($idx, $val) { 
                    $liStdnMemChs.append('<li><label for="chsMemOsisStdn_'+ $val.student_id +'" class="cursor-pointer relative block"><input type="checkbox" name="stdntChsMemberOsis'+ $idx +'" id="chsMemOsisStdn_'+ $val.student_id +'" value="'+ $val.student_id +'" class="hidden sr-only peer"><div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm"><div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden"><img src="'+ window.location.origin + '/storage/images/students/' + $val.name_files +'" alt="" class="w-full h-full object-cover object-center"></div><p class="w-full select-none">'+ $val.name +'</p></div><div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible"><i class="bi bi-check-circle-fill text-green-600 text-xl"></i></div></label></li>');
                });
            }
        }
    });
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}