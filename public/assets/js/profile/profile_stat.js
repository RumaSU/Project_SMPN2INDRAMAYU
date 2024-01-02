$(document).ready(function () {
    let keyInpValStat = {
        'tmpNpnPrfSch': 'npsnPrflSch',
        'tmpWdhPrfSch': 'WdthPrflSch',
    }
    
    $('#edStatProfileSch').click(function() {
        resetVal();
        getVal();
        $('.tmpInpStScha').show();
        $('#edCanclStatProfileSch').show();
        $('.frmEdStsPrflSch').removeClass('xl:opacity-0 xl:invisible');
        $(this).hide();
        $('.otpStScha').hide();
    });
    $('#edCanclStatProfileSch').click(function() {
        resetVal();
        $('.tmpInpStScha').hide();
        $('.frmEdStsPrflSch').addClass('xl:opacity-0 xl:invisible');
        $(this).hide();
        $('#edStatProfileSch').show();
        $('.otpStScha').show();
    });
    
    $('#tmpNpnPrfSch, #tmpWdhPrfSch').on('input', function() {
        let valInp = $(this).val();
        let inpId = $(this).prop('id');
        let maxVal = (inpId === 'tmpNpnPrfSch') ? 9999999999 : (inpId === 'tmpWdhPrfSch') ? 99999 : 0;
        if(valInp < 0){
            valInp = 0;
            $(this).val(valInp)
        }
        if(valInp > maxVal){
            valInp = maxVal;
            $(this).val(valInp)
        }
        $('#' + keyInpValStat[inpId]).val(valInp);
    });
    
    // $('#tmpWdhPrfSch').on('input', function() {
    //     resWidhTmp(this);
    // });
    

    // function resWidhTmp($inpWd) {
    //     $inpWd.style.width = (($inpWd.scrollWidth) + 2) + 'px';
    // }
    function getVal() {
        var $urlGet = window.location.origin + '/profil/getdatast'
        $.ajax({
            type: "GET",
            url: $urlGet,
            success: function (response) {
                if(response && response.dataStSch) {
                    $dtSch = response.dataStSch;
                    $('#tmpNpnPrfSch, #npsnPrflSch').val($dtSch.npsn);
                    $('#tmpWdhPrfSch, #WdthPrflSch').val($dtSch.wdth_sch);
                } else {
                    $('#tmpNpnPrfSch, #tmpWdhPrfSch, #npsnPrflSch, #WdthPrflSch').val(0);
                }
            }
        });
    }
    function resetVal() {
        $('#tmpNpnPrfSch, #tmpWdhPrfSch, #npsnPrflSch, #WdthPrflSch').val('');
    }
});