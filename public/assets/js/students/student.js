$(document).ready(function () {
    
    let popupRoot = $(".detailShowStudent");
    let popupContent = $(".contentWrapperShow");
    let popupContentDisplay = $(".contentDisplayDetails");
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    $(".contentStudent, .icnQsStudentInfo").click(function() {
        popupContentDisplay.hide();
        var $studentId = $(this).data('studentId');
        popupRoot.show();
        popupContent.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
        $.ajax({
            type: "POST",
            data: {
                studentId: $studentId,
            },
            url: "/siswa",
            success: function (data) {
                popupContentDisplay.show();
                $(".loadWaiting").remove();
                $("#popupImageStudent").attr('src', "/storage/images/students/" + data.name_files);
                $("#nameShowStudents").text(data.name).data('value', data.name).attr('data-value', data.name);
                $("#editStudents").attr('title', 'Edit ' + data.name).attr('data-show-item-id', data.student_id).attr('data-show-item-name', data.name);
                // $("#statusDisplayStudents").text(data.status).data('value', data.status).attr('data-value', data.type);
                // $("#sectorDisplayStudents").text(data.sector).data('value', data.sector).attr('data-value', data.sector);
                // $("#yearsDisplaySignStudents").text(formatDate(data.years_sign)).data('value', data.years_sign).attr('data-value', data.years_sign);
                
                let listLink = $(".list-link-display");
                listLink.empty();
                if(data.facebook || data.instagram || data.twitter || data.tiktok || data.youtube ) {
                    let listSocmed = ["facebook", "instagram", "twitter", "tiktok", "youtube"];
                    let listLinkSocmed = [data.facebook, data.instagram, data.twitter, data.tiktok, data.youtube];
                    listLinkSocmed.forEach((linkSocmed, idx) => {
                        labelSocmed = listSocmed[idx][0].toUpperCase() + listSocmed[idx].slice(1);
                        listSocmed[idx] = listSocmed[idx] === 'twitter' ? 'twitter-x' : listSocmed[idx];
                        if(linkSocmed) {
                            listLink.append('<li class="link-item" role="listitem"> <div class="overflow-hidden "> <div class="cntnItem flex items-center gap-4"> <i class="bi bi-' + listSocmed[idx] + ' text-2xl md:text-3xl"></i> <div class="desc-link leading-4"> <p class="text-sm md:text-base">' + labelSocmed + '</p> <a href="' + linkSocmed + '" class="text-xs underline text-blue-400">'+ linkSocmed +'</a> </div> </div> </div> </li>');
                        }
                    });
                } else {
                    listLink.append('<li class="link-item" role="listitem"> <div class="overflow-hidden "> <div class="cntnItem flex items-center gap-4"> <i class="bi bi-globe text-2xl md:text-3xl"></i> <div class="desc-link leading-4"> <p class="text-sm md:text-base">Tidak ada sosial media</p> </div> </div> </div> </li>');
                }
                
            }, 
            error: function() {
                alert('error');
            }
        });
    });
    
    $("#clsPop-sumTeDats").click(function() {
        popupRoot.hide();
        popupContentDisplay.hide();
        $("#formPopupTeachers").attr('action', "");
        resetValue();
    });
    
    setTimeout(() => {
        $('.confirmDelete').remove();
        $('.confirmUpdate').remove();
        $('.errorDelete').remove();
    }, 3000);
});

function formatDate(date) {
    let parts = date.split('-');
    return parts[2] + '-' + parts[1] + '-' + parts[0];
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}