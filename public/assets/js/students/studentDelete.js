$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
});

$(document).on('click', '.delBtStudent', function() {
    successOrCloseDelete();
    $('.loadConfirmationDelete').remove();
    var $rootDeleteStudent = $('.deleteStudentPopupAlert');
    var $studentId = $(this).data('studentId');
    
    var $windowHeight = $(window).height();
    var $displayWindowsHeight = $windowHeight * 0.9;
    var $minHeight = $windowHeight * 0.6;
    
    var $urlDel = window.location.origin +  "/siswa/deleteload";
    
    $.ajax({
        type: "GET",
        url: $urlDel,
        success: function (data) {
            var contentDelete = $(data).get(2).outerHTML;
            var lazLoadDelete = $(data).get(4).outerHTML;
            
            $rootDeleteStudent.append(lazLoadDelete);
            $rootDeleteStudent.append(contentDelete);
            $rootDeleteStudent.height($minHeight);
            $rootDeleteStudent.show();
            // var $lazyDelete = $('.lazyLoadDeleteStudent');
            // var $contentDelete = $('.contentWhatStudentDelete');
            // setTimeout(() => {
            //     $lazyDelete.hide();
            //     $contentDelete.show();
            // }, 1000);
            dataStudentDelete($studentId)
            // console.log($(data));
        }
    });
});

$(document).on('click', '#cancelDeleteThisStudent, .closeStudentAlertDelete', function() {
    successOrCloseDelete();
});


function dataStudentDelete($studentId) {
    var $windowHeight = $(window).height();
    var $displayWindowsHeight = $windowHeight * 0.7;
    
    var $rootDeleteStudent = $('.deleteStudentPopupAlert');
    var $contentDeleteStudent = $rootDeleteStudent.find('.contentWhatStudentDelete');
    var $urlData = window.location.origin +  "/siswa/infodata";
    var $urlClass = getURL().split('?ic=');
    var $classId = $urlClass[1];
    
    $.ajax({
        type: "POST",
        url: $urlData,
        data: {
            studentId: $studentId,
        },
        success: function (response) {
            var $dataStudent = response.dataStudent;
            var $socmedStudent = response.socmedStudent;
            var $dataClasses = response.whatClass;
            
            var imgStudent = window.location.origin + '/storage/images/students/' + $dataStudent.name_files;
            
            $contentDeleteStudent.find('.imgStudentDelete img').attr('src', imgStudent);
            $contentDeleteStudent.find('#nameStudentDelete').html($dataStudent.name);
            $contentDeleteStudent.find('#nisStudentDelete').html($dataStudent.nis);
            $contentDeleteStudent.find('#classStudentDelete').html($dataClasses.class_grade + ' ' + $dataClasses.class_tag);
            if($socmedStudent.facebook || $socmedStudent.instagram || $socmedStudent.twitter || $socmedStudent.tiktok || $socmedStudent.youtube) {
                putListSocmed($socmedStudent);
            } else {
                $contentDeleteStudent.find('#listSocialMediaStudentDelete').append('<li role="listitem"><div class="icSm w-fit flex items-center gap-2 select-none" draggable="false"><i class="bi bi-globe text-2xl"></i><p>Tidak ada sosial media</p></div></li>')
            }
            
            $rootDeleteStudent.waitForImages(function() {
                $rootDeleteStudent.height($displayWindowsHeight);
                $('.lazyLoadDeleteStudent').remove();
                $('.contentWhatStudentDelete').show();
            });
        }
    });
}

function putListSocmed($socmedStudent) {
    var elementListSocmed = $('.deleteStudentPopupAlert .contentWhatStudentDelete #listSocialMediaStudentDelete');
    $.each($socmedStudent, function (idx, socmed) {
        if (socmed) {
            var $biIcon = (idx === 'twitter') ? 'bi-twitter-x' : 'bi-'+idx;
            elementListSocmed.append('<li role="listitem"><a href="' + socmed + '" class="hover:opacity-50"><div class="icSm w-fit block"><i class="bi ' + $biIcon + ' text-2xl"></i></div></a></li>');
        }
    });
}

function putDeleteToken($studentId, $classId) {
    
}

function successOrCloseDelete() {
    $('.lazyLoadDeleteStudent').remove();
    $('.loadConfirmationDelete').remove();
    $('.contentWhatStudentDelete').remove();
    $('.deleteStudentPopupAlert').hide();
}

function getURL() {
    let nowUrl = window.location.href;
    return nowUrl;
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}