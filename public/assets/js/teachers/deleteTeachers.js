$(document).ready(function () {
    let popupRoot = $(".pop-teDats");
    let popupContentDisplay = $(".contentDisplayDetails");
    let popupFormDisplay = $(".contentFormDetails");

    $("#clsPop-sumTeDats").click(function() {
        popupRoot.hide();
        popupContentDisplay.hide();
        popupFormDisplay.hide();
        $("#formPopupTeachers").attr('action', "");
        resetValue();
    });

    // $("delB").click(function() {
    //     let teacherId = $(this.parentElement.parentElement).data('item-id');
    //     let teacherName = $(this.parentElement.parentElement).attr('title');
    //     let parentItemTeacher = $(this.parentElement.parentElement);
    //     var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');
    //     parentItemTeacher.children().hide();
    //     parentItemTeacher.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
    //     if(confirmation) {
    //         $.ajax({
    //             type: "DELETE",
    //             url: "/pendidik/" + teacherName + "/" + teacherId + "/delete",
    //             success: function (data) {
    //                 parentItemTeacher.remove();
    //             }
    //         });
    //     }
    // });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    $(".delB").click(function() {
        let teacherId = $(this.parentElement.parentElement).data('itemId');
        let teacherName = $(this.parentElement.parentElement).attr('title');
        let parentItemTeacher = $(this.parentElement.parentElement);
        let alertContent = $('.alertContent');
        var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');
        parentItemTeacher.children().hide();
        parentItemTeacher.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
        console.log(getURL());
        if(confirmation) {
            $.ajax({
                type: "DELETE",
                url: getURL() + "/" + teacherName + "/" + teacherId + "/delete",
                success: function (response) {
                    if (response.errorSomething) {
                        alertContent.append('<div class="errorDelete w-80 px-4 py-3 bg-red-100 rounded-sm"><div class="cntn flex items-center gap-4"><i class="bi bi-x-circle-fill text-red-500"></i><p class="text-lg">Data gagal dihapus</p></div></div>');
                        setTimeout(function () {
                            $('.errorDelete').remove();
                        }, 3000);
                    } else if (response.succedSomething) {
                        parentItemTeacher.remove();
                        alertContent.append('<div class="confirmDelete w-80 px-4 py-3 bg-green-100 rounded-sm"><div class="cntn flex items-center gap-4"><i class="bi bi-check-circle-fill text-green-500"></i><p class="text-lg">Data berhasil dihapus</p></div></div>')
                        setTimeout(function () {
                            $('.confirmDelete').remove();
                        }, 3000);

                        if(response.nowData === 0) {
                            $('#addTeacher').remove();
                            $('#list-itemsTeachers').append('<div id="noData" class="group py-10 block bg-gray-200 regular-shadow border rounded-2xl overflow-hidden relative hover:bg-gray-500/25" style="grid-column: 1 / -1"> <div class="text-center text-gray-500"> <i class="bi bi-people-fill text-8xl"></i> <p>Belum ada data saat ini</p> </div> </div>');
                        }
                    }
                },
                error: function() {
                    parentItemTeacher.children().show();
                    $('.loadWaiting').remove();
                }
            });
        } else { parentItemTeacher.children().show(); $('.loadWaiting').remove(); }
    });
});

function getURL() {
    let nowUrl = window.localStorage.pathname;
    console.log(nowUrl);
    return window.location.pathname;
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

// function checkTotalData() {
//     const listItem = document.getElementById('list-itemsTeachers');
//     const lengthItem = listItem.querySelectorAll('items-teacher').length;

//     if(lengthItem === 0) {
//         listItem.removeChild(document.getElementById('addTeacher'))
//         // listItem.append('<div id="noData" class="group py-10 block bg-gray-200 regular-shadow border rounded-2xl overflow-hidden relative hover:bg-gray-500/25" style="grid-column: 1 / -1"> <div class="text-center text-gray-500"> <i class="bi bi-people-fill text-8xl"></i> <p>Belum ada data saat ini</p> </div> </div>');
//         listItem.innerHTML = '<div id="noData" class="group py-10 block bg-gray-200 regular-shadow border rounded-2xl overflow-hidden relative hover:bg-gray-500/25" style="grid-column: 1 / -1"> <div class="text-center text-gray-500"> <i class="bi bi-people-fill text-8xl"></i> <p>Belum ada data saat ini</p> </div> </div>';
//     }
// }
