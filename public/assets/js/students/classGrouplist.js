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

// function shList(event) {
//     const listElement = event.parentElement.nextElementSibling;
    
//     listElement.classList.toggle('hidden');
//     event.classList.toggle('-rotate-90');
    
//     // const group = listElement.querySelectorAll('.group');
//     // group.forEach((items, index) => {
//     //     setTimeout(() => {
//     //         items.classList.toggle('hidden');
//     //     }, 250 * index); // Menambahkan penundaan berdasarkan index item.
//     // });
// }
$(document).ready(function() {
    $('.expandList').click(function (){
        // Mengambil nomor kelas dari kelas tombol yang ditekan (misalnya, VII, VIII, IX)
        let classNumber = $(this).closest('[class^="class-"]').attr('class').split('-')[1];

        // Menggunakan nomor kelas untuk mencari .list-class yang sesuai
        let $expandList = $(this).closest('.class-' + classNumber).find('.list-class');
        console.log($expandList);
        if($(this).hasClass('-rotate-90')) {
            $(this).removeClass('-rotate-90');
            $expandList.addClass('hidden');
        } else {
            $(this).addClass('-rotate-90');
            $expandList.removeClass('hidden');
        }
    });
    // $('.class-vii .expandList, .class-viii .expandList, .class-ix .expandList').click(function () {
    //     $whatClass = $(this);
    //     console.log($whatClass);
    //     if($whatClass === '.class-ix .expandList'){
    //         $('.class-ix .list-classIX').removeClass('hidden');
    //     } else {
    //         $(this).parent().next().removeClass('hidden');
    //     }
    // });
    $('#resetImageClass').click(function () {
        let img = $(this).parent().find('img');
        let inputSource = $(this).parent().find('input');
        img.attr('src', 'assets/img/main/marbled-paint-background.jpg');
        inputSource.val('');
    });
    $('.class-vii, .class-viii, .class-ix').Lazy();
});
// function expandList(parent) {
//     $(parent).find('list').show();
// }

