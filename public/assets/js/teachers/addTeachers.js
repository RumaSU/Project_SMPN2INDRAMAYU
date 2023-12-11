$(document).ready(function () {
    let popupRoot = $(".pop-teDats");
    let titlePopup = $(".heaAbtSumTeDats strong");
    let popupContentDisplay = $(".contentDisplayDetails");
    let popupFormDisplay = $(".contentFormDetails");
    
    $("#addTeacher, #btrcr-fmte, #btrcr-fm").click(function() {
        popupRoot.show();
        titlePopup.text('Tambah');
        popupFormDisplay.show();
        popupContentDisplay.hide();
        let nowPath = window.location.pathname;
        $("#formPopupTeachers").attr('action', nowPath);
        resetValue();
    });
});

function resetValue() {
    $("#previewGalPreview").attr('src', "storage/images/teachers/default.png");
    $("#nameTeachers").val('');
    $("#nipTeachers").val('');
    $('#bidangTeachers').val('');
    $('#yearsSignTeachers').val('');
    
    let listSocmed = ["facebook", "instagram", "twitter", "tiktok", "youtube", "emails"];

    listSocmed.forEach((itemSocmed) => {
        let isActive = '';
        let ariaChecked = 'false';
        
        let inputActive = '#' + itemSocmed + '-active';
        let socmedInput = itemSocmed === 'emails' ? '#' + itemSocmed + 'Account' : '#' + itemSocmed + '-Link';
        let styleParentRollActive = "";
        let styleRollActive = "left:0 ; transform: translateX(0, -50%)";
        
        let parentDiv = $(inputActive).prev().find('label div');
        let spanInside = $(inputActive).prev().find('label div span');
        parentDiv.css('backgroundColor', styleParentRollActive);
        spanInside.attr('style', styleRollActive);
        
        $(inputActive).prop('checked', false); // Check/Uncheck checkbox based on itemLink
        $(inputActive).val(isActive).attr('aria-checked', ariaChecked);
        $(socmedInput).val('');
        $(socmedInput).addClass('hidden').addClass('opacity-0');
    });
}