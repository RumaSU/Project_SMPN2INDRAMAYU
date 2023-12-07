@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="img-students flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
        style="background-image: url('{{asset('assets/img/main/126465066756.jpg')}}');">
        <div class="content relative z-10 selft-center">
            <h1 class="text-4xl font-bold">Tenaga Kependidikan</h1>
            <a href="/tenPendidik" class="text-xl">Profil/Tenaga Kependidikan</a>
        </div>
    </section>
    <section class="frmAddStnds mt-12">
        <div class="title-students text-2xl flex items-center px-6 md:px-12 gap-6 py-4 font-bold border-b-4 border-black relative">
            <span role="button" class="btrcr-fm text-sm text-white py-2 px-4 lg:px-6 border-2 border-sky-600 bg-sky-400 rounded-lg flex items-center hover:bg-sky-600 hover:border-sky-800" onclick="showPopUpForm(this); addVals(this);">
                <i class="bi bi-plus-circle md:mr-2 text-2xl"></i>
                <p class="hidden md:block">Tenaga Kependidikan</p>
            </span>
        </div>
    </section>
    <section class="listStudents mt-8 px-4 md:px-8 space-y-12">
        {{-- <div class="list-items flex flex-wrap gap-5"> --}}
        <div class="list-items grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative" id="listItemsTeachers">
            @for ($i=0; $i < 10; $i++)
                <div class="items-staffTe aspect-[3/4] overflow-hidden relative group" title="Staff {{$i}}" data-item-id="" aria-haspopup="true">
                    <div class="button-editDel hidden md:flex items-center gap-1 bg-black/40 absolute py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                        <span role="button" class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 block w-fit" title="Edit this" aria-label="Edit this" onclick="opnFormTeDats()">
                            <i class="bi bi-pencil"></i>
                        </span>
                        <span role="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 block w-fit" title="Delete this" aria-label="Delete this">
                            <i class="bi bi-trash3"></i>
                        </span>
                    </div>
                    <div class="imgCont bg-white regular-shadow rounded-md sm:rounded-xl lg:rounded-2xl w-full h-full"  onclick="opnSumTeDats()">
                        <img src="{{asset('assets/img/dumb/imgtemp 3.jpg')}}" alt="" class="supImg w-full h-full object-cover object-center" >
                        <div class="lg:w-3/4 lg:py-2 bg-blue-400 rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] lg:hover:bg-cyan-500 cursor-pointer">
                            <p class="itemClass text-white text-center font-bold" title="This is name staff {{$i}}" aria-roledescription="">
                                Test{{$i}}
                            </p>
                        </div>
                    </div>
                </div>
            @endfor
            <div class="group bg-white regular-shadow flex justify-center items-center border rounded-2xl overflow-hidden relative hover:bg-gray-500/25" aria-haspopup="true">
                <div class="add-icon">
                    <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                </div>
                <span role="button" class="btrpp-vii block w-full h-full inset-0 absolute" onclick="showPopUpForm(this); addVals(this);" title="add more staff" aria-labelledby="pop-upFormAdd"></span>
            </div>
            {{-- <div class="ovTeachers w-full h-full absolute left-0 top-0 hidden backdrop-blur-sm" id="overlayTeachers"></div> --}}
        </div>
    </section>
    <div id="pop-upFormAdd" role="alertdialog" class="pop-upFormAdd hidden fixed w-1/2 max-h-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2  px-8 py-6 bg-white border border-black rounded-2xl overflow-auto z-50">
        <div class="mx-auto">
            <span role="button" id="btrpp" class="icon block w-fit border border-black rounded-lg absolute top-[5%] right-[5%] -translate-x-[5%] -translate-y-[5%]" onclick="closePopUpForm(this)">
                <i class="bi bi-x text-5xl"></i>
            </span>
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
    </div>
    <div class="pop-teDats" id="pop-teDats" role="dialog">
        <div class="rootPopDetails w-full h-full max-h-fit xl:h-fit xl:w-1/3 fixed pb-8 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-50 rounded-lg overflow-hidden bg-slate-950">
            <div class="heaAbtSumTeDats flex items-center justify-between text-white text-2xl sticky w-full left-0 top-0 pt-4 xl:pt-12 pb-2 px-8">
                <div class="tiAbt">
                    <div class="txt">
                        <strong>Tentang</strong>
                    </div>
                </div>
                <div class="x-close-btn">
                    <div class="btnX">
                        <span role="button" class="overflow-hidden aspect-square items-center block" id="clsPop-sumTeDats">
                            <i class="bi bi-x text-4xl"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div id="pop-teSumDats" class="teSumDats ">
                <div class="contentSumTeDats h-[36rem] overflow-y-scroll p-8 text-sm xl:text-base">
                    <div class="contentDisplayDetails ">
                        <div class="abtSumEks">
                            <div class="cntnAbtSumEks text-white overflow-hidden">
                                <div class="imgWthNameTeDats flex items-center gap-4">
                                    <div class="thImgTe aspect-square border-2 w-40 rounded-[100%] overflow-hidden p-1">
                                        <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="h-full w-full object-cover object-center rounded-[100%]">
                                    </div>
                                    <div class="nmeTeWthEdDel flex-shrink-0 space-y-2">
                                        <div class="nmeTeWthNip" role="">
                                            <div class="nmeTe">
                                                <div class="txt">
                                                    <p class="text-xl">Nama Staff atau Guru</p>
                                                </div>
                                            </div>
                                            <div class="nipTe">
                                                <div class="txt">
                                                    <p class="text-sm">21097125</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="edDelTe flex items-center gap-2">
                                            <div class="btEdTeDats">
                                                <span role="button" class="border-2 px-6 py-1 rounded-md block" onclick="opnFormTeDats()">
                                                    <div class="flex items-center">
                                                        <i></i>
                                                        <p>Edit</p>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="btDelTeDats">
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
                        <div class="lnkSumTeDats mt-8">
                            <div class="cntnLnkSumTeDats text-white">
                                <div class="tiLnkSumTeDats">
                                    <div class="txt">
                                        <strong class="font-bold text-2xl">
                                            Link
                                        </strong>
                                    </div>
                                </div>
                                <div class="cntnLnk mt-6 px-4">
                                    <ul class="list-link grid md:grid-cols-2 gap-4" role="list">
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
                        <div class="dtlSumTeDats mt-8">
                            <div class="cntnDtlSumTeDats text-white">
                                <div class="tiDtlSumTeDats">
                                    <div class="txt">
                                        <strong class="font-bold text-2xl">
                                            Detail Tenaga Kependidikan
                                        </strong>
                                    </div>
                                </div>
                                <div class="cntnDtl mt-6 px-4">
                                    <ul class="list-link space-y-3">
                                        <li>
                                            <div class="link-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-envelope-at text-2xl md:text-3xl" title="Email" aria-hidden="true"></i>
                                                    <div class="desc-link text-sm md:text-base">
                                                        <p class="">iniemail@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="link-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-people text-2xl md:text-3xl" title="Status" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base">Status: Tenaga Kependidikan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="link-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-briefcase text-2xl md:text-3xl" title="Bidang" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base">Bidang: Staff TU</p>
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
                                <div class="btEdTeDats">
                                    <button type="submit" class="border-2 px-6 py-1 rounded-md block">
                                        <div class="flex items-center gap-2">
                                            <i class="bi bi-save"></i>
                                            <p class="hidden md:block">Simpan</p>
                                        </div>
                                    </button>
                                </div>
                                <form action="" method="POST">
                                    @csrf
                                    <input type="text" name="staffID" id="staffID" class="hidden" disabled aria-disabled="true">
                                    <div class="btDelTeDats">
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
                                    <div class="imgWthNameTeDats flex flex-col items-center gap-4">
                                        <div class="thImgTe aspect-square border-2 w-40 rounded-[100%] overflow-hidden p-1 flex-shrink-0">
                                            <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="h-full w-full object-cover object-center rounded-[100%]">
                                        </div>
                                        <div class="nmeTeWthEdDel w-full space-y-2">
                                            <div class="nmeTeWthNip" role="">
                                                <div class="nmeTe">
                                                    <div class="thLabels">
                                                        <label for="EditNameTeacherStaff">Nama</label>
                                                    </div>
                                                    <input type="text" name="nameStaff" id="EditNameTeacherStaff" class="text-black w-full py-1 px-4 outline-none rounded-sm">
                                                </div>
                                                <div class="nipTe">
                                                    <div class="thLabels">
                                                        <label for="EditNIPTeacherStaff">Nip</label>
                                                    </div>
                                                    <input type="text" name="nipStaff" id="EditNIPTeacherStaff" class="text-black w-full py-1 px-4 outline-none rounded-sm">
                                                </div>
                                            </div>
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
                            <div class="lnkSumTeDats mt-8">
                                <div class="cntnLnkSumTeDats text-white">
                                    <div class="tiLnkSumTeDats">
                                        <div class="txt">
                                            <strong class="font-bold text-2xl">
                                                Link
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="cntnLnk mt-6 px-4">
                                        <ul class="list-link grid md:grid-cols-2 gap-4" role="list">
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
                            <div class="dtlSumTeDats mt-8">
                                <div class="cntnDtlSumTeDats text-white">
                                    <div class="tiDtlSumTeDats">
                                        <div class="txt">
                                            <strong class="font-bold text-2xl">
                                                Detail Tenaga Kependidikan
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="cntnDtl mt-6 px-4">
                                        <ul class="list-link space-y-3">
                                            <li>
                                                <div class="link-item overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-envelope-at text-2xl md:text-3xl" title="Email" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="emails-active" class="text-sm md:text-base">Email</label>
                                                                    <label for="emails-active" class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 left-0 -translate-x-0 transition-all"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="emails-active" id="emails-active" value="" class="hidden" onchange="checkRollBox(this)" aria-checked="false" aria-label="Emails Account">
                                                            </div>
                                                            <div class="inpLnkEmails">
                                                                <input type="text" name="emailsAccount" id="emailsAccount" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0" aria-label="Emails Account">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="link-item overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-people text-2xl md:text-3xl" title="Status" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="statusTeachers" class="text-sm md:text-base">Status</label>
                                                                </div>
                                                            </div>
                                                            <div class="inpDtStatus">
                                                                <input type="text" name="statusTeachers" id="statusTeachers" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs text-black transition-all" aria-label="Emails Account">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="link-item overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-briefcase text-2xl md:text-3xl" title="Bidang" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="bidangTeachers" class="text-sm md:text-base">Bidang</label>
                                                                </div>
                                                            </div>
                                                            <div class="inpDtBidang">
                                                                <input type="text" name="bidangTeachers" id="bidangTeachers" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs text-black transition-all" aria-label="Emails Account">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="link-item overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-clock-history text-2xl md:text-3xl" title="Tahun Terdaftar" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="yearsSignTeachers" class="text-sm md:text-base">Tahun Terdaftar</label>
                                                                </div>
                                                            </div>
                                                            <div class="inpDtyearsSign">
                                                                <input type="date" name="yearsSignTeachers" id="yearsSignTeachers" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs text-black transition-all" aria-label="Emails Account">
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
    <script src="{{asset('assets/js/students/formsInpExcel.js')}}"></script>
    <script src="{{asset('assets/js/students/grouplist.js')}}"></script>
    <script src="{{asset('assets/js/students/formsAdd.js')}}"></script>
    <script src="{{asset('assets/js/teachers/popDetailsTeachers.js')}}"></script>
@endsection
