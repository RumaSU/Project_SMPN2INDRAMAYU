function openPopup(imageSrc) {
    const popup = document.getElementById('imagePopup');
    const image = document.getElementById('popupImage');
    const overlayPopUp = document.getElementById('overlayPopUp');
    
    image.src = imageSrc;
    
    image.onload = function () {
        document.body.style.overflow = "hidden";
        overlayPopUp.classList.remove('hidden');
        popup.classList.remove('hidden');
    };
}

function closePopup() {
    const popup = document.getElementById('imagePopup');
    const image = document.getElementById('popupImage');
    const overlayPopUp = document.getElementById('overlayPopUp');
    
    document.body.style.overflow = "";
    overlayPopUp.classList.add('hidden');
    popup.classList.add('hidden');
    
    image.onload = null;
    image.src = "";
}