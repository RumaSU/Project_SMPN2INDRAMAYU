
function showPopUpForm(event) {
    const popUpForm = document.getElementById('pop-upFormAdd');
    const overlayPopUp = document.getElementById('overlayPopUp');
    
    document.body.style.overflow = "hidden";
    popUpForm.classList.remove('hidden');
    overlayPopUp.classList.remove('hidden');

}

function closePopUpForm(event) {
    const popUpForm = document.getElementById('pop-upFormAdd');
    const overlayPopUp = document.getElementById('overlayPopUp');
    if (!popUpForm.contains(event.target) && event.target !== event) {
        document.body.style.overflow = "";
        popUpForm.classList.add('hidden');
        overlayPopUp.classList.add('hidden');
    }
}