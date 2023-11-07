// const expandButtons = document.querySelectorAll('.expandList');
    
// expandButtons.forEach(button => {
//     button.addEventListener('click', () => {
//         // Toggle class 'expanded' pada parent dari tombol
//         const listElement = button.parentElement.querySelector('.list');
//         listElement.classList.toggle('hidden');
        
//         // Memperbaiki rotasi tombol jika diinginkan
//         button.querySelector('.bi').classList.toggle('rotate-45');
//     });
// });

function shList(event) {
    const listElement = event.parentElement.nextElementSibling;
    
    listElement.classList.toggle('hidden');
    event.classList.toggle('-rotate-90');
    
    // const group = listElement.querySelectorAll('.group');
    // group.forEach((items, index) => {
    //     setTimeout(() => {
    //         items.classList.toggle('hidden');
    //     }, 250 * index); // Menambahkan penundaan berdasarkan index item.
    // });
}

