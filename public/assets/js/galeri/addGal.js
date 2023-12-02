document.addEventListener('DOMContentLoaded', () => {
    const labAddImg = document.getElementById('btnAddImgGal');
    const svCnAddImg = document.getElementById('ifOnInputChange');
    const cnAddBtnImg = document.getElementById('cnAddImgGal');
    const inpImg = document.getElementById('inpAddGaleri');
    const preview = document.getElementById('prevImgGal');
    
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
                preview.parentElement.classList.toggle('hidden');
                labAddImg.classList.toggle('hidden');
                svCnAddImg.classList.toggle('hidden');
            }
        }
    });
    
    cnAddBtnImg.addEventListener('click', () => {
        inpImg.value = null;
        preview.src = '';
        preview.parentElement.classList.toggle('hidden');
        labAddImg.classList.toggle('hidden');
        svCnAddImg.classList.toggle('hidden');
    });
});