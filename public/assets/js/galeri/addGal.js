document.addEventListener('DOMContentLoaded', () => {
    const clsFrmAddImg = document.getElementById('btnClsAddGal');
    const frmAddImg = document.getElementById('pop-upFormAddGal');
    const overlayPopUp = document.getElementById('overlayPopUp');
    const inpImg = document.getElementById('imgAddGal');
    const inpTitlAddImg = document.getElementById('titAddImg');
    const preview = document.getElementById('prevImgFrmAddGAL');
    
    inpImg.addEventListener('change', () => {
        const file = inpImg.files[0];
        
        if(file) {
            var img = new Image(); 
            img.src = URL.createObjectURL(file);
            
            img.onerror = function() {
                alert("Gagal memuat gambar. Pastikan file yang Anda pilih adalah gambar yang valid.");
                preview.src = '';
                file.value = '';
            }
            
            img.onload = function() {
                preview.src = URL.createObjectURL(file);
                file.value = img;
            }
        }
    });
    
    clsFrmAddImg.addEventListener('click', () => {
        inpImg.value = null;
        inpTitlAddImg.value = null;
        preview.src = '';
        frmAddImg.classList.toggle('hidden');
        overlayPopUp.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    });
});

function showPopUpForm(event) {
    const popUpForm = document.getElementById('pop-upFormAddGal');
    const overlayPopUp = document.getElementById('overlayPopUp');
    document.body.classList.toggle('overflow-hidden');
    popUpForm.classList.toggle('hidden');
    overlayPopUp.classList.toggle('hidden');
}

