function openPopup(imageSrc) {
    const popup = document.getElementById('imagePopup');
    const image = document.getElementById('popupImage');
    const overlayPopUp = document.getElementById('overlayPopUp');
    
    image.src = imageSrc;
    
    image.onload = function () {
        document.body.style.overflow = "hidden";
        overlayPopUp.classList.remove('hidden');
        popup.style.top = "50%";
        popup.style.opacity = "1";
        popup.style.visibility = "visible";
    };
}

function closePopup() {
    const popup = document.getElementById('imagePopup');
    const image = document.getElementById('popupImage');
    const overlayPopUp = document.getElementById('overlayPopUp');
    
    // if(!popup.target == popup || !event.target == event) {
    //     document.body.style.overflow = "";
    //     overlayPopUp.classList.add('hidden');
    //     popup.style.top = "200%";
    //     popup.style.opacity = "0";
    //     popup.style.visibility = "hidden";
    // }
    
    document.body.style.overflow = "";
    overlayPopUp.classList.add('hidden');
    popup.style.top = "200%";
    popup.style.opacity = "0";
    popup.style.visibility = "hidden";
    
    image.onload = null;
    image.src = "";
}