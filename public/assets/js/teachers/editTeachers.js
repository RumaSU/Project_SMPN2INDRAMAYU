$(document).ready(function () {
    let popupRoot = $(".pop-teDats");
    let titlePopup = $(".heaAbtSumTeDats strong");
    let popupContent = $(".contentSumTeDats");
    let popupContentDisplay = $(".contentDisplayDetails");
    let popupFormDisplay = $(".contentFormDetails");

    $("#editTeachers").click(function() {
        popupContentDisplay.hide();
        popupFormDisplay.hide();
        popupRoot.show();
        titlePopup.text('Edit');
        popupContent.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
        // let teacherId = $(this).data('show-item-id');
        // let teacherName = $(this).data('show-item-name');
        let teacherId = $(this).attr('data-show-item-id');
        let teacherName = $(this).attr('data-show-item-name');
        console.log(getURL());
        $("#formPopupTeachers").attr('action', getURL() + "/edit/" + teacherName + "/" + teacherId);
        $.ajax({
            type: "get",
            url: "/pendidik/" + teacherName + "/" + teacherId,
            success: function (data) {
                $(".loadWaiting").remove();
                popupFormDisplay.show();
                getData(data);
            }
        });
    });

    $(".editButtonTeacher").click(function() {
        popupContentDisplay.hide();
        popupFormDisplay.hide();
        popupRoot.show();
        titlePopup.text('Edit');
        popupContent.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
        let teacherId = $(this).closest('.items-teacher').data('item-id');
        let teacherName = $(this).closest('.items-teacher').attr('title');
        console.log(getURL());
        $("#formPopupTeachers").attr('action', getURL() + "/edit/" + teacherName + "/" + teacherId);
        $.ajax({
            type: "get",
            url: "/pendidik/" + teacherName + "/" + teacherId,
            success: function (data) {
                $(".loadWaiting").remove();
                popupFormDisplay.show();
                getData(data);
            }
        });
    });
});

function getURL() {
    let nowUrl = window.localStorage.pathname;
    console.log(nowUrl);
    return window.location.pathname;
}

function getData(data) {
    $("#previewGalPreview").attr('src', "storage/images/teachers/" + data.name_files);
    $("#nameTeachers").val(data.name);
    // $("#nipTeachers").attr('value', data.nip);
    $("#nipTeachers").val(data.nip);
    $("#bidangTeachers").val(data.sector);
    $("#yearsSignTeachers").val(data.years_sign);

    let listSocmed = ["facebook", "instagram", "twitter", "tiktok", "youtube", "emails"];
    let listLinkSocmed = [data.facebook, data.instagram, data.twitter, data.tiktok, data.youtube, data.email];

    listLinkSocmed.forEach((itemLink, idx) => {
        let isActive = itemLink ? 'active' : '';
        let ariaChecked = itemLink ? 'true' : 'false';

        let inputActive = '#' + listSocmed[idx] + '-active';
        let inputIdValue = listSocmed[idx] === 'emails' ? '#' + listSocmed[idx] + 'Account' : '#' + listSocmed[idx] + 'Link';

        let styleParentRollActive = itemLink ? "rgba(37, 99, 235, 0.2)" : "";
        let styleRollActive = itemLink ? "left:100% ; transform: translate(-100%, -50%)" : "left:0 ; transform: translateX(0, -50%)";

        let parentDiv = $(inputActive).prev().find('label div');
        let spanInside = $(inputActive).prev().find('label div span');

        parentDiv.css('backgroundColor', styleParentRollActive);
        spanInside.attr('style', styleRollActive);

        $(inputActive).prop('checked', !!itemLink); // Check/Uncheck checkbox based on itemLink
        $(inputActive).val(isActive).attr('aria-checked', ariaChecked);
        $(inputIdValue).val(itemLink).attr('value', itemLink);

        if (itemLink) {
            $(inputIdValue).removeClass('hidden').removeClass('opacity-0');
        } else {
            $(inputIdValue).addClass('hidden').addClass('opacity-0');
        }
    });
}

function formatDate(date) {
    let parts = date.split('-');
    return parts[2] + '-' + parts[1] + '-' + parts[0];
}
