$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    // $('.delBtClass').click(function () { 
    //     var $popupAlertDelete = $('.deleteClassPopupAlert');
    //     var $contentAlertDelete = $('.contentWhatClassDelete');
    //     var $lazyAlertDelete = $('.lazyLoadDeleteClass');
    //     // let $elementClass = $(this).closest('.itemClass');
    //     // console.log($elementClass);
    //     // let $valueClass = $(this).data('classId');
        
    //     // var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');
    //     var $urlDel = getURL() +  "/delete";
        
    //     $popupAlertDelete.show();
    //     $lazyAlertDelete.show();
    //     $contentAlertDelete.hide();
        
    //     $contentAlertDelete.waitForImages(function() {
    //         $lazyAlertDelete.hide();
    //         $contentAlertDelete.show();
    //     });
        
    //     // if(confirmation) {
    //     //     $.ajax({
    //     //         type: "POST",
    //     //         data: {
    //     //             _method: 'DELETE',
    //     //             classId: $valueClass,
    //     //         },
    //     //         url: $urlDel,
    //     //         success: function (response) {
    //     //             $elementClass.remove();
    //     //             alertContent.append('<div class="confirmDelete w-80 px-4 py-3 bg-green-100 rounded-sm"><div class="cntn flex items-center gap-4"><i class="bi bi-check-circle-fill text-green-500"></i><p class="text-lg">'+response.succedSomething+'</p></div></div>')
    //     //             setTimeout(function () {
    //     //                 $('.confirmDelete').remove();
    //     //             }, 3000);
    //     //         },
    //     //         error: () => {
    //     //             alert('Terjadi kesalahan saat menghapus data.');
    //     //         }
    //     //     });
    //     // }     
    // });
});

$(document).on('click', '.delBtClass, .deleteClassInfo', function() {
    $('.loadConfirmationDelete').remove();
    var $rootDeleteInfo = $('.deleteClassPopupAlert');
    var $classId = $(this).data('classId');
    
    var $urlDel = getURL() +  "/deleteload";
    
    $.ajax({
        type: "GET",
        url: $urlDel,
        success: function (data) {
            var contentDelete = $(data).get(4).outerHTML;
            var lazLoadDelete = $(data).get(6).outerHTML;
            
            $rootDeleteInfo.append(lazLoadDelete);
            $rootDeleteInfo.append(contentDelete);

            $rootDeleteInfo.show();
            dataSummaryDelete($classId);
        }
    });
});

$(document).on('click', '#cancelDeleteThisClass, .closeClassAlertDelete', function() {
    successOrCloseDelete();
});

$(document).on('click', '#confirmDeleteThisClass, #hideThisClass', function() {
    var $contentAlertDelete = $('.contentWhatClassDelete');
    
    loadConfirmDelete();
    $contentAlertDelete.addClass('opacity-50');
    
    var $classId = $(this).data('classId');
    var $acd = $(this).attr('title').split(' ');
    var $tokenDelete = $(this).data('tokenDelete');
    
    var $urlDel = getURL() +  "/delete";
    
    $.ajax({
        type: "POST",
        data: {
            _method: 'DELETE',
            acd: $acd[0],
            tokenClassDelete: $tokenDelete,
            classId: $classId,
        },
        url: $urlDel,
        success: function (response) {
            var classInfo = response.split('$+=/?2!');
            successOrCloseDelete();
            getElementAlert($acd[0], classInfo);
            
            deleteElementClass($classId);
            $('.loadConfirmationDelete').remove();
        },
        error: () => {
            $contentAlertDelete.removeClass('opacity-50');
            $('.loadConfirmationDelete').remove();
        }
    });
});

