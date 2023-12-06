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
                @if (!Request::is(['**/kegiatan', '**/sarpras', '**/prestasi', '**/karya']))
                    <span role="button" id="idIt1-chsAct" class="itemShowSection it1-chsAct cursor-default lg:w-72 p-3 rounded-lg transition-colors bg-blue-500 text-white">
                        <div class="countTdatEks">
                            <div class="tDatEks w-full">
                                <div class="tdat text-center flex items-center justify-center gap-2">
                                    <i class="bi bi-image text-3xl"></i>
                                    <strong class="tiLeEks text-xl hidden lg:block">Kegiatan</strong>
                                </div>
                            </div>
                        </div>
                    </span>
                    <span role="button" id="idIt2-chsInsfra" class="itemShowSection it2-chsInsfra cursor-default lg:w-72 p-3 rounded-lg transition-colors hover:bg-gray-300/60">
                        <div class="countTdatEks">
                            <div class="tDatEks w-full">
                                <div class="tdat text-center flex items-center justify-center gap-2">
                                    <i class="bi bi-building text-3xl"></i>
                                    <strong class="tiLeEks text-xl hidden lg:block">Sarpras</strong>
                                </div>
                            </div>
                        </div>
                    </span>
                    <span role="button" id="idIt3-chsAchie" class="itemShowSection it3-chsAchie cursor-default lg:w-72 p-3 rounded-lg transition-colors hover:bg-gray-300/60">
                        <div class="countTdatEks">
                            <div class="tDatEks w-full">
                                <div class="tdat text-center flex items-center justify-center gap-2">
                                    <i class="bi bi-trophy text-3xl"></i>
                                    <strong class="tiLeEks text-xl hidden lg:block">Prestasi</strong>
                                </div>
                            </div>
                        </div>
                    </span>
                    <span role="button" id="idIt4-chsCre" class="itemShowSection it4-chsCre cursor-default lg:w-72 p-3 rounded-lg transition-colors hover:bg-gray-300/60">
                        <div class="countTdatEks">
                            <div class="tDatEks w-full">
                                <div class="tdat text-center flex items-center justify-center gap-2">
                                    <div class="bi bi-magic text-3xl"></div>
                                    <strong class="tiLeEks text-xl hidden lg:block">Karya</strong>
                                </div>
                            </div>
                        </div>
                    </span>
                @else
                    <a href="/galeri/kegiatan" role="link" id="idIt1-chsAct" class="itemShowSection it1-chsAct cursor-default lg:w-72 p-3 rounded-lg transition-colors @if (Request::is('**/kegiatan')) bg-blue-500 text-white @else hover:bg-gray-300/60 @endif">
                        <div class="countTdatEks">
                            <div class="tDatEks w-full">
                                <div class="tdat text-center flex items-center justify-center gap-2">
                                    <i class="bi bi-image text-3xl"></i>
                                    <strong class="tiLeEks text-xl hidden lg:block">Kegiatan</strong>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/galeri/sarpras" role="link" id="idIt2-chsInsfra" class="itemShowSection it2-chsInsfra cursor-default lg:w-72 p-3 rounded-lg transition-colors @if (Request::is('**/sarpras')) bg-blue-500 text-white @else hover:bg-gray-300/60 @endif">
                        <div class="countTdatEks">
                            <div class="tDatEks w-full">
                                <div class="tdat text-center flex items-center justify-center gap-2">
                                    <i class="bi bi-building text-3xl"></i>
                                    <strong class="tiLeEks text-xl hidden lg:block">Sarpras</strong>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/galeri/prestasi" role="link" id="idIt3-chsAchie" class="itemShowSection it3-chsAchie cursor-default lg:w-72 p-3 rounded-lg transition-colors @if (Request::is('**/prestasi')) bg-blue-500 text-white @else hover:bg-gray-300/60 @endif">
                        <div class="countTdatEks">
                            <div class="tDatEks w-full">
                                <div class="tdat text-center flex items-center justify-center gap-2">
                                    <i class="bi bi-trophy text-3xl"></i>
                                    <strong class="tiLeEks text-xl hidden lg:block">Prestasi</strong>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/galeri/karya" role="link" id="idIt4-chsCre" class="itemShowSection it4-chsCre cursor-default lg:w-72 p-3 rounded-lg transition-colors @if (Request::is('**/karya')) bg-blue-500 text-white @else hover:bg-gray-300/60 @endif">
                        <div class="countTdatEks">
                            <div class="tDatEks w-full">
                                <div class="tdat text-center flex items-center justify-center gap-2">
                                    <div class="bi bi-magic text-3xl"></div>
                                    <strong class="tiLeEks text-xl hidden lg:block">Karya</strong>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </section>
    @yield('galery-contents')
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
    <div class="pop-sumGals hidden" id="pop-sumGals" role="dialog">
        <div class="rootPopDetails w-full h-full max-h-fit lg:h-fit lg:w-1/3 bg-slate-950 fixed pb-8 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-50 rounded-lg overflow-hidden">
            <div class="heaAbtSumGals flex items-center justify-between text-white text-2xl sticky w-full left-0 top-0 pt-4 xl:pt-12 pb-2 px-8">
                <div class="tiAbt">
                    <div class="txt">
                        <strong>Tentang</strong>                        
                    </div>
                </div>
                <div class="x-close-btn">
                    <div class="btnX">
                        <span role="button" class="overflow-hidden aspect-square items-center block" id="clsPop-sumGals">
                            <i class="bi bi-x text-4xl"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div id="pop-teSumDats" class="teSumDats ">
                <div class="contentSumGals h-[30rem] xl:h-[32rem] 2xl:h-[36rem] overflow-y-scroll p-8 text-sm xl:text-base">
                    <div class="contentDisplayDetails hidden">
                        <div class="abtSumEks">
                            <div class="cntnAbtSumEks text-white overflow-hidden">
                                <div class="imgWthNameGals flex flex-col justify-center items-center gap-4">
                                    <div class="thImgTe aspect-square border-2 w-1/2 rounded-xl overflow-hidden p-1">
                                        <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="h-full w-full object-cover object-center rounded-xl">
                                    </div>
                                    <div class="EdDelGals flex-shrink-0 space-y-2">
                                        <div class="edDelTe flex items-center gap-2">
                                            <div class="btEdGals">
                                                <span role="button" class="border-2 px-6 py-1 rounded-md block" onclick="opnFormGals()">
                                                    <div class="flex items-center">
                                                        <i></i>
                                                        <p>Edit</p>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="btDelGals">
                                                <span role="button" class="border-2 px-6 py-1 rounded-md block">
                                                    <div class="flex items-center">
                                                        <i></i>
                                                        <p>Hapus</p>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cntnEks mt-4">
                                    <p class="text-sm md:text-base">
                                        Ini adalah sebuah konten untuk popup jika mengklik simbol tanda tanya (?) pada list ekstrakurikuler yang ada.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="lnkSumGals mt-8">
                            <div class="cntnLnkSumGals text-white">
                                <div class="tiLnkSumGals">
                                    <div class="txt">
                                        <strong class="font-bold text-2xl">
                                            Link
                                        </strong>
                                    </div>
                                </div>
                                <div class="cntnLnk mt-6 px-4">
                                    <ul class="list-link grid 2xl:grid-cols-2 gap-4" role="list">
                                        <li class="link-item" role="listitem">
                                            <div class="overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-facebook text-2xl md:text-3xl"></i>
                                                    <div class="desc-link leading-4">
                                                        <p class="text-sm md:text-base">Facebook</p>
                                                        <a href="" class="text-xs underline text-blue-600">facebook.com</a>
                                                    </div>
                                                </div>
                                            </div>    
                                        </li>
                                        <li class="link-item" role="listitem">
                                            <div class="overflow-hidden">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-instagram text-2xl md:text-3xl"></i>
                                                    <div class="desc-link leading-4">
                                                        <p class="text-sm md:text-base">Instagram</p>
                                                        <a href="" class="text-xs underline text-blue-600">instagram.com</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="link-item" role="listitem">
                                            <div class="overflow-hidden">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-twitter-x text-2xl md:text-3xl"></i>
                                                    <div class="desc-link leading-4">
                                                        <p class="text-sm md:text-base">X</p>
                                                        <a href="" class="text-xs underline text-blue-600">x.com</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="link-item" role="listitem">
                                            <div class="overflow-hidden">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-tiktok text-2xl md:text-3xl"></i>
                                                    <div class="desc-link leading-4">
                                                        <p class="text-sm md:text-base">Tiktok</p>
                                                        <a href="" class="text-xs underline text-blue-600">tiktok.com</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="link-item" role="listitem">
                                            <div class="overflow-hidden">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-youtube text-2xl md:text-3xl"></i>
                                                    <div class="desc-link leading-4">
                                                        <p class="text-sm md:text-base">Youtube</p>
                                                        <a href="" class="text-xs underline text-blue-600">youtube.com</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dtlSumGals mt-8">
                            <div class="cntnDtlSumGals text-white">
                                <div class="tiDtlSumGals">
                                    <div class="txt">
                                        <strong class="font-bold text-2xl">
                                            Detail Prestasi
                                        </strong>
                                    </div>
                                </div>
                                <div class="cntnDtl mt-6 px-4">
                                    <ul class="list-link space-y-3">
                                        <li>
                                            <div class="link-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-person-fill text-2xl md:text-3xl" title="Email" aria-hidden="true"></i>
                                                    <div class="desc-link text-sm md:text-base">
                                                        <p class="">Nama Beliau</p>
                                                    </div>
                                                </div>
                                            </div>    
                                        </li>
                                        <li>
                                            <div class="link-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-award-fill text-2xl md:text-3xl" title="Status" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base">Prestasi: ini juara</p>
                                                    </div>
                                                </div>
                                            </div>    
                                        </li>
                                        <li>
                                            <div class="link-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-geo-alt-fill text-2xl md:text-3xl" title="Bidang" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base ">Lokasi: Jawa</p>
                                                    </div>
                                                </div>
                                            </div>    
                                        </li>
                                        <li>
                                            <div class="link-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-clock-history text-2xl md:text-3xl" title="Tahun Terdaftar" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base">12 April 2016</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contentFormDetails hidden">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="savDelTe flex justify-end items-center gap-2 text-white">
                                <div class="btEdGals">
                                    <button type="submit" class="border-2 px-6 py-1 rounded-md block">
                                        <div class="flex items-center gap-2">
                                            <i class="bi bi-save"></i>
                                            <p class="hidden md:block">Simpan</p>
                                        </div>
                                    </button>
                                </div>
                                <form action="" method="POST">
                                    @csrf
                                    <input type="text" name="staffID" id="staffID" class="hidden" disabled disabled aria-disabled="true">
                                    <div class="btDelGals">
                                        <button type="submit" class="border-2 px-6 py-1 rounded-md block">
                                            <div class="flex items-center gap-2">
                                                <i class="bi bi-trash"></i>
                                                <p class="hidden md:block">Hapus</p>
                                            </div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="abtSumEks mt-4">
                                <div class="cntnAbtSumEks text-white overflow-hidden">
                                    <div class="imgWthNameGals flex justify-center items-center gap-4">
                                        <label for="galsPrestasi">
                                            <div class="thImgTe mx-auto aspect-square border-2 w-1/2 rounded-xl overflow-hidden p-1">
                                                <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="h-full w-full object-cover object-center rounded-xl" id="previewGalPreview">
                                            </div>
                                        </label>
                                        <div class="inpFilePrestasi hidden">
                                            <input type="file" name="galsPrestasi" id="galsPrestasi" class="hidden" accept="images/*" readonly aria-readonly="true">
                                        </div>
                                    </div>
                                    <div class="cntnEks mt-4">
                                        <div class="descTe">
                                            <div class="thLabels">
                                                <label for="EditDescriptionTeacherStaff">Deskripsi</label>
                                            </div>
                                            <textarea type="text" name="nipStaff" id="EditDescriptionTeacherStaff" class="w-full h-auto min-h-[12rem] max-h-[24rem] py-1 px-4 rounded-lg resize-none overflow-hidden text-black" oninput="autoResize(this)"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lnkSumGals mt-8">
                                <div class="cntnLnkSumGals text-white">
                                    <div class="tiLnkSumGals">
                                        <div class="txt">
                                            <strong class="font-bold text-2xl">
                                                Link
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="cntnLnk mt-6 px-4">
                                        <ul class="list-link grid 2xl:grid-cols-2 gap-4" role="list">
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-facebook text-2xl md:text-3xl" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="facebook-active" class="text-sm md:text-base">Facebook</label>                                                                   
                                                                    <label for="facebook-active" class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 left-0 -translate-x-0 transition-all"></span>
                                                                        </div>
                                                                    </label>                                                                   
                                                                </div>
                                                                <input type="checkbox" name="facebook-active" id="facebook-active" value="" class="hidden" onchange="checkRollBox(this)" aria-checked="false" aria-label="Facebook Account">
                                                            </div>
                                                            <div class="inpLnkFacebook">
                                                                <input type="text" name="facebookLink" id="facebookLink" class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0" aria-label="Facebook Link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </li>
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-instagram text-2xl md:text-3xl" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="instagram-active" class="text-sm md:text-base">Instagram</label>                                                                   
                                                                    <label for="instagram-active" class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 left-0 -translate-x-0 transition-all"></span>
                                                                        </div>
                                                                    </label>                                                                   
                                                                </div>
                                                                <input type="checkbox" name="instagram-active" id="instagram-active" value="" class="hidden" onchange="checkRollBox(this)" aria-checked="false" aria-label="Instagram Account">
                                                            </div>
                                                            <div class="inpLnkinstagram">
                                                                <input type="text" name="instagramLink" id="instagramLink" class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0" aria-label="Instagram Account">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-twitter-x text-2xl md:text-3xl" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="twitter-active" class="text-sm md:text-base">Twitter</label>                                                                   
                                                                    <label for="twitter-active" class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 left-0 -translate-x-0 transition-all"></span>
                                                                        </div>
                                                                    </label>                                                                   
                                                                </div>
                                                                <input type="checkbox" name="twitter-active" id="twitter-active" value="" class="hidden" onchange="checkRollBox(this)" aria-checked="false" aria-label="Twitter Account">
                                                            </div>
                                                            <div class="inpLnkTwitter">
                                                                <input type="text" name="twitterLink" id="twitterLink" class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0" aria-label="Twitter Link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-tiktok text-2xl md:text-3xl" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="tiktok-active" class="text-sm md:text-base">Tiktok</label>                                                                   
                                                                    <label for="tiktok-active" class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 left-0 -translate-x-0 transition-all"></span>
                                                                        </div>
                                                                    </label>                                                                   
                                                                </div>
                                                                <input type="checkbox" name="tiktok-active" id="tiktok-active" value="" class="hidden" onchange="checkRollBox(this)" aria-checked="false" aria-label="Tiktok Account">
                                                            </div>
                                                            <div class="inpLnkTiktok">
                                                                <input type="text" name="tiktokLink" id="tiktokLink" class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0" aria-label="Tiktok Link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-youtube text-2xl md:text-3xl" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="youtube-active" class="text-sm md:text-base">Youtube</label>                                                                   
                                                                    <label for="youtube-active" class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 left-0 -translate-x-0 transition-all"></span>
                                                                        </div>
                                                                    </label>                                                                   
                                                                </div>
                                                                <input type="checkbox" name="youtube-active" id="youtube-active" value="" class="hidden" onchange="checkRollBox(this)" aria-checked="false" aria-label="Youtube Account">
                                                            </div>
                                                            <div class="inpLnkYoutube">
                                                                <input type="text" name="youtubeLink" id="youtubeLink" class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0" aria-label="Youtube Account">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="dtlSumGals mt-8">
                                <div class="cntnDtlSumGals text-white">
                                    <div class="tiDtlSumGals">
                                        <div class="txt">
                                            <strong class="font-bold text-2xl">
                                                Detail Prestasi
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="cntnDtl mt-6 px-4">
                                        <ul class="list-link space-y-3">
                                            <li>
                                                <div class="link-item overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-person-fill text-2xl md:text-3xl" title="Email" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="nameStudents" class="text-sm md:text-base">Nama Siswa</label>
                                                                </div>
                                                            </div>
                                                            <div class="inpNameStudents">
                                                                <input type="text" name="nameStudents" id="nameStudents" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs underline text-black" aria-label="Name Students">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </li>
                                            <li>
                                                <div class="link-item overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-award-fill text-2xl md:text-3xl" title="Status" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="achievStudents" class="text-sm md:text-base">Prestasi</label>
                                                                </div>
                                                            </div>
                                                            <div class="inpDtStatus">
                                                                <input type="text" name="achievStudents" id="achievStudents" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs text-black transition-all" aria-label="Achievment Students">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </li>
                                            <li>
                                                <div class="link-item overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-geo-alt-fill text-2xl md:text-3xl" title="Bidang" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="compeLocation" class="text-sm md:text-base">Lokasi</label>
                                                                </div>
                                                            </div>
                                                            <div class="inpDtBidang">
                                                                <input type="text" name="compeLocation" id="compeLocation" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs text-black transition-all" aria-label="Competition Location">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('custom-script')
    <script src="{{asset('assets/js/galeri/addGal.js')}}"></script>
    <script src="{{asset('assets/js/ekstrakurikuler/shPop-sumEks.js')}}"></script>
    <script src="{{asset('assets/js/galeri/popupPrestasi.js')}}"></script>
@endsection