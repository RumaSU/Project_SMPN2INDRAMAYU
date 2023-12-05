@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="imgEkstsool-profiles relative">
        <div class="img-profiles flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
            style="background-image: url('{{asset('assets/img/main/126465066756.jpg')}}');">
            <div class="content relative z-10 selft-center">
                <h1 class="text-4xl font-bold">Galeri</h1>
            </div>
        </div>
        <div class="descEks p-6 group mt-12">
            <div class="w-full lg:w-3/4 transition-all md mx-auto text-center text-sm md:text-lg relative">
                <p class="line-clamp-6">
                    Galeri Lorem ipsum dolor sit amet
                </p>
                <div class="editdescCtn scrollbar absolute z-10 -right-[2%] -top-1/4 translate-x-[2%] translate-y-1/4 lg:-right-[2%] lg:-top-1/4 lg:translate-x-[2%] lg:translate-y-1/4 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                    <button class="editB p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <hr class="mt-12 mx-auto w-[90%] border-[1.5px] border-black/40 rounded-2xl">
    <section class="mt-24">
        <div class="tiType-gal lg:w-3/4 p-4 py-4 lg:py-10 mx-auto bg-gray-100 2xl:rounded-xl">
            <div class="type-gal flex justify-center items-center h-full lg:gap-6 select-none">
                <a href="/galeri/kegiatan" role="link" id="idIt1-chsAct" class="itemShowSection it1-chsAct cursor-default lg:w-72 p-3 rounded-lg transition-colors @if (Request::is('galeri/kegiatan')) bg-blue-500 text-white @else hover:bg-gray-300/60 @endif">
                    <div class="countTdatEks">
                        <div class="tDatEks w-full">
                            <div class="tdat text-center flex items-center justify-center gap-2">
                                <i class="bi bi-image text-3xl"></i>
                                <strong class="tiLeEks text-xl hidden lg:block">Kegiatan</strong>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/galeri/sarpras" role="link" id="idIt2-chsInsfra" class="itemShowSection it2-chsInsfra cursor-default lg:w-72 p-3 rounded-lg transition-colors @if (Request::is('galeri/sarpras')) bg-blue-500 text-white @else hover:bg-gray-300/60 @endif">
                    <div class="countTdatEks">
                        <div class="tDatEks w-full">
                            <div class="tdat text-center flex items-center justify-center gap-2">
                                <i class="bi bi-building text-3xl"></i>
                                <strong class="tiLeEks text-xl hidden lg:block">Sarpras</strong>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/galeri/prestasi" role="link" id="idIt3-chsAchie" class="itemShowSection it3-chsAchie cursor-default lg:w-72 p-3 rounded-lg transition-colors @if (Request::is('galeri/prestasi')) bg-blue-500 text-white @else hover:bg-gray-300/60 @endif">
                    <div class="countTdatEks">
                        <div class="tDatEks w-full">
                            <div class="tdat text-center flex items-center justify-center gap-2">
                                <i class="bi bi-trophy text-3xl"></i>
                                <strong class="tiLeEks text-xl hidden lg:block">Prestasi</strong>
                            </div>
                        </div>
                    </div>
                </a>
                <span role="button" id="idIt4-chsCre" class="itemShowSection it4-chsCre cursor-default lg:w-72 p-3 rounded-lg transition-colors @if (Request::is('galeri/karya')) bg-blue-500 text-white @else hover:bg-gray-300/60 @endif">
                    <div class="countTdatEks">
                        <div class="tDatEks w-full">
                            <div class="tdat text-center flex items-center justify-center gap-2">
                                <div class="bi bi-magic text-3xl"></div>
                                <strong class="tiLeEks text-xl hidden lg:block">Karya</strong>
                            </div>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </section>
    <section class="sectionGalery" id="secGalCrea">
        <hr class="mt-6 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
        <div class="mt-8">
            <div class="galCrea w-11/12 mx-auto">
                <div class="cntnGalCrea">
                    <div class="tlCat-galCrea flex flex-col gap-2 lg:flex-row lg:justify-between lg:items-center">
                        <div class="tlGal w-fit rounded-xl font-bold text-lg lg:text-3xl">
                            <h2>KARYA</h2>
                        </div>
                        <div class="hrefNInpImg flex items-center gap-2">
                            <div class="hrefToAnother">
                                <div class="cnHref">
                                    <a href="/galeri/karya">
                                        <div class="tx flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl">
                                            <i class="bi bi-search"></i>
                                            <p class="hidden lg:block">Lainnya</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="inpImgGal">
                                <div class="thBtnsAdd">
                                    <button class="actCat-gal flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl" id="btnAddImgGal" onclick="showPopUpForm(this);"> 
                                        <i class="icAddGal bi bi-plus-circle"></i>
                                        <p>Tambah</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-items mt-6 grid grid-cols-2 gap-2 md:gap-0 md:flex md:flex-wrap md:justify-center md:items-center">
                        @for ($i=1; $i <= 9; $i++)
                            <img title="img {{$i}}" class="photo-item rounded-[15px] object-cover aspect-square object-center md:aspect-auto md:object-contain md:max-w-full md:max-h-[200px] md:m-[5px]" style="user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none;  -ms-user-select: none;" src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="img {{$i}}" onclick="openPopup(this.src)">
                        @endfor
                        @for ($i=1; $i <= 9; $i++)
                            <img title="img {{$i}}" class="photo-item rounded-[15px] object-cover aspect-square object-center md:aspect-auto md:object-contain md:max-w-full md:max-h-[200px] md:m-[5px]" style="user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none;  -ms-user-select: none;" src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="img {{$i}}" onclick="openPopup(this.src)">
                        @endfor
                    </div>
                </div>
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
    <div class="foo mb-96"></div>
    <div id="pop-upFormAddGal" class="pop-upFormAddGal fixed w-11/12 lg:w-1/2 max-h-[80%] left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2  px-8 py-6 bg-white border rounded-2xl overflow-auto z-50 shadow-black shadow-2xl hidden">
        <div class="mx-auto">
            <div class="sticky left-full -translate-x-0 w-fit z-10">
                <button id="btnClsAddGal" type="button" class="icon border rounded-lg" onclick="closePopUpForm(this)">
                    <i class="bi bi-x text-5xl"></i>
                </button>
            </div>
            <div class="frmAddGal mt-4">
                <div class="imgGal">
                    <div class="inpLbImgGal w-fit mx-auto relative group rounded-lg overflow-hidden border">
                        <div class="ths absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 -z-10 text-center opacity-40 group-hover:blur-sm transition-[blur]">
                            <i class="bi bi-image text-4xl"></i>
                            <p class="text-xs">Add Image</p>
                        </div>
                        <img src="" alt="" id="prevImgFrmAddGAL" class="max-h-[400px] min-w-[200px] min-h-[150px] group-hover:blur-sm transition-[blur] object-contain object-center">
                        <div class="ovBlck block bg-black absolute left-0 top-0 h-full w-full opacity-0 group-hover:opacity-25 transition-opacity"></div>
                        <div class="groupGal">
                            <label for="imgAddGal" class="bg-transparent w-full h-full absolute left-1/2 top-0 -translate-x-1/2 -translate-y-0 text-xs">
                                <div class="txt h-full flex justify-center items-center">
                                    <div class="addImgGal cursor-pointer flex items-center bg-white w-fit px-6 py-2 rounded-md opacity-0 group-hover:opacity-100 transition-opacity">
                                        <i></i>
                                        <p>Add Image</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <form action="" method="POST" class="form-addGal space-y-6" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="imgAddGal" id="imgAddGal" accept="image/*" class="w-15 h-15 border border-black hidden" value="" required>
                    <div class="titAddImg">
                        <div class="theLabels select-none">
                            <label for="titAddImg" class="titAddImg font-bold">Judul</label>
                        </div>
                        <input type="text" name="titAddImg" id="titAddImg" class="border w-full py-2 px-4 rounded-lg outline-none" maxlength="125" required>
                    </div>
                    <button type="submit" class="block border py-2 px-12 rounded-xl mx-auto hover:bg-blue-500 hover:text-white transition-colors"> Simpan </button>
                </form>
            </div>
        </div>
    </div>
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
    <script src="{{asset('assets/js/ekstrakurikuler/shPop-sumEks.js')}}"></script>
@endsection