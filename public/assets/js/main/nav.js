document.addEventListener("DOMContentLoaded", function() {
    const tglBtnWrapper = document.getElementById('tglBtn-navWrapper');
    const tglClsBtnWrapper = document.getElementById('tglClsBtn-navWrapper');
    const navbarWrapper = document.querySelector('.navigation-wrap');
    
    tglBtnWrapper.addEventListener('click', function() {
        navbarWrapper.classList.toggle('hidden'); // Menggunakan toggle untuk menambah/menghapus kelas 'hidden'
    });
    tglClsBtnWrapper.addEventListener('click', function() {
        navbarWrapper.classList.toggle('hidden'); // Menggunakan toggle untuk menambah/menghapus kelas 'hidden'
    });
    document.addEventListener('click', function(event) {
        const isClickInsideNavbar = navbarWrapper.contains(event.target); // Memeriksa apakah klik terjadi di dalam elemen navbar
        const isClickInsideToggle = tglBtnWrapper.contains(event.target); // Memeriksa apakah klik terjadi di dalam tombol yang menampilkan navbar
        
        if (!isClickInsideNavbar && !isClickInsideToggle) {
            navbarWrapper.classList.add('hidden'); // Menambah kelas 'hidden' untuk menyembunyikan navbar jika klik diluar elemen tersebut
        }
    });
});