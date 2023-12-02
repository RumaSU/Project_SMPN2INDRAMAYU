@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="imgEkstsool-profiles relative">
        <div class="img-profiles flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
            style="background-image: url('{{asset('assets/img/main/126465066756.jpg')}}');">
            <div class="content relative z-10 selft-center">
                <h1 class="text-4xl font-bold">Ekstrakurikuler</h1>
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
        <div class="imgEksts transition-all mx-auto w-52 lg:w-72 -mt-36 group text-center text-xl font-bold relative">
            <div class="aspect-square rounded-[100%] overflow-hidden border-4 p-2 bg-white relative">
                <img src="{{asset('assets/img/main/126465066756.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-[100%]" onclick="openPopup(this.src)">
            </div>
            <div class="editimgEksts absolute right-[5%] top-[15%] -translate-x-[5%] -translate-y-[15%] opacity-0 transition-opacity group-hover:opacity-100">
                <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                    <i class="bi bi-pencil"></i>
                </button>
            </div>
        </div>
        <div class="descEks p-6 group">
            <div class="w-full lg:w-3/4 transition-all md mx-auto text-center text-sm md:text-lg relative">
                <p class="line-clamp-6">
                    Eksrakurikler Lorem ipsum dolor sit amet
                    {{-- <div class="editdescCtn absolute z-10 -right-1/2 lg:right-0 -top-1/2 translate-x-[5%] lg:translate-x-0 -translate-y-1/2 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                        <button class="editB p-2 after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div> --}}
                </p>
                <div class="editdescCtn scrollbar absolute z-10 -right-[2%] -top-1/4 translate-x-[2%] translate-y-1/4 lg:-right-[2%] lg:-top-1/4 lg:translate-x-[2%] lg:translate-y-1/4 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                    <button class="editB p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="deSum-Eksl mt-24">
        <div class="2xl:w-3/4 p-4 py-10 mx-auto bg-gray-100 2xl:rounded-xl">
            <div class="datSumEks flex flex-col lg:flex-row justify-center items-center h-full gap-6 select-none">
                <div class="it1-leEks w-72 lg:w-54 p-6 rounded-lg hover:bg-gray-300/60">
                    <div class="TedatEks">
                        <div class="tDatEks w-full">
                            <div class="tdat relative group">
                                <strong class="tiLeEks text-lg">Pembina</strong>
                                <div class="pcEdDatLeEks absolute -right-[10%] -top-1/4 -translate-x-[10%] -translate-y-1/4">
                                    <button type="button" class="p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="it1-datMem">
                                <p class="nmeLeEks leading-4 max-w-[12rem] text-sm">
                                    Lihat Disini
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it2-Eks w-72 lg:w-54 p-6 rounded-lg hover:bg-gray-300/60">
                    <div class="leDatEks flex items-center gap-2">
                        <div class="leDatEks w-full">
                            <div class="leDat relative group">
                                <strong class="tiEks text-lg">Ketua</strong>
                                <div class="pcEdDatEks absolute -right-[10%] -top-1/4 -translate-x-[10%] -translate-y-1/4">
                                    <button type="button" class="p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="it1-dat">
                                <p class="nmeEks leading-4 max-w-[12rem] text-sm">
                                    Lihat Disini
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="it3-EksMem w-72 lg:w-54 p-6 rounded-lg hover:bg-gray-300/60">
                    <div class="countTdatEksMem flex items-center gap-2">
                        <div class="countToEksMem">
                            <strong class="text-3xl">
                                900
                            </strong>
                        </div>
                        <div class="tDatEksMem w-full">
                            <div class="tdat relative group">
                                <strong class="tiEksMem text-lg">Anggota</strong>
                                <div class="pcEdDatEksMem absolute -right-[10%] -top-1/4 -translate-x-[10%] -translate-y-1/4">
                                    <button type="button" class="p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="" class="it1-datMem">
                                <p class="nmeEksMem leading-4 max-w-[12rem] text-sm">
                                    Lihat Disini
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="it4-scmeEks w-64 lg:w-54 p-6 rounded-lg hover:bg-gray-300/60">
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
    <section class="mt-12">
        <div class="galOsis w-[85%] mx-auto">
            <div class="tlCat-galOsis flex justify-between items-center">
                <div class="tlGal text-2xl font-bold">
                    <h2>Galeri</h2>
                </div>
                <div class="cat-addGal flex flex-wrap items-center gap-6 text-2xl font-bold">
                    <form action="" method="" enctype="multipart/form-data" id="gotoAddImgGal">
                        <div class="inpImgGal">
                            <div class="thLabels">
                                <label for="inpAddGaleri" class="actCat-galOsis flex px-6 py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg" id="btnAddImgGal"> 
                                    <i class="icAddGal bi bi-plus-circle"></i>
                                    <p>Tambah</p>
                                </label>
                            </div>
                            <input type="file" name="addGaleri" id="inpAddGaleri" accept="image/*" class="hidden">
                            <div class="btnCnAddGalImg items-center gap-2 flex  hidden" id="ifOnInputChange">
                                <div class="cnAddImgGal">
                                    <button type="button" id="cnAddImgGal" class="flex px-6 py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg">
                                        <i class="bi bi-x-circle"></i>
                                        <p>Cancel</p>
                                    </button>
                                </div>
                                <div class="sbImgGal">
                                    <button type="submit" class="flex px-6 py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg">
                                        <i class="bi bi-save"></i>
                                        <p>Simpan</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="previewImg mt-8 h-96 hidden">
                <img src="{{asset('assets/img/dumb/imgtemp 2.jpg')}}" alt="" class="mx-auto rounded-lg h-full" id="prevImgGal">
            </div>
            <div class="list-items mt-12 flex flex-wrap justify-center items-center">
                @for ($i=1; $i <= 9; $i++)
                    <img class="photo-item rounded-[15px] max-w-full max-h-[200px] m-[5px]" style="user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none;  -ms-user-select: none;" src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" onclick="openPopup(this.src)">
                @endfor
                @for ($i=1; $i <= 9; $i++)
                    <img class="photo-item rounded-[15px] max-w-full max-h-[200px] m-[5px]" style="user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none;  -ms-user-select: none;" src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" onclick="openPopup(this.src)">
                @endfor
            </div>
        </div>
    </section>
    <section class="mt-20">
        <div class="shrcRcEksTe relative h-96">
            <div class="img-bg overflow-hidden relative text-white min-h-[16rem] lg:min-h-[24rem] bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-blue-700/90 after:w-full after:h-full"
                style="background-image: url('{{asset('assets/img/main/126465066756.jpg')}}');">
                <div class="content relative z-10 min-h-[16rem] lg:min-h-[24rem] flex items-center">
                    <div class="ctnShrc flex flex-col lg:flex-row justify-center lg:justify-between lg:items-center gap-8 relative z-10 text-white h-full p-12">
                        <div class="lWAB w-3/4">
                            <h3 class="text-3xl lg:text-6xl font-bold">Ada pertanyaan atau ingin tahu selengkapnya?</h3>
                        </div>
                        <div class="rSocmed-recom flex-shrink-0">
                            <a href="" class="flex items-center gap-2 text-2xl lg:text-3xl lg:px-4 lg:py-2">
                                <i class="bi bi-instagram"></i>
                                <p>@{{Instagram account}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="mt-28 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
    <section class="mt-8">
        <div class="strOrg w-11/12 mx-auto">
            <div class="chrt-stcOrgEks">
                <div class="titleChrt">
                    <div class="tSct w-fit py-3 px-6 rounded-xl font-bold text-3xl">
                        <h2>Daftar Ekstrakurikuler</h2>
                    </div>
                </div>
                <div class="list-items mt-6 grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5">
                    @for ($i=0; $i < 10; $i++)
                        <div class="items-students">
                            <div class="cntn-item relative">
                                <div class="hvOvQesMa">
                                    <button id="shSumInfoEks" href="" class="cursor-pointer flex items-center bg-white p-1 rounded-xl aspect-square overflow-hidden absolute z-10 -right-[5%] -top-[5%] translate-x-[5%] translate-y-[5%]" onclick="opnPopEks(this)">
                                        <i class="bi bi-question-circle text-2xl"></i>
                                    </button>
                                </div>
                                <div class="imgCont aspect-square bg-white regular-shadow rounded-md sm:rounded-xl lg:rounded-2xl overflow-hidden w-full h-full group relative">
                                    <div class="button-editDel hidden md:block absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                        <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>
                                    <img src="{{asset('assets/img/dumb/imgtemp 3.jpg')}}" alt="" class="supImg w-full h-full object-cover object-center" onclick="openPopup(this.src)">
                                    <a href="" class="lg:w-3/4 lg:py-2 bg-blue-400 rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] lg:hover:bg-cyan-500 cursor-pointer">
                                        <p class="itemClass text-white text-center font-bold ">
                                            Test
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endfor
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
                        <img src="" alt="" id="previewImage" class="supImg w-full h-full object-cover object-center relative bg-gray-400/50 after:absolute after:bi after:bi-card-image">
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
    <div class="pop-sumEks">
        <div id="pop-brdSumEks" class="brdSumEks w-full h-full xl:h-fit xl:w-1/3 bg-slate-950 fixed pb-8 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-50 rounded-lg overflow-hidden hidden">
            <div class="heaAbtSumEks flex items-center justify-between text-white text-2xl sticky w-full left-0 top-0 pt-4 xl:pt-12 pb-2 px-8">
                <div class="tiAbt">
                    <div class="txt">
                        <strong>Tentang</strong>                        
                    </div>
                </div>
                <div class="x-close-btn">
                    <div class="btnX">
                        <button class="overflow-hidden aspect-square flex items-center" id="clsPop-brdSumEks">
                            <i class="bi bi-x text-4xl"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="contentSumEks h-[36rem] overflow-y-scroll p-8 text-sm xl:text-base">
                <div class="abtSumEks">
                    <div class="cntnAbtSumEks text-white overflow-hidden">
                        <div class="cntnEks">
                            <p class="text-sm md:text-base">
                                Ini adalah sebuah konten untuk popup jika mengklik simbol tanda tanya (?) pada list ekstrakurikuler yang ada.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="lnkSumEks mt-8">
                    <div class="cntnLnkSumEks text-white">
                        <div class="tiLnkSumEks">
                            <div class="txt">
                                <strong class="font-bold text-2xl">
                                    Link
                                </strong>
                            </div>
                        </div>
                        <div class="cntnLnk mt-6 px-4">
                            <ul class="list-link grid md:grid-cols-2 gap-4">
                                <div class="link-item overflow-hidden ">
                                    <li>
                                        <div class="cntnItem flex items-center gap-4">
                                            <i class="bi bi-facebook text-2xl md:text-3xl"></i>
                                            <div class="desc-link leading-4">
                                                <p class="text-sm md:text-base">Facebook</p>
                                                <a href="" class="text-xs underline text-blue-600">facebook.com</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="link-item overflow-hidden ">
                                    <li>
                                        <div class="cntnItem flex items-center gap-4">
                                            <i class="bi bi-instagram text-2xl md:text-3xl"></i>
                                            <div class="desc-link leading-4">
                                                <p class="text-sm md:text-base">Instagram</p>
                                                <a href="" class="text-xs underline text-blue-600">instagram.com</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="link-item overflow-hidden ">
                                    <li>
                                        <div class="cntnItem flex items-center gap-4">
                                            <i class="bi bi-twitter-x text-2xl md:text-3xl"></i>
                                            <div class="desc-link leading-4">
                                                <p class="text-sm md:text-base">X</p>
                                                <a href="" class="text-xs underline text-blue-600">x.com</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="link-item overflow-hidden ">
                                    <li>
                                        <div class="cntnItem flex items-center gap-4">
                                            <i class="bi bi-tiktok text-2xl md:text-3xl"></i>
                                            <div class="desc-link leading-4">
                                                <p class="text-sm md:text-base">Tiktok</p>
                                                <a href="" class="text-xs underline text-blue-600">tiktok.com</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="link-item overflow-hidden ">
                                    <li>
                                        <div class="cntnItem flex items-center gap-4">
                                            <i class="bi bi-youtube text-2xl md:text-3xl"></i>
                                            <div class="desc-link leading-4">
                                                <p class="text-sm md:text-base">Youtube</p>
                                                <a href="" class="text-xs underline text-blue-600">youtube.com</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dtlSumEks mt-8">
                    <div class="cntnDtlSumEks text-white">
                        <div class="tiDtlSumEks">
                            <div class="txt">
                                <strong class="font-bold text-2xl">
                                    Detail Ekskul
                                </strong>
                            </div>
                        </div>
                        <div class="cntnDtl mt-6 px-4">
                            <ul class="list-link space-y-3">
                                <div class="link-item overflow-hidden ">
                                    <li>
                                        <div class="cntnItem flex items-center gap-4">
                                            <i class="bi bi-globe2 text-2xl md:text-3xl"></i>
                                            <div class="desc-link text-sm md:text-base">
                                                <a href="" class="">https://smpn2indramayu.sch.id/ekstrakurikuler</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="link-item overflow-hidden ">
                                    <li>
                                        <div class="cntnItem flex items-center gap-4">
                                            <i class="bi bi-people text-2xl md:text-3xl"></i>
                                            <div class="desc-link">
                                                <p class="text-sm md:text-base">@{{total}} Anggota</p>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="link-item overflow-hidden ">
                                    <li>
                                        <div class="cntnItem flex items-center gap-4">
                                            <i class="bi bi-exclamation-circle text-2xl md:text-3xl"></i>
                                            <div class="desc-link">
                                                <p class="text-sm md:text-base">12 April 2023</p>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
    <script src="{{asset('assets/js/galeri/addGal.js')}}"></script>
    <script src="{{asset('assets/js/ekstrakurikuler/formsAddEkskul.js')}}"></script>
    <script src="{{asset('assets/js/ekstrakurikuler/shPop-sumEks.js')}}"></script>
@endsection
