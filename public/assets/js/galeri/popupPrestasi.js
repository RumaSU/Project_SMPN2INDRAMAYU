document.addEventListener('DOMContentLoaded', () => {
    const popSumGals = document.getElementById('pop-sumGals');
    const contentsSumGals = popSumGals.querySelector('.contentDisplayDetails');
    const formsSumGals = popSumGals.querySelector('.contentFormDetails');
    const clsPopSumGals = document.getElementById('clsPop-sumGals');
    const inpImgPrestasi = document.getElementById('galsPrestasi');
    const prevImgPrestasi = document.getElementById('previewGalPreview');
    
    clsPopSumGals.addEventListener('click', () => {
        popSumGals.classList.add('hidden');
        contentsSumGals.classList.add('hidden');
        formsSumGals.classList.add('hidden');
    });
    
    // Mendapatkan elemen input date
    const inputDate = document.getElementById('yearsSignTeachers');

    // Mendapatkan tanggal saat ini dalam format YYYY-MM-DD
    const today = new Date().toISOString().split('T')[0];

    // Set nilai maksimum pada elemen input date menjadi tanggal saat ini
    inputDate.max = today;
    
    
    inpImgPrestasi.addEventListener('change', () => {
        const file = inpImgPrestasi.files[0];
        
        if(file) {
            var img = new Image(); 
            img.src = URL.createObjectURL(file);
            
            img.onerror = function() {
                alert("Gagal memuat gambar. Pastikan file yang Anda pilih adalah gambar yang valid.");
                prevImgPrestasi.src = '';
                file.value = '';
            }
            
            img.onload = function() {
                prevImgPrestasi.src = URL.createObjectURL(file);
                file.value = img;
            }
        }
    });
});


function opnSumGals() {
    document.getElementById('pop-sumGals').classList.remove('hidden');
    document.getElementById('pop-sumGals').querySelector('.contentDisplayDetails').classList.remove('hidden');
    document.getElementById('pop-sumGals').querySelector('.contentFormDetails').classList.add('hidden');
}
function opnFormGals() {
    document.getElementById('pop-sumGals').classList.remove('hidden');
    document.getElementById('pop-sumGals').querySelector('.contentDisplayDetails').classList.add('hidden');
    document.getElementById('pop-sumGals').querySelector('.contentFormDetails').classList.remove('hidden');
}

function autoResize(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
    if (parseInt(textarea.style.height) >= 24 * 16) { // Ubah 18rem menjadi px
        textarea.classList.remove('overflow-hidden');
    } else {
        textarea.classList.add('overflow-hidden');
    }
}

function checkRollBox(event){
    const inpLnkGalery = event.parentElement.nextElementSibling.querySelector('input');
    const dvBgLabelCheck = event.previousElementSibling.querySelector('label div');
    const ballRollLabelCheck = event.previousElementSibling.querySelector('label div span');
    
    if (event.checked) {
        event.value = "active";
        event.setAttribute('aria-checked', 'true');
        dvBgLabelCheck.style.backgroundColor = "rgba(37, 99, 235, 0.2)";
        ballRollLabelCheck.style.left = "100%";
        ballRollLabelCheck.style.transform = "translate(-100%, -50%)"; // Ubah nilai transform untuk mempertahankan posisi vertikal tengah
        inpLnkGalery.classList.remove('hidden');
        setTimeout(() => {
            inpLnkGalery.classList.remove('opacity-0');
        }, 50);
    } else {
        event.value = "";
        event.setAttribute('aria-checked', 'false');
        dvBgLabelCheck.style.backgroundColor = "";
        ballRollLabelCheck.style.left = "0";
        ballRollLabelCheck.style.transform = "translate(0, -50%)"; // Kembalikan posisi transform ke awal
        inpLnkGalery.classList.add('hidden');
        setTimeout(() => {
            inpLnkGalery.classList.remove('opacity-0');
        }, 50);
    }
}