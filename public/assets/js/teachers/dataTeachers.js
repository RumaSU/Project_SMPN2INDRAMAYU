$(document).ready(function () {
    let popupRoot = $(".pop-teDats");
    let titlePopup = $(".heaAbtSumTeDats strong");
    let popupContent = $(".contentSumTeDats");
    let popupContentDisplay = $(".contentDisplayDetails");
    let popupFormDisplay = $(".contentFormDetails");
    // let listItemsTeachers = $('#list-itemsTeachers');
    // $.ajax({
    //     url: '/pendidik/get',
    //     type: 'GET',
    //     success: function(response) {
    //         var data = response;
    //         $.each(data, function(index, item) {
    //             listItemsTeachers.append('<div class="items-teacher aspect-[3/4] overflow-hidden rounded-md relative group" title="'+item.name+'" data-item-id="'+item.teacher_id+'" aria-haspopup="true"> <div class="button-editDel hidden md:flex items-center gap-1 bg-black/40 absolute py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]"> <span role="button" class="editButtonTeacher border border-black bg-white p-2 rounded-lg hover:bg-gray-200 block w-fit" title="Edit '+item.name+'" aria-label="Edit '+item.name+'" data-edit-id="'+item.teacher_id+'"> <i class="bi bi-pencil"></i> </span> <span role="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 block w-fit" title="Delete '+item.name+'" aria-label="Delete '+item.name+'" data-delete-id="'+item.teacher_id+'"> <i class="bi bi-trash3"></i> </span> </div> <div class="itemsTeacher-content bg-white regular-shadow rounded-md sm:rounded-xl lg:rounded-2xl w-full h-full" data-id="'+item.teacher_id+'"> <img src="storage/images/teachers/'+item.name_files+'" alt="" class="supImg w-full h-full object-cover object-center"> <div class="lg:w-3/4 lg:py-2 bg-white shadow-gray-500 shadow-sm rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] cursor-pointer"><p class="itemClass text-center font-bold line-clamp-1" title="'+item.name+'"aria-roledescription="">'+item.name+'</p></div></div></div>');
    //         });

    //         // Hapus kelas animasi setelah data dimuat
    //         // $('.item').removeClass('animate-slide-lazy');
    //     },
    //     error: function(xhr, status, error) {
    //         console.error(error);
    //     }
    // });
    
    $('.items-teacher').each(function(){
        var $currentItem = $(this);

        $currentItem.waitForImages(function() {
            $currentItem.find('.contentItems').removeClass('hidden');
            $currentItem.find('.lazy-placeholder').remove();
            $currentItem.lazy();
        });
    });
    
    $(".item-content").click(function() {
        popupContentDisplay.hide();
        popupRoot.show();
        titlePopup.text('Tentang');
        popupContent.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
        popupFormDisplay.hide();
        let teacherId = $(this).closest('.items-teacher').data('item-id');
        let teacherName = $(this).closest('.items-teacher').attr('title');
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
                $("#typeDisplayTeachers").text(data.type).data('value', data.type).attr('data-value', data.type);
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
                
            }, 
            error: function() {
                alert('error');
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