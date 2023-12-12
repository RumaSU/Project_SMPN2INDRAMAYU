@extends('layouts.main.main')
@section('link-rel')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @keyframes slideLazy {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        .animate-slide-lazy {
            animation: slideLazy 2s linear infinite;
        }
    </style>
@endsection
@section('content')
    <div class="alertContent fixed right-0 z-[9999] space-y-2 text-2xl">
        @if (session('errorSomething'))
            <div class="errorDelete min-w-[20rem] px-4 py-3 bg-red-100 rounded-sm">
                <div class="cntn flex items-center gap-4">
                    <i class="bi bi-x-circle-fill text-red-500"></i>
                    <p class="text-lg">{{ session('errorSomething') }}</p>
                </div>
            </div>
        @endif
        @if (session('succedSomething'))
            <div class="confirmDelete min-w-[20rem] px-4 py-3 bg-green-100 rounded-sm">
                <div class="cntn flex items-center gap-4">
                    <i class="bi bi-check-circle-fill text-green-500"></i>
                    <p class="text-lg">{{ session('succedSomething') }}</p>
                </div>
            </div>
        @endif
        @if (session('updateSomething'))
            <div class="confirmUpdate min-w-[20rem] px-4 py-3 bg-blue-100 rounded-sm">
                <div class="cntn flex items-center gap-4">
                    <i class="bi bi-upload text-blue-700"></i>
                    <p class="text-lg">{{ session('updateSomething') }}</p>
                </div>
            </div>
        @endif
    </div>
    @yield('teachers.content')
    <div class="pop-teDats" id="pop-teDats" role="dialog" style="display: none;">
        <div
            class="rootPopDetails w-full h-full max-h-fit lg:h-fit lg:w-1/3 bg-slate-950 fixed pb-8 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-50 rounded-lg overflow-hidden">
            <div
                class="heaAbtSumTeDats flex items-center justify-between text-white text-2xl sticky w-full left-0 top-0 pt-4 xl:pt-12 pb-2 px-8">
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
            <div id="pop-teSumDats" class="teSumDats">
                <div
                    class="contentSumTeDats h-[30rem] xl:h-[32rem] 2xl:h-[36rem] overflow-y-scroll p-8 text-sm xl:text-base">
                    <div class="contentDisplayDetails" style="display: none;">
                        <div class="abtSumEks">
                            <div class="cntnAbtSumEks text-white overflow-hidden">
                                <div class="imgWthNameTeDats flex flex-col xl:flex-row items-center gap-4">
                                    <div
                                        class="thImgTe flex-shrink-0 aspect-square border-2 w-40 rounded-[100%] overflow-hidden p-1">
                                        <img src="" alt=" Image"
                                            class="h-full w-full object-cover object-center rounded-[100%]"
                                            id="popupImageTeacher">
                                    </div>
                                    <div class="nmeTeWthEdDel flex-shrink-0 space-y-2">
                                        <div class="nmeTeWthNip">
                                            <div class="nmeTe" aria-label="Name teacher">
                                                <div class="txt">
                                                    <p class="text-xl" id="nameShowTeachers" data-value=""></p>
                                                </div>
                                            </div>
                                            <div class="nipTe" aria-label="Nip teacher">
                                                <div class="txt">
                                                    <p class="text-sm" id="nipShowTeachers" data-value=""></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="edDelTe flex items-center gap-2">
                                            <div class="btEdTeDats">
                                                <span role="button" id="editTeachers"
                                                    class="border-2 px-6 py-1 rounded-md block" title=""
                                                    data-show-item-id="" data-show-item-name="">
                                                    <div class="flex items-center">
                                                        <i></i>
                                                        <p>Edit</p>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="btDelTeDats">
                                                <span role="button" class="border-2 px-6 py-1 rounded-md block"
                                                    aria-label="Delete" title="" data-show-item-id=""
                                                    data-show-item-name="">
                                                    <div class="flex items-center">
                                                        <i></i>
                                                        <p>Hapus</p>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="displayLnkSumTeDats mt-8">
                            <div class="cntnDisplayLnkSumTeDats text-white">
                                <div class="tiDisplayLnkSumTeDats">
                                    <div class="txt">
                                        <strong class="font-bold text-2xl">
                                            Link
                                        </strong>
                                    </div>
                                </div>
                                <div class="cntnLnk mt-6 px-4">
                                    <ul class="list-link-display grid 2xl:grid-cols-2 gap-4" role="list">
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
                                    <ul class="list-data-teacher space-y-3">
                                        <li class="itemEmailTeacher"></li>
                                        <li>
                                            <div class="data-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-people text-2xl md:text-3xl" title="Status"
                                                        aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base" id="statusDisplayTeachers"
                                                            data-value=""></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="data-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-briefcase text-2xl md:text-3xl" title="Bidang"
                                                        aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base" id="sectorDisplayTeachers"
                                                            data-value=""></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="data-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-clock-history text-2xl md:text-3xl"
                                                        title="Tahun Terdaftar" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base" id="yearsDisplaySignTeachers"
                                                            data-value=""></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contentFormDetails" style="display: none;">
                        <form action="" method="POST" enctype="multipart/form-data" id="formPopupTeachers">
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
                                <div>
                                    <div class="btDelTeDats">
                                        <span role="button" class="border-2 px-6 py-1 rounded-md block"
                                            aria-label="Delete" title="" data-show-item-id=""
                                            data-show-item-name="">
                                            <div class="flex items-center gap-2">
                                                <i class="bi bi-trash"></i>
                                                <p class="hidden md:block">Hapus</p>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="abtSumEks mt-4">
                                <div class="cntnAbtSumEks text-white overflow-hidden">
                                    <div class="imgWthNameTeDats flex flex-col items-center gap-4">
                                        <div class="imgTeachers flex justify-center items-center gap-4">
                                            <label for="imageTeachers">
                                                <div
                                                    class="thImgTe mx-auto aspect-square border-2 w-72 rounded-xl overflow-hidden p-1">
                                                    <img src="{{ asset('assets/img/dumb/imgtemp 1.jpg') }}" alt=""
                                                        class="h-full w-full object-cover object-center rounded-xl"
                                                        id="previewGalPreview">
                                                </div>
                                            </label>
                                            <div class="inpFileTeachers hidden">
                                                <input type="file" name="imageTeachers" id="imageTeachers"
                                                    class="hidden" accept="image/*" value="">
                                            </div>
                                        </div>
                                        <div class="nmeTeWthNipTeWthInpGndTea w-full space-y-2">
                                            <div class="nmeTeWthNip" role="">
                                                <div class="nmeTe">
                                                    <div class="thLabels">
                                                        <label for="nameTeachers">Nama</label>
                                                    </div>
                                                    <input type="text" name="nameTeachers" id="nameTeachers"
                                                        class="text-black w-full py-1 px-4 outline-none rounded-sm"
                                                        required>
                                                </div>
                                                <div class="nipTe">
                                                    <div class="thLabels">
                                                        <label for="nipTeachers">Nip</label>
                                                    </div>
                                                    <input type="text" name="nipTeachers" id="nipTeachers"
                                                        class="text-black w-full py-1 px-4 outline-none rounded-sm"
                                                        value="" required>
                                                </div>
                                            </div>
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
                                        <ul class="list-link-form grid 2xl:grid-cols-2 gap-4" role="list">
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-facebook text-2xl md:text-3xl"
                                                            aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="facebook-active"
                                                                        class="text-sm md:text-base">Facebook</label>
                                                                    <label for="facebook-active"
                                                                        class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all"
                                                                            style="">
                                                                            <span
                                                                                class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all"
                                                                                style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="facebook-active"
                                                                    id="facebook-active" value="" class="hidden"
                                                                    aria-checked="false" aria-label="Facebook Account">
                                                            </div>
                                                            <div class="inpLnkFacebook">
                                                                <input type="text" name="facebookLink"
                                                                    id="facebookLink"
                                                                    class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0"
                                                                    aria-label="Facebook Link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-instagram text-2xl md:text-3xl"
                                                            aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="instagram-active"
                                                                        class="text-sm md:text-base">Instagram</label>
                                                                    <label for="instagram-active"
                                                                        class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all"
                                                                            style="">
                                                                            <span
                                                                                class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all"
                                                                                style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="instagram-active"
                                                                    id="instagram-active" value="" class="hidden"
                                                                    aria-checked="false" aria-label="Instagram Account">
                                                            </div>
                                                            <div class="inpLnkinstagram">
                                                                <input type="text" name="instagramLink"
                                                                    id="instagramLink"
                                                                    class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0"
                                                                    aria-label="Instagram Account">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-twitter-x text-2xl md:text-3xl"
                                                            aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="twitter-active"
                                                                        class="text-sm md:text-base">Twitter</label>
                                                                    <label for="twitter-active"
                                                                        class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all"
                                                                            style="">
                                                                            <span
                                                                                class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all"
                                                                                style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="twitter-active"
                                                                    id="twitter-active" value="" class="hidden"
                                                                    aria-checked="false" aria-label="Twitter Account">
                                                            </div>
                                                            <div class="inpLnkTwitter">
                                                                <input type="text" name="twitterLink" id="twitterLink"
                                                                    class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0"
                                                                    aria-label="Twitter Link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-tiktok text-2xl md:text-3xl"
                                                            aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="tiktok-active"
                                                                        class="text-sm md:text-base">Tiktok</label>
                                                                    <label for="tiktok-active"
                                                                        class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all"
                                                                            style="">
                                                                            <span
                                                                                class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all"
                                                                                style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="tiktok-active"
                                                                    id="tiktok-active" value="" class="hidden"
                                                                    aria-checked="false" aria-label="Tiktok Account">
                                                            </div>
                                                            <div class="inpLnkTiktok">
                                                                <input type="text" name="tiktokLink" id="tiktokLink"
                                                                    class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0"
                                                                    aria-label="Tiktok Link">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="link-item" role="listitem">
                                                <div class="overflow-hidden">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-youtube text-2xl md:text-3xl"
                                                            aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="youtube-active"
                                                                        class="text-sm md:text-base">Youtube</label>
                                                                    <label for="youtube-active"
                                                                        class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all"
                                                                            style="">
                                                                            <span
                                                                                class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all"
                                                                                style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="youtube-active"
                                                                    id="youtube-active" value="" class="hidden"
                                                                    aria-checked="false" aria-label="Youtube Account">
                                                            </div>
                                                            <div class="inpLnkYoutube">
                                                                <input type="text" name="youtubeLink" id="youtubeLink"
                                                                    class="rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0"
                                                                    aria-label="Youtube Account">
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
                                                        <i class="bi bi-envelope-at text-2xl md:text-3xl" title="Email"
                                                            aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="emails-active"
                                                                        class="text-sm md:text-base">Email</label>
                                                                    <label for="emails-active"
                                                                        class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all"
                                                                            style="">
                                                                            <span
                                                                                class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all"
                                                                                style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="emails-active"
                                                                    id="emails-active" value="" class="hidden"
                                                                    aria-checked="false" aria-label="Emails Account">
                                                            </div>
                                                            <div class="inpLnkEmails">
                                                                <input type="email" name="emailsAccount"
                                                                    id="emailsAccount"
                                                                    class="w-full rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0"
                                                                    aria-label="Emails Account">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="link-item overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-briefcase text-2xl md:text-3xl" title="Bidang"
                                                            aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="bidangTeachers"
                                                                        class="text-sm md:text-base">Bidang</label>
                                                                </div>
                                                            </div>
                                                            <div class="inpDtBidang">
                                                                <input type="text" name="bidangTeachers"
                                                                    id="bidangTeachers"
                                                                    class="w-full rounded-sm outline-none px-2 py-0.5 text-xs text-black transition-all"
                                                                    aria-label="Sector Teachers" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="link-item overflow-hidden ">
                                                    <div class="cntnItem flex items-center gap-4">
                                                        <i class="bi bi-clock-history text-2xl md:text-3xl"
                                                            title="Tahun Terdaftar" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2 w-full">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="yearsSignTeachers"
                                                                        class="text-sm md:text-base">Tahun
                                                                        Terdaftar</label>
                                                                </div>
                                                            </div>
                                                            <div class="inpDtyearsSign">
                                                                <input type="date" name="yearsSignTeachers"
                                                                    id="yearsSignTeachers"
                                                                    class="w-full rounded-sm outline-none px-2 py-0.5 text-xs text-black transition-all"
                                                                    aria-label="Date Years Teacher Sign In" required>
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
    <div class="foo mb-96"></div>
@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/teachers/popDetailsTeachers.js') }}"></script>
    <script src="{{ asset('assets/js/teachers/dataTeachers.js') }}"></script>
    <script src="{{ asset('assets/js/teachers/addTeachers.js') }}"></script>
    <script src="{{ asset('assets/js/teachers/editTeachers.js') }}"></script>
    <script src="{{ asset('assets/js/teachers/deleteTeachers.js') }}"></script>
@endsection
