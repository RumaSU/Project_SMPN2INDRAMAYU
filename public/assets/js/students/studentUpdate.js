$(document).ready(function () {
    let loadForm = '<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[10px] md:border-[16px] border-dotted w-[70px] h-[70px] md:w-[120px] md:h-[120px]"></div></div>';
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': getCsrfToken()
        }
    });
    
    $(".editBtStudent").click(function() {
        let $rootFormElement = $('#pop-upFormAddStudent');
        let $formElement = $rootFormElement.find('.frmAddStudent');
        var $originUrl = window.location.origin;
        var $nowUrl = (window.location.href).split('?ic=');
        
        var $windowHeight = $(window).height();
        var $displayWindowsHeight = $windowHeight * 0.9;
        var $minHeight = $windowHeight * 0.4;
        
        var $studentId = $(this).data('studentId');
        $rootFormElement.show();
        $rootFormElement.height($minHeight);
        $formElement.hide();
        
        $rootFormElement.append('<div class="loadWaiting absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"><div class="animate-spin rounded-[100%] border-[16px] border-dotted w-[120px] h-[120px]"></div></div>');
        $.ajax({
            type: "POST",
            data: {
                studentId: $studentId,
            },
            url: "/siswa",
            success: function (data) {
                putTokenToForm();
                $formElement.find('form').attr('action', $nowUrl[0]  + '/update?si=' + $studentId);
                
                $formElement.find('#previewImage').attr('src', $originUrl + '/storage/images/students/' + data.name_files)
                $formElement.find('#nameFrmStudent').val(data.name);
                $formElement.find('#nisFrmStudent').val(data.nis);
                
                let listSocmed = ["facebook", "instagram", "twitter", "tiktok", "youtube"];
                let listLinkSocmed = [data.facebook, data.instagram, data.twitter, data.tiktok, data.youtube];
                
                listLinkSocmed.forEach((itemLink, idx) => {
                    let isActive = itemLink ? 'active' : '';
                    let ariaChecked = itemLink ? 'true' : 'false';
            
                    let inputActive = '#' + listSocmed[idx] + '-active';
                    let inputIdValue = '#' + listSocmed[idx] + 'Link';
            
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
                
                $formElement.waitForImages(function() {
                    $formElement.show();
                    $rootFormElement.height($displayWindowsHeight + 'px');
                    $rootFormElement.find('.loadWaiting').remove();                    
                });
                
            }, 
            error: function() {
                alert('error');
            }
        });
    });
    
    $(window).resize(function() {
        $windowHeight = $(window).height();
        
        $displayWindowHeight = $windowHeight * 0.9;
        $('#pop-upFormAddStudent').height($displayWindowHeight);
    })
});

function putTokenToForm() {
    var $nowUrl = window.location.origin;
    var $getPathName = window.location.pathname;
    var $idClass = (window.location.href).split('?ic=');
    var $splitGet = $getPathName.split('/');
    var $gradeClass = $splitGet[3];
    var $tagClass = $splitGet[4];

    $.ajax({
        type: "POST",
        url: $nowUrl + '/siswa/formtoken',
        data: {
            gradeClass: $gradeClass,
            tagClass: $tagClass,
            idClass: $idClass[1],
        },
        success: function (response) {
            var tokenForm = response.tokenForm;
            $('#_tokenFormStudent').val(tokenForm);
        },
        error: () => {
        }
    });
    
}

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}