$(document).ready(function () {
    let linkActive = ["facebook-active", "instagram-active", "twitter-active", "tiktok-active", "youtube-active", "emails-active"];
    
    $('#btrcr-fm, .buttonAddStudent').click(function() {
        let $popForm = $('#pop-upFormAddStudent');
        
        $popForm.removeClass('hidden');
        $('#overlayPopUp').removeClass('hidden');
        $('body').addClass('overflow-hidden');
    });
    
    $('#btrpp-clsFrm').click(function(){
        let $popForm = $('#pop-upFormAddStudent');
        $popForm.addClass('hidden');
        $('#overlayPopUp').addClass('hidden');
        $('body').removeClass('overflow-hidden');
        
        $popForm.find('#nameFrmStudent, #imgFrmStudent, #nisFrmStudent').val('');
        $popForm.find('img').attr('src', 'http://' + getURL() + ':8000/assets/img/dumb/imgtemp 1.jpg');
        
        linkActive.forEach(link => {
            const linkEvent = $(`#${link}`);
            const inpLnkTeachers = linkEvent.parent().next().find('input');
            const dvBgLabelCheck = linkEvent.prev().find('label div');
            const ballRollLabelCheck = linkEvent.prev().find('label div span');
            
            linkEvent.val('');
            linkEvent.attr('aria-checked', 'false');
            dvBgLabelCheck.css('backgroundColor', '');
            ballRollLabelCheck.css({
                'backgroundColor': '',
                'borderColor': '',
                'left': '0',
                'transform': 'translate(0, -50%)',
            });
            inpLnkTeachers.removeClass('opacity-0');
            setTimeout(() => {
                inpLnkTeachers.addClass('hidden');
            }, 50);
        });
    });
});


function getURL() {
    let nowUrl = window.location.hostname;
    return nowUrl;
}