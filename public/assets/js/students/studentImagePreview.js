document.addEventListener('DOMContentLoaded', () => {
    const inpImageStudents = document.getElementById('imgFrmStudent');
    const prevImgStudents = document.getElementById('previewImage');
    
    const resetImageStudents = document.getElementById('resetImageStudent');
    
    inpImageStudents.addEventListener('change', () => {
        const file = inpImageStudents.files[0];
        
        if(file) {
            var img = new Image(); 
            img.src = URL.createObjectURL(file);
            
            img.onerror = function() {
                alert("Gagal memuat gambar. Pastikan file yang Anda pilih adalah gambar yang valid.");
                prevImgStudents.src = '';
                file.value = '';
            }
            
            img.onload = function() {
                prevImgStudents.src = URL.createObjectURL(file);
                file.value = img;
            }
        }
    });
    
    resetImageStudents.addEventListener('click', () => {
        inpImageStudents.value = '';
        prevImgStudents.src = 'http://' + getURL() + ':8000/assets/img/dumb/imgtemp 1.jpg';
    });
})

function getURL() {
    let nowUrl = window.location.hostname;
    return nowUrl;
}