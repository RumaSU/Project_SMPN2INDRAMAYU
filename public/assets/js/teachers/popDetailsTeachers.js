document.addEventListener('DOMContentLoaded', () => {
    const popSumTeDats = document.getElementById('pop-teDats');
    const contentsSumTeDats = popSumTeDats.querySelector('.contentDisplayDetails');
    const formsSumTeDats = popSumTeDats.querySelector('.contentFormDetails');
    const clsPopSumTeDats = document.getElementById('clsPop-sumTeDats');
    
    clsPopSumTeDats.addEventListener('click', () => {
        popSumTeDats.classList.add('hidden');
        contentsSumTeDats.classList.add('hidden');
        formsSumTeDats.classList.add('hidden');
    });
    
    // Mendapatkan elemen input date
    const inputDate = document.getElementById('yearsSignTeachers');

    // Mendapatkan tanggal saat ini dalam format YYYY-MM-DD
    const today = new Date().toISOString().split('T')[0];

    // Set nilai maksimum pada elemen input date menjadi tanggal saat ini
    inputDate.max = today;
    
});

function opnSumTeDats() {
    document.getElementById('pop-teDats').classList.remove('hidden');
    document.getElementById('pop-teDats').querySelector('.contentDisplayDetails').classList.remove('hidden');
    document.getElementById('pop-teDats').querySelector('.contentFormDetails').classList.add('hidden');
}
function opnFormTeDats() {
    document.getElementById('pop-teDats').classList.remove('hidden');
    document.getElementById('pop-teDats').querySelector('.contentDisplayDetails').classList.add('hidden');
    document.getElementById('pop-teDats').querySelector('.contentFormDetails').classList.remove('hidden');
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
    const inpLnkTeachers = event.parentElement.nextElementSibling.querySelector('input');
    const dvBgLabelCheck = event.previousElementSibling.querySelector('label div');
    const ballRollLabelCheck = event.previousElementSibling.querySelector('label div span');
    
    if (event.checked) {
        event.value = "active";
        event.setAttribute('aria-checked', 'true');
        dvBgLabelCheck.style.backgroundColor = "rgba(37, 99, 235, 0.2)";
        ballRollLabelCheck.style.left = "100%";
        ballRollLabelCheck.style.transform = "translate(-100%, -50%)"; // Ubah nilai transform untuk mempertahankan posisi vertikal tengah
        inpLnkTeachers.classList.remove('hidden');
        setTimeout(() => {
            inpLnkTeachers.classList.remove('opacity-0');
        }, 50);
    } else {
        event.value = "";
        event.setAttribute('aria-checked', 'false');
        dvBgLabelCheck.style.backgroundColor = "";
        ballRollLabelCheck.style.left = "0";
        ballRollLabelCheck.style.transform = "translate(0, -50%)"; // Kembalikan posisi transform ke awal
        inpLnkTeachers.classList.add('hidden');
        setTimeout(() => {
            inpLnkTeachers.classList.remove('opacity-0');
        }, 50);
    }
}