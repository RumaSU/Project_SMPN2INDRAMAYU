let isRequestPopStudentStat = false;
let lazyLoadPopStdntOsChsd = '<div class="lazyLoadPopStatContainer h-72" style="display: "><div class="flex items-center justify-center h-full"><div class="block relative"><div class="border-8 border-gray-600 border-dotted p-12 rounded-[100%] animate-spin"></div></div></div></div>';
let popStdntIfStdntLeNotChsd = '<div class="noOsisLeStdntChoosed px-4"><div class="infStdChsd flex justify-between gap-2 "><div class="std flex items-center gap-2 w-full"><div class="imgStdChsd flex items-center justify-center aspect-[1/1] w-16 rounded-[100%] p-1 shrink-0 bg-gray-200 overflow-hidden"><i class="bi bi-image text-gray-400"></i></div><div class="nm w-full"><div class="t">Tidak ada ketua osis yang terpilih</div></div></div></div></div>';
let popStdntIfStdntMemNotChsd = '<li><div class="noOsisStdntChsd px-4"><div class="std flex items-center gap-2 w-full"><div class="imgStdChsd flex items-center justify-center aspect-[1/1] w-16 rounded-[100%] p-1 shrink-0 bg-gray-200 overflow-hidden"><i class="bi bi-image text-gray-400"></i></div><div class="nm w-full"><div class="t">Tidak ada siswa yang terpilih</div></div></div></div></li>';

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    
    $('.edStatOsis').click(function() {
        if(!isRequestPopStudentStat) {
            isRequestPopStudentStat = true;
            $('.containerEdiStatOsis').empty();
            getElemOsisStat();
        }
    });
});

$('.containerEdiStatOsis #containerFormStatOsis .liStdntChsd ul li, .containerEdiStatOsis #containerFormStatOsis .cntStdntLeChsd .itmStdntChsd').waitForImages(function () {
    $(this).find('.lazyLoadPopStatItem').remove();
    $(this).find('.cntnItmStdntChsd').show();
});

$(document).on('click', '#clsPopupChsStdntOsis', function() {
    $('.containerEdiStatOsis').empty();
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
        // $('#shwLiChsLeStdnt').prop('checked', 'checked');
    });
});
$(document).on('keyup', '#searchStdMem', function() {
    var value = $(this).val().toLowerCase();
    $('.liStdntChsMemr ul li').filter(function() {
        var text = $(this).text().toLowerCase();
        $(this).toggle(text.indexOf(value) > -1);
        // $('#shwLiChsMemrStdnt').prop('checked', 'checked');
    });
});

$(document).on('change', '#shwLiChsLeStdnt', function() {
    if($(this).is(':checked')) {
        
    }
});


// function getElemOsisStat() {
//     var $containerElem = $('#containerFormStatOsis');
//     var $urlElem = window.location.href + '/formload';
//     $.ajax({
//         type: "GET",
//         url: $urlElem,
//         success: function (data) {
//             var $elemFrm = $(data).get(6).outerHTML;
//             $containerElem.append($elemFrm);
//             getDataStudent();
            
//             $containerElem.waitForImages(function() {
//                 $('#containerDisplayStatOsis').hide();
//                 $(this).show();
//             });
//         }
//     });
// }

function getElemOsisStat() {
    var $containerElem = $('.containerEdiStatOsis');
    var $urlElem = window.location.href + '/member/formload';
    
    $('.containerEdiStatOsis').empty();            
    $.ajax({
        type: "GET",
        url: $urlElem,
        success: function (data) {
            var $elemFrm = $(data).get(0).outerHTML;
            $containerElem.append($elemFrm);
            getContentOsisStat();
            // getDataStudent();
            
            // $containerElem.waitForImages(function() {
            //     $('#containerDisplayStatOsis').hide();
            //     $(this).show();
            // });
        }, 
        complete: function() {
            isRequestPopStudentStat = false;
        }
    });
}
function getContentOsisStat() {
    var $contentElem = $('.containerEdiStatOsis .contentEdSt #containerFormStatOsis');
    var $urlContent = window.location.href + '/member/contentload';
    $.ajax({
        type: "GET",
        url: $urlContent,
        success: function (data) {
            var $elemFrm = $(data).get(0).outerHTML;
            $contentElem.append($elemFrm);
            $contentElem.find('.lazyLoadPopStatContainer').remove();
        }
    });
}
function waitContentOsisStat() {
    var $contentItm = $('.containerEdiStatOsis .contentEdSt #containerFormStatOsis .liStdntChsLe ul li');
    
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