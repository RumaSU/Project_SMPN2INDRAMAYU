function showPopUpForm() {
    const popUpForm = document.getElementById('pop-upForm');
    popUpForm.classList.toggle('hidden');
}

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


// function showPopUpForm(event) {
//     const popUpForm = document.getElementById('pop-upFormAdd');
//     const inpValClass = document.getElementById('classList');
//     // if (!popUpForm.contains(event.target) && event.target !== event.target) {
//     //     if([...triggerButtons].some(button => button === '.btrpp-vii')) {
//     //         inpValClass.value = 'VII';
//     //     }
//     //     popUpForm.classList.toggle('hidden');
//     //     event.Attribute.toggle('disable');
//     // }
//     if (!popUpForm.contains(event.target) && event.target !== event.target) {
//         if (event.target.classList.contains('btrpp-vii')) {
//             inpValClass.value = 'VII';
//         }
//         else if (event.target.classList.contains('btrpp-viiI')) {
//             inpValClass.value = 'VIII';
//         }
//         else if (event.target.classList.contains('btrpp-ix')) {
//             inpValClass.value = 'IX';
//         }
//         popUpForm.classList.toggle('hidden');
//     } else {
//         popUpForm.classList.toggle('hidden');
//     }
// }

// function showPopUpForm(event) {
//     const popUpForm = document.getElementById('pop-upFormAdd');
//     const inpValClass = document.getElementById('classInput');
    
//     if (!popUpForm.contains(event.target) && event.target !== event.target) {
//         if (event.target.classList.contains('btrpp-vii')) {
//             inpValClass.value = 'VII';
//             event.target.idList.contains('btrpp-vii');
//         } else if (event.target.classList.contains('btrpp-viii')) {
//             inpValClass.value = 'VIII';
//         } else if (event.target.classList.contains('btrpp-ix')) {
//             inpValClass.value = 'IX';
//         }
        
//         popUpForm.classList.toggle('hidden');
//     } else {
//         popUpForm.classList.toggle('hidden');
//     }
// }


function showPopUpForm(event) {
    const popUpForm = document.getElementById('pop-upFormAdd');
    const overlayPopUp = document.getElementById('overlayPopUp');
    
    document.body.style.overflow = "hidden";
    popUpForm.classList.remove('hidden');
    overlayPopUp.classList.remove('hidden');

}

function closePopUpForm(event) {
    const popUpForm = document.getElementById('pop-upFormAdd');
    const overlayPopUp = document.getElementById('overlayPopUp');
    if (!popUpForm.contains(event.target) && event.target !== event) {
        document.body.style.overflow = "";
        popUpForm.classList.add('hidden');
        overlayPopUp.classList.add('hidden');
    }
}

function addVals(event) {
    const inpValClass = document.getElementById('classInput');
    if (event.classList.contains('btrpp-vii')) {
        inpValClass.value = "VII";
    } else if (event.classList.contains('btrpp-viii')) {
        inpValClass.value = "VIII";
    } else if (event.classList.contains('btrpp-ix')) {
        inpValClass.value = "IX";
    }
}




// document.addEventListener('click', function(event) {
//     const popUpForm = document.getElementById('pop-upFormAdd');
//     const triggerButtons = document.querySelectorAll('.btrpp-vii, .btrpp-viii, .btrpp-ix'); // Ganti '.buttonToTriggerPopup' dengan class yang sesuai

//     if ([...triggerButtons].some(button => button.contains(event.target))) {
//         popUpForm.classList.toggle('hidden');
//     } else if (!popUpForm.contains(event.target)) {
//         popUpForm.classList.add('hidden');
//     }
// });

// document.addEventListener('click', function(event) {
//     const popUpForm = document.getElementById('pop-upFormAdd');
//     const triggerButtons = document.querySelectorAll('.btrpp-vii, .btrpp-viii, .btrpp-ix');

//     if ([...triggerButtons].some(button => button.contains(event.target))) {
//         popUpForm.classList.toggle('hidden');
//     } else if (!popUpForm.contains(event.target)) {
//         popUpForm.classList.add('hidden');
//     }
// });

// function showPopUpForm(button) {
//     const popUpForm = document.getElementById('pop-upFormAdd');
//     popUpForm.classList.toggle('hidden');
// }
