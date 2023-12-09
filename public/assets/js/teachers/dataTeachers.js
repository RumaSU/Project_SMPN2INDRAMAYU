$(document).ready(function () {
    let popupRoot = $(".pop-teDats");
    let titlePopup = $(".heaAbtSumTeDats strong");
    let popupContent = $(".contentSumTeDats");
    let popupContentDisplay = $(".contentDisplayDetails");
    let popupFormDisplay = $(".contentFormDetails")
    $(".itemsTeacher-content").click(function() {
        popupContentDisplay.hide();
        popupRoot.show();
        titlePopup.text('Tentang');
        popupContent.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
        popupFormDisplay.hide();
        let teacherId = $(this.parentElement).data('item-id');
        let teacherName = $(this.parentElement).attr('title');
        $.ajax({
            type: "get",
            url: "/pendidik/" + teacherName + "/" + teacherId,
            success: function (data) {
                popupContentDisplay.show();
                $(".loadWaiting").remove();
                $("#popupImageTeacher").attr('src', "storage/images/teachers/" + data.name_files);
                $("#nameShowTeachers").text(data.name).data('value', data.name).attr('data-value', data.name);
                $("#nipShowTeachers").text(data.nip).data('value', data.nip).attr('data-value', data.nip);
                $("#editTeachers").attr('title', 'Edit ' + data.name).attr('data-show-item-id', data.teacher_id).attr('data-show-item-name', data.name);
                $("#statusDisplayTeachers").text(data.status).data('value', data.status).attr('data-value', data.status);
                $("#sectorDisplayTeachers").text(data.sector).data('value', data.sector).attr('data-value', data.sector);
                $("#yearsDisplaySignTeachers").text(formatDate(data.years_sign)).data('value', data.years_sign).attr('data-value', data.years_sign);
                
                let listLink = $(".list-link-display");
                let emailsTeacher = $(".list-data-teacher .itemEmailTeacher");
                listLink.empty();
                emailsTeacher.empty();
                if(data.facebook || data.instagram || data.twitter || data.tiktok || data.youtube || data.email) {
                    let listSocmed = ["facebook", "instagram", "twitter", "tiktok", "youtube"];
                    let listLinkSocmed = [data.facebook, data.instagram, data.twitter, data.tiktok, data.youtube];
                    listLinkSocmed.forEach((linkSocmed, idx) => {
                        labelSocmed = listSocmed[idx][0].toUpperCase() + listSocmed[idx].slice(1);
                        listSocmed[idx] = listSocmed[idx] === 'twitter' ? 'twitter-x' : listSocmed[idx];
                        if(linkSocmed) {
                            listLink.append('<li class="link-item" role="listitem"> <div class="overflow-hidden "> <div class="cntnItem flex items-center gap-4"> <i class="bi bi-' + listSocmed[idx] + ' text-2xl md:text-3xl"></i> <div class="desc-link leading-4"> <p class="text-sm md:text-base">' + labelSocmed + '</p> <a href="' + linkSocmed + '" class="text-xs underline text-blue-400">'+ linkSocmed +'</a> </div> </div> </div> </li>');
                        }
                    });
                    if(data.email) {
                        emailsTeacher.append('<div class="data-item-email overflow-hidden "> <div class="cntnItem flex items-center gap-4"> <i class="bi bi-envelope-at text-2xl md:text-3xl" title="Email" aria-hidden="true"></i> <div class="desc-link text-sm md:text-base"> <p class="" id="emailTeachers">' + data.email +'</p> </div> </div> </div>')
                    }
                } else {
                    listLink.append('<li class="link-item" role="listitem"> <div class="overflow-hidden "> <div class="cntnItem flex items-center gap-4"> <i class="bi bi-globe text-2xl md:text-3xl"></i> <div class="desc-link leading-4"> <p class="text-sm md:text-base">Tidak ada sosial media</p> </div> </div> </div> </li>');
                    $('.data-item-email').remove();
                }
                
            }
        });
    });
    $("#editTeachers").click(function() {
        popupContentDisplay.hide();
        popupFormDisplay.hide();
        popupRoot.show();
        titlePopup.text('Edit');
        popupContent.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
        let teacherId = $(this).data('show-item-id');
        let teacherName = $(this).data('show-item-name');
        $("#formPopupTeachers").attr('action', "/pendidik/edit/" + teacherName + "/" + teacherId);
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
    $("#clsPop-sumTeDats").click(function() {
        popupRoot.hide();
        popupContentDisplay.hide();
        popupFormDisplay.hide();
        $("#formPopupTeachers").attr('action', "");
        resetValue();
    });
    $(".editButtonTeacher").click(function() {
        popupContentDisplay.hide();
        popupFormDisplay.hide();
        popupRoot.show();
        titlePopup.text('Edit');
        popupContent.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
        let teacherId = $(this.parentElement.parentElement).data('item-id');
        let teacherName = $(this.parentElement.parentElement).attr('title');
        $("#formPopupTeachers").attr('action', "/pendidik/edit/" + teacherName + "/" + teacherId);
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
    $("#addTeacher, #btrcr-fmte").click(function() {
        popupRoot.show();
        titlePopup.text('Tambah');
        popupFormDisplay.show();
        popupContentDisplay.hide();
        $("#formPopupTeachers").attr('action', "/pendidik");
        resetValue()
    });
    // $("#btrcr-fmte").click(function() {
    //     popupRoot.show();
    //     titlePopup.text('Tambah');
    //     popupFormDisplay.show();
    //     popupContentDisplay.hide();
    //     $("#formPopupTeachers").attr('action', "/pendidik");
    //     resetValue()
    // });
});

function getData(data) {
    $("#previewGalPreview").attr('src', "storage/images/teachers/" + data.name_files);
    $("#imageTeachers").attr('value', data.name_files);
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
        console.log(inputIdValue);
        
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

function resetValue() {
    $("#previewGalPreview").attr('src', "storage/images/teachers/default.png");
    $("#nameTeachers").val('');
    $("#nipTeachers").val('');
    let listSocmed = ["facebook", "instagram", "twitter", "tiktok", "youtube", "emails"];

    listSocmed.forEach((itemSocmed) => {
        let isActive = '';
        let ariaChecked = 'false';
        
        let inputActive = '#' + itemSocmed + '-active';
        let styleParentRollActive = "";
        let styleRollActive = "left:0 ; transform: translateX(0, -50%)";
        
        let parentDiv = $(inputActive).prev().find('label div');
        let spanInside = $(inputActive).prev().find('label div span');
        parentDiv.css('backgroundColor', styleParentRollActive);
        spanInside.attr('style', styleRollActive);
        
        $(inputActive).prop('checked', false); // Check/Uncheck checkbox based on itemLink
        $(inputActive).val(isActive).attr('aria-checked', ariaChecked);
        $('#' + itemSocmed + 'Link').val('');
        $('#' + itemSocmed + 'Link').addClass('hidden').addClass('opacity-0');
    });
}

function formatDate(date) {
    let parts = date.split('-');
    return parts[2] + '-' + parts[1] + '-' + parts[0];
}