@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="imgOssool-profiles relative">
        <div class="img-profiles flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
            style="background-image: url('assets/img/main/126465066756.jpg');">
            <div class="content relative z-10 selft-center">
                <h1 class="text-4xl font-bold">Profil Sekolah </h1>
            </div>
        </div>
        {{-- <div class="profiles text-center text-xl font-bold space-y-4 absolute z-10 left-1/2 bottom-0 -translate-x-1/2" >
            <div class="imgSch mx-auto w-72 relative group">
                <div class="aspect-square rounded-[100%] overflow-hidden border-4 p-2 bg-white relative">
                    <img src="assets/img/main/126465066756.jpg" alt="" class="w-full h-full object-cover object-center rounded-[100%]" onclick="openPopup('assets/img/main/126465066756.jpg')">
                </div>
                <div class="editimgSch absolute right-[5%] top-[15%] -translate-x-[5%] -translate-y-[15%] opacity-0 transition-opacity group-hover:opacity-100">
                    <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
            </div>
        </div> --}}
        {{-- <div class="justBox border-2 border-black w-72 aspect-square bg-white/50 absolute z-10 left-1/2 top-[40%] -translate-x-1/2 -translate-y-[40%]"></div> --}}
        {{-- <div class="imgSch mx-auto w-72 group text-center text-xl font-bold absolute z-10 left-1/2 top-3/4 -translate-x-1/2 -translate-y-3/4"> --}}
        <div class="imgOss mx-auto w-72 -mt-36 group text-center text-xl font-bold relative">
            <div class="aspect-square rounded-[100%] overflow-hidden border-4 p-2 bg-white relative">
                <img src="assets/img/main/126465066756.jpg" alt="" class="w-full h-full object-cover object-center rounded-[100%]" onclick="openPopup(this.src)">
            </div>
            <div class="editimgOss absolute right-[5%] top-[15%] -translate-x-[5%] -translate-y-[15%] opacity-0 transition-opacity group-hover:opacity-100">
                <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                    <i class="bi bi-pencil"></i>
                </button>
            </div>
        </div>
        <div class="descEks w-3/4 mx-auto text-center text-xl mt-12 relative border border-black group">
            <p class="relative border border-black">
                Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                {{-- <div class="editdescCtn absolute z-10 -right-1/2 lg:right-0 -top-1/2 translate-x-[5%] lg:translate-x-0 -translate-y-1/2 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                    <button class="editB p-2 after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div> --}}
            </p>
            <div class="editdescCtn absolute z-10 -right-0 lg:right-0 -top-1/4 translate-x-0 lg:translate-x-0 -translate-y-0 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                <button class="editB p-2 after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                    <i class="bi bi-pencil"></i>
                </button>
            </div>
        </div>
    </section>
    <section class="viMi-Schools mt-24 flex flex-col lg:flex-row items-center justify-center lg:px-48">
        <div class="visiMisi mx-auto w-1/2">
            <div class="titleViMi w-48 py-4 px-6 bg-blue-400 text-center text-white font-bold rounded-2xl">
                VISI MISI
            </div>
            <div class="visi group relative mt-2 ml-6 inline-block">
                <div class="VisiCtn cursor-default select-none">
                    <p class="">Lorem Ipsum Dolor Amet</p>
                </div>
                <div class="editVisiCtn absolute z-10 -right-[15%] -top-1/3 translate-x-[15%] -translate-y-1/3 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                    <button class="editB px-2 py-1 after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
            </div>
            <div class="misi mt-4 text-sm space-y-6 leading-4 select-none">
                <div class="misi-1 relative group pl-2 flex justify-evenly items-center gap-4">
                    <i class="bi bi-check-circle-fill text-3xl text-blue-400"></i>
                    <p>Lorem ipsum dolor sit amet, consectur adipiscing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua</p>
                    <div class="editMs1Ctn absolute z-10 -right-[5%] lg:right-0 -top-1/3 translate-x-[5%] lg:translate-x-0 -translate-y-1/3 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                        <button class="editB p-2 after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                </div>
                <div class="misi-2 relative group pl-2 flex justify-evenly items-center gap-4">
                    <i class="bi bi-check-circle-fill text-3xl text-blue-400"></i>
                    <p>Lorem ipsum dolor sit amet, consectur adipiscing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua</p>
                    <div class="editMs1Ctn absolute z-10 -right-[5%] lg:right-0 -top-1/3 translate-x-[5%] lg:translate-x-0 -translate-y-1/3 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                        <button class="editB p-2 after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                </div>
                <div class="misi-3 relative group pl-2 flex justify-evenly items-center gap-4">
                    <i class="bi bi-check-circle-fill text-3xl text-blue-400"></i>
                    <p>Lorem ipsum dolor sit amet, consectur adipiscing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua</p>
                    <div class="editMs1Ctn absolute z-10 -right-[5%] lg:right-0 -top-1/3 translate-x-[5%] lg:translate-x-0 -translate-y-1/3 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                        <button class="editB p-2 after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                </div>
                <div class="misi-4 relative group pl-2 flex justify-evenly items-center gap-4">
                    <i class="bi bi-check-circle-fill text-3xl text-blue-400"></i>
                    <p>Lorem ipsum dolor sit amet, consectur adipiscing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua</p>
                    <div class="editMs1Ctn absolute z-10 -right-[5%] lg:right-0 -top-1/3 translate-x-[5%] lg:translate-x-0 -translate-y-1/3 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                        <button class="editB p-2 after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                </div>
                <div class="misi-5 relative group pl-2 flex justify-evenly items-center gap-4">
                    <i class="bi bi-check-circle-fill text-3xl text-blue-400"></i>
                    <p>Lorem ipsum dolor sit amet, consectur adipiscing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua</p>
                    <div class="editMs1Ctn absolute z-10 -right-[5%] lg:right-0 -top-1/3 translate-x-[5%] lg:translate-x-0 -translate-y-1/3 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                        <button class="editB p-2 after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="phtShAct w-1/2 relative select-none">
            <div class="phSh mx-auto border-gray aspect-square absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                <img src="assets/img/main/126465066756.jpg" alt="" class="w-full h-full object-cover object-center rounded-2xl shadow-xl shadow-gray-500" onclick="openPopup(this.src)">
                <div class="ActSch text-center flex justify-center items-center shadow-md shadow-black p-3 w-32 aspect-square bg-sky-400 rounded-2xl border absolute -left-[25%] -bottom-[12.5%] translate-x-[25%] translate-y-[12.5%]">
                    {{-- <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"> --}}
                    <div class="relative z-10 space-y-4 text-white">
                        <p class="relative text-sm font-bold">Akreditasi</p>
                        <p class="Acdts relative text-6xl font-bold">
                            A
                        </p>
                    </div>
                    <i class="bi bi-award text-7xl text-sky-500 absolute left-0 top-0 -translate-x-0 -translate-y-0"></i>
                </div>
            </div>
        </div>
    </section>
    <hr class="mt-28 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
    <section class="mt-12">
        <div class="flex justify-center items-center gap-24">
            <div class="npsnSch flex gap-4">
                <div class="imgIcP w-20">
                    <img src="assets/img/icon/pen.png" alt="">
                </div>
                <div class="dctnNpsn max-w-[11rem] flex flex-col justify-between">
                    <p class="text-xl font-bold"> 20216018 </p>
                    <p class="text-xs leading-3">Nomor Pokok Sekolah Nasional (NPSN)</p>
                </div>
            </div>
            <div class="arSch flex gap-4">
                <div class="imgIcLr w-20">
                    <img src="assets/img/icon/layer.png" alt="">
                </div>
                <div class="dctnAr max-w-[11rem] flex flex-col justify-between">
                    <p class="text-xl font-bold"> 1000 m<sup>2</sup> </p>
                    <p class="text-xs leading-3">Luas Tanah</p>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-20">
        <div class="shrcRcEksTe relative h-96">
            <div class="img-bg flex items-center justify-center relative text-center text-white h-96 bg-cover bg-top bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-blue-700/80 after:w-full after:h-full"
                style="background-image: url('assets/img/main/126465066756.jpg');">
                <div class="content relative z-10 self-center">
                    <div class="ctnShrc flex flex-col lg:flex-row justify-center items-center gap-8 relative z-10 text-white h-full p-12">
                        <div class="rngKl flex gap-4 justify-center items-center max-w-[450px]">
                            <div class="nbr-Kl text-4xl xl:text-7xl font-bold">
                                {26}
                            </div>
                            <div class="descChild space-y-8 text-left">
                                <a href="" class="text-xl block group relative font-bold">
                                    Ruang Kelas
                                    <i class="bi bi-arrow-right hidden lg:block text-4xl transition-all absolute right-[10%] top-1/2 -translate-x-[10%] -translate-y-1/2 group-hover:right-0 group-hover:-translate-x-0"></i>
                                </a>
                                <p class="text-sm leading-4 line-clamp-2">Serta fasilitas penunjang kegiatan belajar mengajar lainnya</p>
                            </div>
                        </div>
                        <div class="rngEks flex gap-4 justify-center items-center max-w-[450px]">
                            <div class="nbr-Kl text-4xl xl:text-7xl font-bold">
                                {26}
                            </div>
                            <div class="descChild space-y-8 text-left">
                                <a href="" class="text-xl block group relative font-bold">
                                    Ekstrakurikuer
                                    <i class="bi bi-arrow-right hidden lg:block text-4xl transition-all absolute right-[10%] top-1/2 -translate-x-[10%] -translate-y-1/2 group-hover:right-0 group-hover:-translate-x-0"></i>
                                </a>
                                <p class="text-sm leading-4 line-clamp-2">Membantu peserta didik menyalurkan minat dan bakatnya.</p>
                            </div>
                        </div>
                        <div class="rngTe flex gap-4 justify-center items-center max-w-[450px]">
                            <div class="nbr-Kl text-4xl xl:text-7xl font-bold">
                                {26}
                            </div>
                            <div class="descChild space-y-8 text-left">
                                <a href="" class="text-xl block group relative font-bold">
                                    Pendidik
                                    <i class="bi bi-arrow-right hidden lg:block text-4xl transition-all absolute right-[10%] top-1/2 -translate-x-[10%] -translate-y-1/2 group-hover:right-0 group-hover:-translate-x-0"></i>
                                </a>
                                <p class="text-sm leading-4 line-clamp-2">Melalui Kualifikasi dan memiliki sertifikat sesuai bidangnya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-20">
        <div class="strOrg px-24 flex flex-col lg:flex-row items-center">
            <div class="chrt-fTeSt mt-12 w-1/2">
                <div class="titleSct">
                    <div class="tSct w-fit py-3 px-6 bg-blue-400 rounded-xl text-white font-bold">
                        <p>Struktur Organisasi</p>
                    </div>
                </div>
                <div class="chrtImg p-4">
                    <div class="theChrtImg mx-auto aspect-square overflow-hidden max-w-4xl rounded-2xl relative">
                        <img src="assets/img/dumb/imgtemp 1.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">                        
                    </div>
                </div>
            </div>
            <div class="fTeStImg p-4 w-1/2">
                <div class="thefImg mx-auto aspect-square overflow-hidden max-w-2xl rounded-2xl relative float-right">
                    <img src="assets/img/dumb/imgtemp 2.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">                   
                </div>
            </div>
        </div>
    </section>
    <section class="mt-24 bg-gray-200 p-20">
        <div class="mgSch">
            <div class="tiDscMg">
                <div class="ctnTiDscMg flex justify-between items-center">
                    <div class="tiMg text-7xl w-1/3 font-bold">
                        <h2>Manajemen Sekolah</h2>
                    </div>
                    <div class="dscMg">
                        <div class="ctnDscMg text-lg max-w-[40rem]">
                            <p>
                                Dibalik semua kegiatan sekolah dan menjalankan fungsinya, terdapat tim yang solid mengatur terlaksananya kegiatan tersebut.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="liMgSch mt-44 border border-black relative p-6">
                <div class="btnCLCR">

                </div>
                <div class="swpItmMg flex justify-between absolute space-x-6 border border-black w-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 overflow-hidden">
                    <div class="mgItems1 w-56">
                        <div class="imgItmMg">
                            <div class="thImgItm aspect-[3.5/4] overflow-hidden">
                                <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                            </div>
                        </div>
                        <div class="nJItm">
                            <div class="nmItm">
                                <strong>Nama</strong>
                            </div>
                            <div class="jbItm">
                                <p>Jabatannya</p>
                            </div>
                        </div>
                    </div>
                    <div class="mgItems1 w-56">
                        <div class="imgItmMg">
                            <div class="thImgItm aspect-[3.5/4] overflow-hidden">
                                <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                            </div>
                        </div>
                        <div class="nJItm">
                            <div class="nmItm">
                                <strong>Nama</strong>
                            </div>
                            <div class="jbItm">
                                <p>Jabatannya</p>
                            </div>
                        </div>
                    </div>
                    <div class="mgItems1 w-56">
                        <div class="imgItmMg">
                            <div class="thImgItm aspect-[3.5/4] overflow-hidden">
                                <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                            </div>
                        </div>
                        <div class="nJItm">
                            <div class="nmItm">
                                <strong>Nama</strong>
                            </div>
                            <div class="jbItm">
                                <p>Jabatannya</p>
                            </div>
                        </div>
                    </div>
                    <div class="mgItems1 w-56">
                        <div class="imgItmMg">
                            <div class="thImgItm aspect-[3.5/4] overflow-hidden">
                                <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                            </div>
                        </div>
                        <div class="nJItm">
                            <div class="nmItm">
                                <strong>Nama</strong>
                            </div>
                            <div class="jbItm">
                                <p>Jabatannya</p>
                            </div>
                        </div>
                    </div>
                    <div class="mgItems1 w-56">
                        <div class="imgItmMg">
                            <div class="thImgItm aspect-[3.5/4] overflow-hidden">
                                <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                            </div>
                        </div>
                        <div class="nJItm">
                            <div class="nmItm">
                                <strong>Nama</strong>
                            </div>
                            <div class="jbItm">
                                <p>Jabatannya</p>
                            </div>
                        </div>
                    </div>
                    <div class="mgItems1 w-56">
                        <div class="imgItmMg">
                            <div class="thImgItm aspect-[3.5/4] overflow-hidden">
                                <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                            </div>
                        </div>
                        <div class="nJItm">
                            <div class="nmItm">
                                <strong>Nama</strong>
                            </div>
                            <div class="jbItm">
                                <p>Jabatannya</p>
                            </div>
                        </div>
                    </div>
                    <div class="mgItems1 w-56">
                        <div class="imgItmMg">
                            <div class="thImgItm aspect-[3.5/4] overflow-hidden">
                                <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                            </div>
                        </div>
                        <div class="nJItm">
                            <div class="nmItm">
                                <strong>Nama</strong>
                            </div>
                            <div class="jbItm">
                                <p>Jabatannya</p>
                            </div>
                        </div>
                    </div>
                    <div class="mgItems1 w-56">
                        <div class="imgItmMg">
                            <div class="thImgItm aspect-[3.5/4] overflow-hidden">
                                <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                            </div>
                        </div>
                        <div class="nJItm">
                            <div class="nmItm">
                                <strong>Nama</strong>
                            </div>
                            <div class="jbItm">
                                <p>Jabatannya</p>
                            </div>
                        </div>
                    </div>
                    <div class="mgItems1 w-56">
                        <div class="imgItmMg">
                            <div class="thImgItm aspect-[3.5/4] overflow-hidden">
                                <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                            </div>
                        </div>
                        <div class="nJItm">
                            <div class="nmItm">
                                <strong>Nama</strong>
                            </div>
                            <div class="jbItm">
                                <p>Jabatannya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="foo mb-96"></div>
    <section id="pop-upFormAdd" class="pop-upFormAdd hidden fixed w-1/2 max-h-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2  px-8 py-6 bg-white border border-black rounded-2xl overflow-auto z-50">
        <div class="mx-auto">
            <button id="btrpp" type="button" class="icon border border-black rounded-lg absolute top-[5%] right-[5%] -translate-x-[5%] -translate-y-[5%]" onclick="closePopUpForm(this)">
                <i class="bi bi-x text-5xl"></i>
            </button>
            <form action="{{ route('storeClass') }}" method="POST" class="form-addClass space-y-6" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="classList" id="classInput" value="VII">
                <div class="imgClass block">
                    <div class="group bg-white regular-shadow w-80 h-80 border-dashed rounded-2xl overflow-hidden relative mx-auto">
                        <div class="button-editDel absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                            <label for="imgClass"  class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 cursor-pointer">
                                <i class="bi bi-pencil"></i>
                            </label>
                            <button type="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                        <img src="" alt="" id="previewImage" class="supImg w-full h-full object-cover object-center relative bg-gray-400/50">
                        <label for="imgClass" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all cursor-pointer">
                            <label for="imgClass" class="itemClass w-3/4 py-2 text-white text-center font-bold cursor-pointer bg-blue-400 rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%] hover:bg-cyan-500">
                                <i class="bi bi-plus-circle text-lg"></i>
                                Add Image
                            </label>
                        </label>
                        <input type="file" name="imgClass" id="imgClass" accept="image/*" class="w-15 h-15 border border-black sr-only" onchange="previewFile(event)" value="">
                    </div>
                </div>
                <div class="teClass">
                    <div class="theLabels">
                        <label for="teacher" class="teachers font-bold">Wali Kelas</label>
                    </div>
                    <input type="text" id="teacher" class="border w-full py-2 px-4 rounded-lg">
                </div>
                <div class="tagClass">
                    <div class="theLabels">
                        <label for="tagClass" class="tagClass font-bold">Tag</label>
                    </div>
                    <input type="text" name="tagClass" id="tagClass" class="border w-full py-2 px-4 rounded-lg">
                </div>
                <div class="descClass">
                    <div class="theLabels">
                        <label for="desc" class="descClass font-bold" >Deskripsi Kelas</label>
                    </div>
                    <textarea name="desc" id="desc" rows="3" class="border w-full h-auto py-2 px-4 rounded-lg resize-none" maxlength="250"></textarea>
                </div>
                <button type="submit" class="block border border-black py-2 px-12 rounded-xl mx-auto hover:bg-blue-400"> Simpan </button>
            </form>
        </div>
    </section>
    <div id="confInpExcForm" class="flex flex-col justify-center items-center gap-[10%] fixed text-center overflow-hidden z-50 p-6 w-full h-full lg:w-1/3 lg:h-1/3 bg-white border border-black rounded-3xl aspect-square" style="top: 200%; left:50%; transform:translate(-50%, -50%); visibility: hidden; opacity: 0; transition: all .3s ease-in-out">
        <div class="close-btn absolute py-1 px-4 rounded-xl z-10 right-[2%] top-[5%] -translate-x-[2%] -translate-y-[5%]" onclick="closeExcelPopUp()">
            <i class="bi bi-x-circle-fill p-2 text-red-600 bg-white border border-black rounded-xl cursor-pointer" onclick="closeExcelPopUp()"></i>
        </div>
        <h1 class="text-lg 2xl:text-2xl font-bold">Konfirmasi Upload File</h1>
        <p class="line-clamp-1 overflow-hidden overflow-ellipsis max-w-[80%]">
            File : <label for="fmtExcel" id="labsFmtExcel" class="cursor-pointer font-bold px-4 py-2 transition duration-300 ease-in-out relative after:absolute after:w-full after:h-full after:border-2 after:rounded-xl after:border-transparent after:hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">text.xlsx</label>
        </p>
        <div class="btnCaSb flex items-center gap-6">
            <button type="button" class="text-sm py-2 px-6 border-2 border-gray-600 bg-gray-100 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="closeExcelPopUp()">Cancel</button>
            <button type="button" class="text-sm text-white py-2 px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="document.getElementById('sbFmtExcel').click()">Submit</button>
        </div>
    </div>
@endsection
@section('custom-script')
    <script src="assets/js/students/formsInpExcel.js"></script>
    <script src="assets/js/students/grouplist.js"></script>
    <script src="assets/js/students/formsAdd.js"></script>
@endsection
