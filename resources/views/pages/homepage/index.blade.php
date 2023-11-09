@extends('layouts.main.main')
@section('link-rel')
    <link rel="stylesheet" href="assets/css/homepage/shd-content.css">
@endsection
@section('content')
    <section
        class="img-shortInfo flex flex-wrap justify-center items-center bg-gradient-to-b from-blue-800 to-blue-600 pt-16 pb-8 md:pb-28 rounded-b-[15%] md:rounded-b-[45%] lg:rounded-b-[60%]">
        <div class="shortInfo self-center m-5" style="width: 30rem">
            <div class="titlePage">
                <h1 class="text-white text-2xl font-bold">
                    Selamat Datang di <br>
                    Situs Web SMP Negeri 2 Indramayu
                </h1>
            </div>
            <div class="descPage">
                <p class="mt-4 line-clamp-2 text-white text-sm">Menghadirkan kemudahan akses informasi yang cepat dan tepat,
                    untuk dunia pendidikan yang lebih baik</p>
            </div>
            <div class="btnHrefQuick mt-10 flex flex-column items-center gap-12">
                <a href=""
                    class="hrefProfileSchool group bg-white  py-3 px-6 rounded-lg text-black text-sm font-bold hover:bg-white/90">
                    <p>Profil Sekolah</p>
                </a>
                <a href=""
                    class="hrefNews group py-3 px-6 border border-white rounded-lg text-white text-sm font-bold hover:bg-transparent/10">
                    <p>Berita Terbaru</p>
                </a>
            </div>
        </div>
        <div class="imgInfo border border-black w-52 h-52 md:scale-125 rounded-lg relative group m-5">
            <div class="btnNext-back">
                <div onclick="previousSlide()"
                    class="btnBackImg absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1 py-3 opacity-0 hover:-translate-x-3/4 hover:opacity-100 hover:cursor-pointer rounded-md hover:bg-white/50 transition-all">
                    <i class="bi bi-chevron-compact-left text-4xl"></i>
                </div>
                <div onclick="nextSlide()"
                    class="btnNextImg absolute right-0 top-1/2 -translate-y-1/2 translate-x-1 py-3 opacity-0 hover:translate-x-3/4 hover:opacity-100 hover:cursor-pointer rounded-md hover:bg-white/50 transition-all">
                    <i class="bi bi-chevron-compact-right text-4xl"></i>
                </div>
            </div>
            <div class="listImg">
                <img src="assets/img/main/126465066756.jpg" alt="img1"
                    class="object-cover object-center aspect-square rounded-lg text-center items-center">
                <img src="assets/img/main/example-image2.png" alt="img1"
                    class="object-cover object-center aspect-square rounded-lg text-center items-center hidden">
                <img src="assets/img/main/example-image.jpg" alt="img2"
                    class="object-cover object-center aspect-square rounded-lg text-center items-center hidden">
                <img src="assets/img/main/vecteezy_abstract-black-and-white-pattern-like-psychedelic_.jpg" alt="img3"
                    class="object-cover object-center aspect-square rounded-lg text-center items-center hidden">
                <img src="assets/img/icon/add-b.png" alt="img4"
                    class="object-cover object-center aspect-square rounded-lg text-center items-center hidden">
            </div>
        </div>
    </section>

    <section class="shortcutGoto mt-16">
        <div class="titleS text-center text-blue-800 font-bold">
            <h2>Silahkan Jelajahi Informasi Lebih Lanjut</h2>
        </div>
        <div class="contShortcut mt-12 flex flex-wrap justify-center items-center gap-16">
            <div class="bg-white drop-shadow-xl p-8 text-center rounded-lg w-48 md:w-72">
                <div class="theImg flex justify-center items-center mb-6">
                    <img src="assets/img/icon/target.png" alt="" class="w-32 object-contain">
                </div>
                <strong class="text-bold" style="font-size: .95rem">VISI MISI</strong>
                <p class="mt-5 text-sm text-gray-500 line-clamp-4 md:line-clamp-none">Temukan lebih banyak tentang visi dan
                    misi sekolah kami, pandangan kami untuk masa depan dan tujuan kami.</p>
            </div>
            <div class="bg-white drop-shadow-xl p-8 text-center rounded-lg w-48 md:w-72">
                <div class="theImg flex justify-center items-center mb-6">
                    <img src="assets/img/icon/monitor.png" alt="" class="w-32 object-contain">
                </div>
                <strong class="text-bold" style="font-size: .95rem">SARANA DAN PRASARANA</strong>
                <p class="mt-5 text-sm text-gray-500 line-clamp-4 md:line-clamp-none">Lihat fasilitas dan infrastruktur yang
                    kami miliki untuk mendukung pendidikan.</p>
            </div>
            <div class="bg-white drop-shadow-xl p-8 text-center rounded-lg w-48 md:w-72">
                <div class="theImg flex justify-center items-center mb-6">
                    <img src="assets/img/icon/newspaper.png" alt="" class="w-32 object-contain">
                </div>
                <strong class="text-bold" style="font-size: .95rem">VISI MISI</strong>
                <p class="mt-5 text-sm text-gray-500 line-clamp-4 md:line-clamp-none">Dapatkan berita terbaru, pengumuman
                    penting, dan informasi acara sekolah</p>
            </div>
            <div class="bg-white drop-shadow-xl p-8 text-center rounded-lg w-48 md:w-72">
                <div class="theImg flex justify-center items-center mb-6">
                    <img src="assets/img/icon/target.png" alt="" class="w-32 object-contain">
                </div>
                <strong class="text-bold" style="font-size: .95rem">GALERI</strong>
                <p class="mt-5 text-sm text-gray-500 line-clamp-4 md:line-clamp-none">Jelajahi koleksi foto dari berbagai
                    kegiatan dan momen sekolah yang berharga</p>
            </div>
        </div>
    </section>

    <section class="principle mt-32 flex flex-wrap justify-center items-center gap-[75px]">
        <div class="photo-principle my-auto">
            <div class="img-pri relative p-4 w-[280px] h-[400px]">
                <div class="blur-effect absolute w-[250px] h-[370px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#AFAFAF]"
                    style="background: linear-gradient(30deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 85.94%, #FFF 95.31%, #FFF 100%), linear-gradient(331deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 85.56%, #FFF 94.83%, #FFF 99.47%), linear-gradient(0deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(90deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50.01%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(270deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(209deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50.01%, #FFF 87.5%, #FFF 100%), linear-gradient(151deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.88) 83.33%, #FFF 89.56%, #FFF 100%);">
                </div>
                <img src="assets/img/main/126465066756.jpg" class="object-center object-cover w-full h-full" alt="">
            </div>
        </div>
        <div
            class="quote-principle align-self-center self-center p-4 w-[600px] h-[400px] lg:w-[800px] lg:h-[600px] shadow-xl rounded-xl relative ">
            <div class="icon-quote absolute left-[8%] top-[8%] -translate-x-[8%] -translate-y-[8%]">
                <img src="assets/img/icon/quote.png" class="w-[75px] h-[75px]" alt="">
            </div>
            <div
                class="quote mt-24 lg:mt-32 self-center w-3/4 h-1/2 mx-auto text-base lg:text-lg border-2 border-dashed border-black/40 p-4 rounded-2xl">
                <p>Lorem ipsum dolor amet</p>
            </div>
            <div class="detail-person w-3/4 mt-8 mx-auto">
                <div class="name-person text-[15px] lg:text-[26px] text-[#4f4f4f]">
                    <strong>Name person</strong>
                </div>
                <div class="position-person text-[12px] lg:text-[16px] text-[#808080]">
                    Kepala Sekolah
                </div>
            </div>
        </div>
    </section>

    <hr class="my-32 mx-auto bg-black/40 h-1 w-[95%]">

    <section class="statisticSchool bg-[#0000FF] text-white uppercase p-8 py-12">
        <div class="titleStatistics text-center self-center">
            <h2 class="text-3xl font-bold">Statistik</h2>
            <p
                class="text-center text-sm font-bold text-white/60 mt-0 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">
                2023</p>
        </div>
        <div
            class="listStatistics mt-8 flex flex-col md:flex-row justify-center items-center gap-20 md:gap-28 sm:flex-wrap">
            <div class="totalStudents text-center">
                <h3 class="text-3xl font-bold">100</h3>
                <p
                    class="text-xs text-white/60 mt-2 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">
                    Siswa</p>
            </div>
            <div class="totalTeachers text-center">
                <h3 class="text-3xl font-bold">100</h3>
                <p
                    class="text-xs text-white/60 mt-2 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">
                    Pendidik</p>
            </div>
            <div class="totalStaffs text-center">
                <h3 class="text-3xl font-bold">100</h3>
                <p
                    class="text-xs text-white/60 mt-2 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">
                    Tenaga Kependidikan</p>
            </div>
            <div class="totalInfrastructure text-center">
                <h3 class="text-3xl font-bold">100</h3>
                <p
                    class="text-xs text-white/60 mt-2 relative after:absolute after:border-b after:border-white/60 after:w-8 after:h-1 after:left-1/2 after:bottom-0 after:-translate-x-1/2 after:-translate-y-0">
                    Sarana Prasarana</p>
            </div>
        </div>
    </section>

    <hr class="my-32 mx-auto bg-black/40 h-1 w-[95%]">

    <section class="galHomepage">
        <div class="titleGaleri text-center">
            <h2 class="text-4xl font-bold">Galeri</h2>
        </div>
        <div class="descGaleri text-center mt-8">
            <p class="text-[#727272] text-base w-1/2 mx-auto">
                Koleksi foto yang mengabadikan berbagai momen dan aktivitas di sekolah kami, dari prestasi akademik hingga
                kegiatan OSIS. Mari menjelajahi kenangan-kenangan berharga di sini.
            </p>
        </div>
        <div class="galAct-Insfra">
            <div class="chooseSHAct-Insfra relative mt-5 flex items-center justify-center gap-6 after:absolute after:-bottom-1.5 after:left-1/2 after:-translate-x-1/2 after:translate-y-1.5 after:border-b-2 after:border-[#0066FF] after:w-1/3 after:h-auto">
                <button type="button" class="galAct bg-transparent px-12 py-2 rounded-xl hover:bg-gray-400/[15%]" onclick="shAct()">
                    <div class="titleAct inline-flex items-center gap-3 text-xl">
                        <img src="assets/img/icon/icon baloon chats.svg" alt="" class="w-[50px]">
                        Kegiatan
                    </div>
                </button>
                <button type="button" class="galInsfra bg-transparent px-12 py-2 rounded-xl hover:bg-gray-400/[15%]" onclick="shInsfra()">
                    <div class="titleInsfra inline-flex items-center gap-3 text-xl">
                        <img src="assets/img/icon/icon-megaphone b.png" alt="" class="w-[50px]">
                        Sarpras
                    </div>
                </button>
            </div>
            <div class="contentAct-Insfra mt-12 md:px-20 relative">
                <div class="contentAct flex flex-wrap justify-between w-full space-y-6 lg:space-y-0 absolute show-content" id="contentAct">
                    <div class="descAct w-full lg:w-1/2 md:px-24 px-6">
                        <h2 class="text-xl font-bold">Beragam kegiatan menarik yang telah kami dokumentasikan selama di
                            SMPN Kami.</h2>
                        <p class="mt-6 mb-4">Kami ingin berbagi momen-momen berharga ini. Dari olahraga hingga seni, mari
                            jelajahi serunya masa SMP!</p>
                        <a href=""
                            class="text-xs text-white font-bold bg-[#0033CC] px-8 py-4 rounded-lg hover:contrast-200">Selengkapnya</a>
                    </div>
                    <div class="exampleImageAct flex flex-wrap justify-center items-center gap-1 px-12 lg:px-0 w-full h-72 lg:w-1/2 relative overflow-hidden">
                        {{-- <div class="imgAct1 w-60 absolute left-[5%] -translate-x-[5%]">
                            <img src="assets/img/dumb/imgtemp 1.jpg" alt=""
                                class="aspect-square object-cover object-center">
                        </div>
                        <div class="imgAct2 w-36 absolute -top-[50%] left-[50%] -translate-x-[50%] translate-y-[50%]">
                            <img src="assets/img/dumb/imgtemp 2.jpg" alt=""
                                class="aspect-[9/16] object-cover object-center">
                        </div>
                        <div class="imgAct3 w-20 absolute left-[70%] bottom-[10%] -translate-x-[70%] -translate-y-[10%]">
                            <img src="assets/img/dumb/imgtemp 3.jpg" alt=""
                                class="aspect-square object-cover object-center">
                        </div>
                        <div class="imgAct4 w-64 absolute top-[15%] left-[100%] -translate-x-[100%] -translate-y-[15%]">
                            <img src="assets/img/dumb/imgtemp 3.jpg" alt=""
                                class="aspect-video object-cover object-center">
                        </div> --}}
                        <img src="assets/img/dumb/imgtemp 1.jpg" alt="" class="h-36 md:h-40 lg:h-44 max-w-full object-cover object-center aspect-ratio aspect-square overflow-hidden">
                        <img src="assets/img/dumb/imgtemp 2.jpg" alt="" class="h-36 md:h-40 lg:h-44 max-w-full object-cover object-center aspect-ratio aspect-video overflow-hidden">
                        <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="h-36 md:h-40 lg:h-44 max-w-full object-cover object-center aspect-ratio aspect-[9/16] overflow-hidden">
                        {{-- <img src="assets/img/dumb/imgtemp 4.jpg" alt="" class="max-h-60 max-w-full object-cover object-center aspect-ratio aspect-square"> --}}
                    </div>
                </div>
                <div class="contentInsfra flex flex-wrap justify-between w-full space-y-6 lg:space-y-0 absolute hide-content-r" id="contentInsfra">
                    <div class="descInsfra w-full lg:w-1/2 md:px-24 px-6">
                        <h2 class="text-xl font-bold">Fasilitas yang Tersedia di SMP Kami</h2>
                        <p class="mt-6 mb-4">Berikut adalah fasilitas yang disediakan sekolah untuk menunjang kegiatan
                            belajar mengajar di sekolah guna mendapat hasil yang maskimal</p>
                        <a href=""
                            class="text-xs text-white font-bold bg-[#0033CC] px-8 py-4 rounded-lg hover:contrast-200">Selengkapnya</a>
                    </div>
                    <div class="exampleImageInsfra flex flex-wrap justify-center items-center gap-1 px-12 lg:px-0 w-full h-72 lg:w-1/2 relative overflow-hidden">
                        <img src="assets/img/dumb/imgtemp 1.jpg" alt="" class="h-36 md:h-40 lg:h-44 max-w-full object-cover object-center aspect-ratio aspect-square overflow-hidden">
                        <img src="assets/img/dumb/imgtemp 2.jpg" alt="" class="h-36 md:h-40 lg:h-44 max-w-full object-cover object-center aspect-ratio aspect-video overflow-hidden">
                        <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="h-36 md:h-40 lg:h-44 max-w-full object-cover object-center aspect-ratio aspect-[9/16] overflow-hidden">
                        <img src="assets/img/dumb/imgtemp 4.jpg" alt="" class="h-36 md:h-40 lg:h-44 max-w-full object-cover object-center aspect-ratio aspect-[4/3] overflow-hidden">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-script')
    <script src="assets/js/homepage/slidePhoto.js"></script>
    <script src="assets/js/homepage/galAct-Insfra.js"></script>
@endsection
