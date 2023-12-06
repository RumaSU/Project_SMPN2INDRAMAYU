document.addEventListener("DOMContentLoaded", function() {
    const tglBtnWrapper = document.getElementById('tglBtn-navWrapper');
    const tglClsBtnWrapper = document.getElementById('tglClsBtn-navWrapper');
    const navbarWrapper = document.getElementById('navigation-mobile');
    
    tglBtnWrapper.addEventListener('click', function() {
        navbarWrapper.classList.remove('hidden'); // Menggunakan toggle untuk menambah/menghapus kelas 'hidden'
        document.body.classList.add('overflow-hidden');
    });
    tglClsBtnWrapper.addEventListener('click', function() {
        navbarWrapper.classList.add('hidden'); // Menggunakan toggle untuk menambah/menghapus kelas 'hidden'
        document.body.classList.remove('overflow-hidden')
    });
    document.addEventListener('click', function(event) {
        const isClickInsideNavbar = navbarWrapper.contains(event.target); // Memeriksa apakah klik terjadi di dalam elemen navbar
        const isClickInsideToggle = tglBtnWrapper.contains(event.target); // Memeriksa apakah klik terjadi di dalam tombol yang menampilkan navbar
        
        if (!isClickInsideNavbar && !isClickInsideToggle) {
            navbarWrapper.classList.add('hidden'); // Menambah kelas 'hidden' untuk menyembunyikan navbar jika klik diluar elemen tersebut
        }
    });
    window.addEventListener('resize', () => {
        navbarWrapper.classList.add('hidden'); // Menggunakan toggle untuk menambah/menghapus kelas 'hidden'
        document.body.classList.remove('overflow-hidden')
    })
});