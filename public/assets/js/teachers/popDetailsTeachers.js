document.addEventListener('DOMContentLoaded', () => {
    const inpImgTeachers = document.getElementById('imageTeachers');
    const prevImgTeachers = document.getElementById('previewGalPreview');
    // Mendapatkan elemen input date
    const inputDate = document.getElementById('yearsSignTeachers');

    // Mendapatkan tanggal saat ini dalam format YYYY-MM-DD
    const today = new Date().toISOString().split('T')[0];

    // Set nilai maksimum pada elemen input date menjadi tanggal saat ini
    inputDate.max = today;
    
    inpImgTeachers.addEventListener('change', () => {
        const file = inpImgTeachers.files[0];
        
        if(file) {
            var img = new Image(); 
            img.src = URL.createObjectURL(file);
            
            img.onerror = function() {
                alert("Gagal memuat gambar. Pastikan file yang Anda pilih adalah gambar yang valid.");
                prevImgTeachers.src = '';
                file.value = '';
            }
            
            img.onload = function() {
                prevImgTeachers.src = URL.createObjectURL(file);
                file.value = img;
            }
        }
    });
    
    let linkActive = ["facebook-active", "instagram-active", "twitter-active", "tiktok-active", "youtube-active", "emails-active"];
    
    linkActive.forEach(link => {
        const linkEvent = document.getElementById(link);
        const inpLnkTeachers = linkEvent.parentElement.nextElementSibling.querySelector('input');
        const dvBgLabelCheck = linkEvent.previousElementSibling.querySelector('label div');
        const ballRollLabelCheck = linkEvent.previousElementSibling.querySelector('label div span');
        
        linkEvent.addEventListener('change', function() {
            if (this.checked) {
                this.value = "active";
                this.setAttribute('aria-checked', 'true');
                dvBgLabelCheck.style.backgroundColor = "rgba(37, 99, 235, 0.2)";
                ballRollLabelCheck.style.left = "100%";
                ballRollLabelCheck.style.transform = "translate(-100%, -50%)";
                inpLnkTeachers.classList.remove('hidden');
                setTimeout(() => {
                    inpLnkTeachers.classList.remove('opacity-0');
                }, 50);
            } else {
                this.value = "";
                this.setAttribute('aria-checked', 'false');
                dvBgLabelCheck.style.backgroundColor = "";
                ballRollLabelCheck.style.left = "0";
                ballRollLabelCheck.style.transform = "translate(0, -50%)";
                inpLnkTeachers.classList.remove('opacity-0');
                setTimeout(() => {
                    inpLnkTeachers.classList.add('hidden');
                }, 50);
            }
        });
    });
    
    // let idGender = ['femaleGenderTeachers', 'maleGenderTeachers'];
    // idGender.forEach(idInput => {
    //     const inputEvent = document.getElementById(idInput);
    //     const wrapperInput = inputEvent.parentElement;
    //     const labelElement = inputEvent.nextElementSibling.querySelector('label .labelRadio');
    //     inputEvent.addEventListener('change', function() {
    //         if (this.checked) {
    //             wrapperInput.classList.add('bg-slate-900', 'border-slate-600');
    //             labelElement.classList.add('bg-slate-500');
    //         } else {
    //             wrapperInput.classList.remove('bg-slate-900', 'border-slate-600');
    //             labelElement.classList.remove('bg-slate-500');
    //         }
    //     });
    // });
    // const chooseGender = document.querySelectorAll('.list-chooseItems');
    // chooseGender.forEach((choose) => {
    //     const inputChoose = choose.querySelector('input');
    //     const labelElement = choose.querySelector('label .labelRadio');
    //     const nextElement = choose.parentElement.nextElementSibling;
    //     inputChoose.addEventListener('change', () => {
    //         choose.classList.remove('bg-slate-900', 'border-slate-600');
    //         labelElement.classList.remove('bg-slate-500');
    //         if (inputChoose.checked) {
    //             choose.classList.add('bg-slate-900', 'border-slate-600');
    //             labelElement.classList.add('bg-slate-500');
    //         } else {
    //             choose.classList.remove('bg-slate-900', 'border-slate-600');
    //             labelElement.classList.remove('bg-slate-500');
    //         }
    //     });
    // });
});


// $(document).ready(function () {
//     const wrapperGender = $('.list-chooseItems');
//     const inputGender = wrapperGender.find('input');

//     $(inputGender).change(function() {
//         if(this.checked) {
//             $(wrapperGender).addClass('bg-slate-900').addClass('border-slate-600');
//             $(this.nextElementSibling).find('label .labelRadio').addClass('bg-slate-500');
//         } else {
//             $(wrapperGender).removeClass('bg-slate-900').removeClass('border-slate-600');
//             $(this.nextElementSibling).find('label .labelRadio').removeClass('bg-slate-500');
//         }
//     });
// });