@extends('layouts.main')
@section('content')
    <div class="img-shortInfo bg-gradient-to-b from-blue-800 to-blue-600 flex flex-wrap justify-center align-items-center pt-16 pb-28">
        <div class="shortInfo self-center m-5" style="width: 30rem">
            <div class="titlePage">
                <h1 class="text-white text-2xl font-bold">
                    Selamat Datang di <br>
                    Situs Web SMP Negeri 2 Indramayu
                </h1>
            </div>
            <div class="descPage">
                <p class="mt-4 line-clamp-2 text-white text-sm">Menghadirkan kemudahan akses informasi yang cepat dan tepat, untuk dunia pendidikan yang lebih baik</p>
            </div>
            <div class="btnHrefQuick mt-10 flex flex-column align-items-center gap-12">
                <a href="" class="hrefProfileSchool group bg-white  py-3 px-6 rounded-lg text-black text-sm font-bold hover:bg-white/90">
                    <p>Profil Sekolah</p>
                </a>
                <a href="" class="hrefNews group py-3 px-6 border border-white rounded-lg text-white text-sm font-bold hover:bg-transparent/10">
                    <p>Berita Terbaru</p>
                </a>
            </div>
        </div>
        <div class="imgInfo border border-black w-96 h-96 rounded-lg relative group m-5">
            <div class="btnNext-back">
                <div onclick="nextSlide()" class="btnBackImg absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1 py-3 opacity-0 hover:-translate-x-3/4 hover:opacity-100 hover:cursor-pointer rounded-md hover:bg-white/50 transition-all">
                    <i class="bi bi-chevron-compact-left text-4xl" ></i>
                </div>
                <div onclick="previousSlide()" class="btnNextImg absolute right-0 top-1/2 -translate-y-1/2 translate-x-1 py-3 opacity-0 hover:translate-x-3/4 hover:opacity-100 hover:cursor-pointer rounded-md hover:bg-white/50 transition-all">
                    <i class="bi bi-chevron-compact-right text-4xl" ></i>
                </div>
            </div>
            <div class="listImg z-1">
                <img src="assets/img/main/126465066756.jpg" alt="img1" class="object-cover object-center w-full h-96 rounded-lg">
                <img src="assets/img/main/example-image.jpg" alt="img1" class="object-cover object-center w-full h-96 rounded-lg hidden">
                <img src="assets/img/main/vecteezy_abstract-black-and-white-pattern-like-psychedelic_.jpg" alt="img1" class="object-cover object-center w-full h-96 rounded-lg hidden">
                <img src="assets/img/main/126465066756.jpg" alt="img1" class="object-cover object-center w-full h-96 rounded-lg hidden">
            </div>
        </div>
    </div>
    
    <div class="shortcutGoto mt-16">
        <div class="titleS text-center text-blue-800 font-bold">
            <h2>Silahkan Jelajahi Informasi Lebih Lanjut</h2>
        </div>
        <div class="contShortcut mt-6 flex flex-wrap justify-center align-items-center gap-16">
            <div class="bg-white drop-shadow-xl p-8 w-72 text-center rounded-lg">
                <div class="theImg flex justify-center align-items-center mb-6">
                    <img src="assets/img/icon/target.png" alt="" class="w-32 object-contain">
                </div>
                <strong class="text-bold" style="font-size: .95rem">VISI MISI</strong>
                <p class="mt-5 text-sm text-gray-500">Temukan lebih banyak tentang visi dan misi sekolah kami, pandangan kami untuk masa depan dan tujuan kami.</p>
            </div>
            <div class="bg-white drop-shadow-xl p-8 w-72 text-center rounded-lg">
                <div class="theImg flex justify-center align-items-center mb-6">
                    <img src="assets/img/icon/monitor.png" alt="" class="w-32 object-contain">
                </div>
                <strong class="text-bold" style="font-size: .95rem">SARANA DAN PRASARANA</strong>
                <p class="mt-5 text-sm text-gray-500">Lihat fasilitas dan infrastruktur yang kami miliki untuk mendukung pendidikan.</p>
            </div>
            <div class="bg-white drop-shadow-xl p-8 w-72 text-center rounded-lg">
                <div class="theImg flex justify-center align-items-center mb-6">
                    <img src="assets/img/icon/newspaper.png" alt="" class="w-32 object-contain">
                </div>
                <strong class="text-bold" style="font-size: .95rem">VISI MISI</strong>
                <p class="mt-5 text-sm text-gray-500">Dapatkan berita terbaru, pengumuman penting, dan informasi acara sekolah</p>
            </div>
            <div class="bg-white drop-shadow-xl p-8 w-72 text-center rounded-lg">
                <div class="theImg flex justify-center align-items-center mb-6">
                    <img src="assets/img/icon/target.png" alt="" class="w-32 object-contain">
                </div>
                <strong class="text-bold" style="font-size: .95rem">GALERI</strong>
                <p class="mt-5 text-sm text-gray-500">Jelajahi koleksi foto dari berbagai kegiatan dan momen sekolah yang berharga</p>
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
    <script src="assets/js/homepage/slidePhoto.js"></script>
@endsection