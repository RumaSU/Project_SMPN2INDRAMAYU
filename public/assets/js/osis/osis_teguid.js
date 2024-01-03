$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    
    $('#edPageOsisChsTeGuid').click(function() {
        $('.contnQuote .containerFrmEdT').empty();
        getFrmChsTeGuid();
    });
    
    function getFrmChsTeGuid() {
        var $containerContent = $('.containerContentQuote');
        var $containerFrmTeGuid = $('.contnQuote .containerFrmEdT');
        viFrmChsTeGuidLoad();
        
        var $urlView = window.location.origin + '/osis/formload';
        $.ajax({
            type: "GET",
            url: $urlView,
            success: function (data) {
                var $elemFrm = $(data).get(2).outerHTML;
                
                if($elemFrm) {
                    $containerFrmTeGuid.append($elemFrm);
                }
                getTeaFrChsGuid();
                $containerFrmTeGuid.waitForImages(function() {
                    $containerFrmTeGuid.find('.lzyLoadFrm').remove();
                    $containerFrmTeGuid.find('.lazyLoadChsTe').remove();
                    $containerContent.hide();
                    $(this).find('form').show();
                })
            },
            error: function() {
                $('.containerContentQuote').show();
            }
        });
    }
});

$(document).on('change', '.contnQuote .containerFrmEdT form .listChsTeacher ul li input', function() {
    var $varVal = $(this).val();
    
    var $urlGet = window.location.href + '/getdateacher';
    $.ajax({
        type: "POST",
        url: $urlGet,
        data: {
            tcId: $varVal,
        },
        success: function (response) {
            var $dataTeacher = response.dataTeacher;
            
            $('#tempTeacherNameOsisGuide').html($dataTeacher.name);
            $('#tempTeacherImageOsisGuide').attr('src', window.location.origin + '/storage/images/teachers/' + $dataTeacher.name_files);
        }
    });
});

$(document).on('input', '.contnQuote .containerFrmEdT form #searchLiTe', function() {
    var $containerLiFrmTeGuid = $('.contnQuote .containerFrmEdT form .listChsTeacher');
    var $liTeGu = $containerLiFrmTeGuid.find('ul');
    
    var $searchVal = $(this).val();
    var $urlGet = window.location.href + '/searchteacher';
    
    $('#tempTeacherNameOsisGuide').html('<i class="italic text-opacity-50">placeholder name teacher</i>');
    $('#tempTeacherImageOsisGuide').attr('src', window.location.origin + '/storage/images/teachers/default.png');
    $liTeGu.empty();
    setTimeout(() => {
        $liTeGu.empty();
        $.ajax({
            type: "POST",
            url: $urlGet,
            data: {
                searchInput: $searchVal,
            },
            success: function (response) {
                if(response.length > 0) {
                    var $dataTeacher = response;
                    // console.log(response);
                    // console.log($dataTeacher);
                    console.log(response);
                    
                    $.each($dataTeacher, function (idx, val) {
                        if (!$liTeGu.find('#' + val.teacher_id).length) { // Periksa duplikat sebelum menambahkan
                            $liTeGu.append('<li><label for="' + val.teacher_id + '" class="cursor-pointer relative block"><input type="radio" name="teacherChoose" id="' + val.teacher_id + '" value="' + val.teacher_id + '" class="hidden sr-only peer"><div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm"><div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden"><img src="' + window.location.origin + '/storage/images/teachers/' + val.name_files + '" alt="" class="w-full h-full object-cover object-center"></div><p class="w-full select-none">' + val.name + '</p></div><div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible"><i class="bi bi-check-circle-fill text-green-600 text-xl"></i></div></label></li>');
                        }
                    });
                    
                }
    
                $('.contnQuote .containerFrmEdT form #toggleLiTea').prop('checked', 'checked');
            }
        });
    }, 450);
});

$(document).on('click', '#_cnclChsTeGuid', function() {
    $('.contnQuote .containerFrmEdT').empty();
    $('.containerContentQuote').show();
});

function getTeaFrChsGuid() {
    var $containerLiFrmTeGuid = $('.contnQuote .containerFrmEdT form .listChsTeacher');
    var $liTeGu = $containerLiFrmTeGuid.find('ul');
    $urlGet = window.location.href + '/listTeacher';

    $liTeGu.empty();
    $.ajax({
        type: "POST",
        url: $urlGet,
        success: function (response) {
            var $liTeacher = response.listTeacher;
            $liTeGu.show();
            if($liTeacher) {
                $.each($liTeacher, function (idx, val) { 
                    $liTeGu.append('<li><label for="' + val.teacher_id + '" class="cursor-pointer relative block"><input type="radio" name="teacherChoose" id="' + val.teacher_id + '" value="' + val.teacher_id + '" class="hidden sr-only peer"><div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm"><div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden"><img src="' + window.location.origin + '/storage/images/teachers/' + val.name_files + '" alt="" class="w-full h-full object-cover object-center"></div><p class="w-full select-none">' + val.name + '</p></div><div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible"><i class="bi bi-check-circle-fill text-green-600 text-xl"></i></div></label></li>');
                });
            } else {
                $liTeGu.append('<li><label for="" class="cursor-pointer relative block"><input type="radio" name="teacherChoose" id="" value="" class="hidden sr-only peer"><div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm"><div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden"><img src="" alt="" class="w-full h-full object-cover object-center"></div><p class="w-full select-none">sssssss</p></div><div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible"><i class="bi bi-check-circle-fill text-green-600 text-xl"></i></div></label></li>');
            }
        },
        error: function() {
            
        }
    });
}

function viFrmChsTeGuidLoad() {
    var $containerFrmTeGuid = $('.contnQuote .containerFrmEdT');
    var $urlView = window.location.href + '/formload';
    
    $.ajax({
        type: "GET",
        url: $urlView,
        success: function (data) {
            $('.containerContentQuote').hide();
            var $elemLoad = $(data).get(0).outerHTML;
            
            $containerFrmTeGuid.append($elemLoad);
        },
    });
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}