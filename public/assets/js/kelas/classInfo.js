$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });

    $('.icnQsClassInfo').click(function() {
        var rootClassInfo = $('.infoClassPopup');
        
        var classId = $(this).data('class-id');
        // $('.editClassInfo, .deleteClassInfo').attr('data-class-id', '');
        
        rootClassInfo.hide();
        var $urlTo = getURL() + '/kelas/infoload';
        
        $.ajax({
            type: "GET",
            url: $urlTo,
            success: function (data) {
                var lazyContent = $(data).get(0);
                var displayContent = $(data).get(2);
                rootClassInfo.append(lazyContent);
                rootClassInfo.append(displayContent);
                rootClassInfo.show();
                
                dataInfoClass(classId, rootClassInfo);
            },
        });
    });
    
    function dataInfoClass(classId, rootClassInfo) {
        var $urlTo = getURL() + '/kelas/info';
        
        $.ajax({
            type: "POST",
            url: $urlTo,
            data: {
                classId: classId,
            },
            success: function (response) {
                let classInfo = response.classInfo;
                let teacherInfo = response.teacherInfo;
                let teacherSocmedInfo = response.teacherSocmedInfo;
                let listStudentInfo = response.listStudent;
                let countStudent = response.countStudent;
                
                $('.editClassInfo, .deleteClassInfo').attr('data-class-id', classId);
                // $('.editClassInfo').data('class-id', $classId);
                // $('.deleteClassInfo').data('class-id', $classId);
                
                $('.imgClassInfo img').attr('src', getURL() + '/storage/images/classes/' + classInfo.name_files);
                $('.gradeTagInfo p').html("Kelas " + classInfo.class_grade + " " + classInfo.class_tag);
                $('.yearClassInfo').html(classInfo.year);
                $('.summTotalStudent .cntStudent').html(countStudent);
                
                $('.imgTeacherInfo img').attr('src', getURL() + '/storage/images/teachers/' + teacherInfo.name_files);
                $('.nmeTeacherInfo p').html(teacherInfo.name);
                $('.nipTeacherInfo p').html(teacherInfo.nip);
                
                let listLink = $('#listSocmedTch-ClassInfo');
                listLink.empty();
                
                if(teacherSocmedInfo) {
                    let colorIcon = ["text-red-700", "text-blue-600", "text-pink-500", "text-blue-400", "text-black", "text-red-600"];
                    let listSocmed = ["envelope-at-fill", "facebook", "instagram", "twitter", "tiktok", "youtube"];
                    let listLinkSocmed = [teacherSocmedInfo.email, teacherSocmedInfo.facebook, teacherSocmedInfo.instagram, teacherSocmedInfo.twitter, teacherSocmedInfo.tiktok, teacherSocmedInfo.youtube];
                    listLinkSocmed.forEach((linkSocmed, idx) => {
                        listSocmed[idx] = listSocmed[idx] === 'twitter' ? 'twitter-x' : listSocmed[idx];
                        if(linkSocmed) {
                            listLink.append('<a href="' + linkSocmed + '" class="hover:opacity-50"><i class="bi bi-' + listSocmed[idx] + ' ' + colorIcon[idx] + '"></i></a>');
                        }
                    });
                }
                
                let tableStudent = $('.tableStudent table tbody');
                tableStudent.empty();
                if(countStudent > 0) {
                    listStudentInfo.forEach((student, idx) => {
                        tableStudent.append('<tr class="odd:bg-white even:bg-gray-100"> <td class="text-center py-2">' + (idx + 1) + '</td> <td class="w-full px-2">' + student.name + '</td> </tr>');
                    });
                } else {
                    tableStudent.append('<tr class="odd:bg-white even:bg-gray-100"> <td colspan="2" class="text-center py-2 text-3xl"> <i class="bi bi-three-dots"></i> </td> </tr>');
                }
                
                rootClassInfo.waitForImages(function() {
                    $('#lazyLoadInfoClassContent').remove();
                    $('#contentInfoElement').show();
                });
            }
        });
    }
    
    function getURL() {
        return window.location.origin;
    }
});

$(document).on('click', '.closeClassInfo, .editClassInfo, .deleteClassInfo', function () {
    $('#contentInfoElement').remove();
    $('.infoClassPopup').hide();
});

$(document).on('click', '.expandListStudentClassInfo', function () {
    var $tableStudent = $('.tableStudent');
    if($tableStudent.hasClass('hidden')) {
        $(this).addClass('-rotate-90');
        $tableStudent.removeClass('hidden');
    } else {
        $(this).removeClass('-rotate-90');
        $tableStudent.addClass('hidden');
    }
});


function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}