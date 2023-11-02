@extends('layouts.main')
@section('content')
    <section class="img-shortInfo flex flex-wrap justify-center align-items-center bg-gradient-to-b from-blue-800 to-blue-600 pt-16 pb-28 rounded-b-[60%] sm:rounded-b-[30%]">
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
    </section>
    
    <section class="shortcutGoto mt-16">
        <div class="titleS text-center text-blue-800 font-bold">
            <h2>Silahkan Jelajahi Informasi Lebih Lanjut</h2>
        </div>
        <div class="contShortcut mt-12 flex flex-wrap justify-center align-items-center gap-16">
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
    </section>
    
    <section class="principle mt-32 flex flex-wrap justify-center align-items-center gap-[75px]">
        <div class="photo-principle my-auto">
            <div class="img-pri relative p-4 w-[280px] h-[400px]">
                <div class="blur-effect absolute w-[250px] h-[370px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#AFAFAF]" 
                    style="background: linear-gradient(30deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 85.94%, #FFF 95.31%, #FFF 100%), linear-gradient(331deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 85.56%, #FFF 94.83%, #FFF 99.47%), linear-gradient(0deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(90deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50.01%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(270deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(209deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50.01%, #FFF 87.5%, #FFF 100%), linear-gradient(151deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.88) 83.33%, #FFF 89.56%, #FFF 100%);"></div>
                <img src="assets/img/main/126465066756.jpg" class="object-center object-cover w-full h-full" alt="">
            </div>
        </div>
        <div class="quote-principle align-self-center self-center p-4 w-[800px] h-[600px] shadow-xl rounded-xl relative ">
            <div class="icon-quote absolute left-[8%] top-[8%] -translate-x-[8%] -translate-y-[8%]">
                <img src="assets/img/icon/quote.png" class="w-[75px] h-[75px]" alt="">
            </div>
            <div class="quote mt-32 self-center w-3/4 h-1/2 mx-auto text-[26px] p-2">
                <p>Lorem ipsum dolor amet</p>
            </div>
            <div class="detail-person w-3/4 mt-8 mx-auto">
                <div class="name-person text-[26px] text-[#4f4f4f]">
                    <strong>Name person</strong>
                </div>
                <div class="position-person text-[20px] text-[#808080]">
                    Kepala Sekolah
                </div>
            </div>
        </div>
    </section>
    
    <hr class="my-32 mx-auto bg-black/40 h-1 w-[95%]">
    
    <section class="statisticSchool bg-[#0000FF] text-white uppercase p-8">
        <div class="titleStatistics text-center self-center">
            <h2 class="text-3xl font-bold">Statistik</h2>
            <p class="text-center text-sm font-bold text-white/60 mt-0 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">2023</p>
        </div>
        <div class="listStatistics mt-8 flex flex-wrap justify-center align-items-center gap-20 sm:flex-wrap">
            <div class="totalStudents text-center">
                <h3 class="text-3xl font-bold">100</h3>
                <p class="text-xs text-white/60 mt-2 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">Siswa</p>
            </div>
            <div class="totalTeachers text-center">
                <h3 class="text-3xl font-bold">100</h3>
                <p class="text-xs text-white/60 mt-2 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">Pendidik</p>
            </div>
            <div class="totalStaffs text-center">
                <h3 class="text-3xl font-bold">100</h3>
                <p class="text-xs text-white/60 mt-2 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">Tenaga Kependidikan</p>
            </div>
            <div class="totalInfrastructure text-center">
                <h3 class="text-3xl font-bold">100</h3>
                <p class="text-xs text-white/60 mt-2 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">Sarana Prasarana</p>
            </div>
        </div>
    </section>
    
    <hr class="my-32 mx-auto bg-black/40 h-1 w-[95%]">
@endsection
@section('custom-script')
    <script src="assets/js/homepage/slidePhoto.js"></script>
@endsection