function getElementAlert(actionWhat, classInfo) {
    let alertContentRoot = $('.alertContent');
    var $urlDel = getURL() +  "/alertload";
        
    $.ajax({
        type: "GET",
        url: $urlDel,
        success: function (data) {
            var hideAlert = $(data).get(0).outerHTML;
            var deleteAlert = $(data).get(2).outerHTML;
            
            var $listInfo = $('.listInfoClassHide ul');
            $listInfo.empty();
            
            if (actionWhat === 'Hide') {
                alertContentRoot.append(hideAlert);
            }
            if (actionWhat === 'Delete'){
                alertContentRoot.append(deleteAlert);
            }
            
            var alertClassGrade = alertContentRoot.find('.confirmHideAlert .classGradeAlert, .confirmDeleteAlert .classGradeAlert');
            var alertYear = alertContentRoot.find('.confirmHideAlert .classYearAlert, .confirmDeleteAlert .classYearAlert');
            var alertStudentInfo = alertContentRoot.find('.confirmHideAlert .studentInfoAlert, .confirmDeleteAlert .studentInfoAlert');
            var alertDateDelete = alertContentRoot.find('.confirmHideAlert .deleteDateAlert , .confirmDeleteAlert .deleteDateAlert ');
            
            alertClassGrade.html(classInfo[0]);
            alertYear.html(classInfo[1]);
            alertStudentInfo.html(classInfo[2]);
            alertDateDelete.html(classInfo[3]);
            
            setTimeout(() => {
                $('.confirmHideAlert').removeClass('translate-x-[125%]');
                $('.confirmDeleteAlert').removeClass('translate-x-[125%]');
            }, 50);
            setTimeout(() => {
                $('.confirmHideAlert').addClass('translate-x-[125%]');
                $('.confirmDeleteAlert').addClass('translate-x-[125%]');
            }, 2900);
            setTimeout(() => {
                $('.confirmHideAlert').remove();
                $('.confirmDeleteAlert').remove();
            }, 3000);
        }
    });
}

function dataSummaryDelete($classId) {
    var $elementStudentCount = $('.deleteClassPopupAlert .contentWhatClassDelete .warningDeleteClass .reasonTopWarning');
    var $elementStudentList = $('.deleteClassPopupAlert .contentWhatClassDelete .shortListStudent ul');
    var $urlDel = getURL() +  "/studentlist";
    
    $.ajax({
        type: "POST",
        url: $urlDel,
        data: {
            classId: $classId,
        },
        success: function (response) {
            var listStudent = response.listStudent;
            var tokenDelete = response.tokenDeleteClass;
            
            $elementStudentList.empty();
            if(listStudent.length > 0) {
                $elementStudentCount.find('p strong').html((listStudent.length) + ' Siswa');
                $.each(listStudent, function (idx, valStudent) { 
                    $elementStudentList.append('<li role="listitem"> <div class="listItemStdn"> <p>' + (idx+1) + '. ' + valStudent.name + '</p> </div> </li>')
                });
            } else {
                $elementStudentCount.html('Kelas ini tidak memiliki siswa yang terhubung hingga saat ini, sehingga aman untuk dihapus.');
                $elementStudentList.append('<li role="listitem"> <div class="listItemStdn"> <p class="text-center font-bold">Tidak ada siswa</p> </div> </li>')
            }
            $('#hideThisClass').attr('data-class-id', $classId).attr('data-token-delete', tokenDelete);
            $('#confirmDeleteThisClass').attr('data-class-id', $classId).attr('data-token-delete', tokenDelete);
            
            $('#tokenDeleteThis').val(tokenDelete);
            $('#classIdThis').val($classId);
            
            $('.contentWhatClassDelete').waitForImages(function() {
                $('.lazyLoadDeleteClass').remove();
                $('.contentWhatClassDelete').show();
            });
        },
        // error: alert('error'),
    });
}

function loadConfirmDelete() {
    var $urlDel = getURL() +  "/deleteload";

    $.ajax({
        type: "GET",
        url: $urlDel,
        success: function (data) {
            var loadConfirm = $(data).get(8).outerHTML;
            
            $('.deleteClassPopupAlert').append(loadConfirm);
        }
    });
}

function successOrCloseDelete() {
    $('.lazyLoadDeleteClass').remove();
    $('.loadConfirmationDelete').remove();
    $('.contentWhatClassDelete').remove();
    $('.deleteClassPopupAlert').hide();
}

function deleteElementClass($classId) {
    $('.itemClass').each(function() {
        var $currentItem = $(this);
        var $currentId = $currentItem.data('classId');
        if($currentId === $classId) {
            $currentItem.addClass('opacity-0');
            setTimeout(() => {
                $currentItem.remove();
            }, 500);
        }
    });
}

function getURL() {
    let nowUrl = window.location.href;
    return nowUrl;
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}