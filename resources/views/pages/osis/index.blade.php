@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="imgOssool-profiles relative">
        <div class="img-profiles flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
            style="background-image: url('assets/img/main/126465066756.jpg');">
            <div class="content relative z-10 selft-center">
                <h1 class="text-4xl font-bold">Osis </h1>
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
        <div class="descEks  mt-12 py-6 group">
            <div class="w-3/4 mx-auto text-center text-xl relative">
                <p class="line-clamp-6">
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
                <div class="editdescCtn scrollbar absolute z-10 -right-[5%] -top-0 translate-x-[5%] -translate-y-0 lg:-right-[2%] lg:-top-1/4 lg:translate-x-[2%] lg:translate-y-1/4 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                    <button class="editB p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <hr class="mt-28 mx-auto w-[90%] border-[1.5px] border-black/40 rounded-2xl">
    <section class="cTea mt-32 flex flex-wrap justify-center items-center gap-[75px]">
        <div class="photo-cTea my-auto" onclick="openPopup(this.querySelector('img').src)">
            <div class="img-pri relative p-4 w-[280px] h-[400px]">
                <div class="blur-effect absolute w-[250px] h-[370px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#AFAFAF]"
                    style="background: linear-gradient(30deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 85.94%, #FFF 95.31%, #FFF 100%), linear-gradient(331deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 85.56%, #FFF 94.83%, #FFF 99.47%), linear-gradient(0deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(90deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50.01%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(270deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(209deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50.01%, #FFF 87.5%, #FFF 100%), linear-gradient(151deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.88) 83.33%, #FFF 89.56%, #FFF 100%);">
                </div>
                <img src="assets/img/dumb/imgtemp 5.jpg" class="object-center object-cover w-full h-full" alt="">
            </div>
        </div>
        <div
            class="quote-cTea align-self-center self-center p-4 w-[600px] h-[400px] lg:w-[800px] lg:h-[600px] lg:shadow-xl rounded-xl relative ">
            <div class="icon-quote absolute left-[8%] top-[8%] -translate-x-[8%] -translate-y-[8%]">
                <img src="assets/img/icon/quote.png" class="w-[75px] h-[75px]" alt="">
            </div>
            <div
                class="quote mt-24 lg:mt-32 w-3/4 h-1/2 mx-auto text-base lg:text-lg border-2 border-dashed border-black/40 p-4 rounded-2xl">
                <div class="h-full flex justify-center items-center relative group">
                    <blockquote class="line-clamp-6">
                        Lorem ipsum dolor amet
                        Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                        Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                        Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                        Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                        Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                        Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                        Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                        Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                    </blockquote>
                    <div class="bSQutoe absolute top-0 right-0 -translate-y-0 -translate-x-0 hidden group-hover:block">
                        <button type="button" class="p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="detail-person w-3/4 mt-8 mx-auto">
                <div class="name-person text-[15px] lg:text-[26px] text-[#4f4f4f]">
                    <strong>Name person</strong>
                </div>
                <div class="position-person text-[12px] lg:text-[16px] text-[#808080]">
                    Pembina Osis
                </div>
            </div>
        </div>
    </section>
    <section class="deSum-Eksl mt-24">
        <div class="2xl:w-3/4 p-4 py-10 mx-auto bg-gray-100 2xl:rounded-xl">
            <div class="datSumEks flex flex-col md:flex-row justify-center items-center h-full gap-6 select-none">
                <div class="it1-leEks w-64 lg:w-54 p-6 rounded-lg hover:bg-gray-300/60">
                    <div class="tdat relative group">
                        <strong class="tiLeEks">Ketua</strong>
                        <div class="pcEdDatLeEks absolute -right-[10%] -top-1/4 -translate-x-[10%] -translate-y-1/4">
                            <button type="button" class="p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </div>
                    </div>
                    <div class="it1-datLe ">
                        <p class="nmeLeEks leading-4 max-w-[12rem] text-sm">
                            @{{Muhammad Elfaz Sulton}}
                        </p>
                    </div>
                </div>
                <div class="it2-memEks w-64 lg:w-54 p-6 rounded-lg hover:bg-gray-300/60">
                    <div class="tdat relative group">
                        <strong class="tiLeEks">Anggota</strong>
                        <div class="pcEdDatLeEks absolute -right-[10%] -top-1/4 -translate-x-[10%] -translate-y-1/4">
                            <button type="button" class="p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </div>
                    </div>
                    <div class="it2-datMem">
                        <p class="nmeLeEks text-sm pr-6">@{{Total}} Anggota</p>
                    </div>
                </div>
                <div class="it3-scmeEks w-64 lg:w-54 p-6 rounded-lg hover:bg-gray-300/60">
                    <div class="tdat relative group">
                        <strong class="tiLeEks">Sosial Media</strong>
                        <div class="pcEdDatLeEks absolute left-full top-1/2 -translate-x-full -translate-y-1/2">
                            <button type="button" class="p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </div>
                    </div>
                    <div class="liSocmedEks">
                        <ul class="flex items-center gap-2 text-2xl">
                            <li>
                                <a href="" class="icnSocmedEks hover:opacity-50"><i class="bi bi-facebook"></i></a>
                            </li>
                            <li>
                                <a href="" class="icnSocmedEks hover:opacity-50"><i class="bi bi-instagram"></i></a>
                            </li>
                            <li>
                                <a href="" class="icnSocmedEks hover:opacity-50"><i class="bi bi-twitter"></i></a>
                            </li>
                            <li>
                                <a href="" class="icnSocmedEks hover:opacity-50"><i class="bi bi-tiktok"></i></a>
                            </li>
                            <li>
                                <a href="" class="icnSocmedEks hover:opacity-50"><i class="bi bi-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="mt-28 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
    <section class="mt-8">
        <div class="strOrg px-24">
            <div class="chrt-stcOrgEks">
                <div class="titleChrt">
                    <div class="tSct w-fit py-3 px-6 bg-blue-400 rounded-xl text-white font-bold text-2xl">
                        <h2>Struktur Organisasi</h2>
                    </div>
                </div>
                <div class="chrtImg p-4">
                    <div class="theChrtImg mx-auto aspect-square max-w-4xl rounded-2xl relative">
                        <img src="assets/img/dumb/imgtemp 1.jpg" alt="" class="w-auto h-full object-cover object-center rounded-2xl" onclick="openPopup(this.src)">
                        <div class="pcEdDatLeEks absolute left-[102%] -top-[2%] -translate-x-[102%] translate-y-[2%] z-10">
                            <button type="button" class="p-2 bg-white rounded-xl border border-black hover:border-transparent relative after:absolute after:w-full after:h-full after:hover:border-2 after:rounded-xl after:hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                <i class="bi bi-pencil text-2xl"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="mt-28 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
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
@endsection
@section('custom-script')
    <script src="assets/js/students/formsInpExcel.js"></script>
    <script src="assets/js/students/grouplist.js"></script>
    <script src="assets/js/students/formsAdd.js"></script>
@endsection
