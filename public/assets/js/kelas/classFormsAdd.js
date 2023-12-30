// function showPopUpForm() {
//     const popUpForm = document.getElementById('pop-upForm');
//     popUpForm.classList.toggle('hidden');
// }

const textarea = document.getElementById('desc');

textarea.addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';

    // Tentukan jumlah baris maksimum sebelum muncul overflow
    const rowHeight = 20; // Ganti dengan nilai yang sesuai
    const maxRows = 5; // Ganti dengan nilai yang sesuai

    // Atur tinggi maksimum textarea
    if (this.scrollHeight > rowHeight * maxRows) {
        this.style.overflow = 'auto';
        this.style.height = rowHeight * maxRows + 'px';
    } else {
        this.style.overflow = 'hidden';
    }
});

function previewFile(event) {
    const preview = document.getElementById('previewImage');
    const file = event.target.files[0];
    
    if(file) {
        var img = new Image();
        img.src = URL.createObjectURL(file);
        
        img.onerror = function() {
            alert("Gagal memuat gambar. Pastikan file yang Anda pilih adalah gambar yang valid.");
            preview.src = '';
            event.target.value = '';
        }
        
        img.onload = function() {
            preview.src = URL.createObjectURL(file);
            event.target.value = img;
            var form = imgInput.closest('form');
            if (form) {
                return validateAndSubmit(form);
            }
        }
        
    }
}