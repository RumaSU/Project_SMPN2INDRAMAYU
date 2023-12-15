// function openExcelPopUp(value) {
//     const popup = document.getElementById('confInpExcForm');
//     const file = document.getElementById('labsFmtExcel');
//     const overlayPopUp = document.getElementById('overlayPopUp');
    
//     // file.src = imageSrc;
    
//     // image.onload = function () {
//     //     document.body.style.overflow = "hidden";
//     //     overlayPopUp.classList.remove('hidden');
//     //     popup.style.top = "50%";
//     //     popup.style.opacity = "1";
//     //     popup.style.visibility = "visible";
//     // };
    
//     document.body.style.overflow = "hidden";
//     overlayPopUp.classList.remove('hidden');
//     popup.style.top = "50%";
//     popup.style.opacity = "1";
//     popup.style.visibility = "visible";
//     // file.innerText = value;
//     // Set nilai elemen label dengan nilai nama file
//     // file.innerText = input.value.split('\\').pop(); // Mendapatkan nama file dari path lengkap
//     file.innerText = document.getElementById('fmtExcel').value.split('\\').pop();
// }

// function closeExcelPopUp() {
//     const popup = document.getElementById('confInpExcForm');
//     const file = document.getElementById('labsFmtExcel');
//     const overlayPopUp = document.getElementById('overlayPopUp');
    
//     document.body.style.overflow = "";
//     overlayPopUp.classList.add('hidden');
//     popup.style.top = "200%";
//     popup.style.opacity = "0";
//     popup.style.visibility = "hidden";
    
//     file.innerText = "";
//     file.value = null;
    
//     // image.onload = null;
//     // image.src = "";
// }