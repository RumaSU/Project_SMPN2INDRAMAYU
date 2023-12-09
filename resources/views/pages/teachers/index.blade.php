@extends('layouts.main.main')
@section('link-rel')
    <style>
        .loadWaiting i {
            animation: spinLoading 1s linear infinite
        }
        @keyframes spinLoading {
            from {
                rotate: 0;
            }
            to {
                rotate: 360deg;
            }
        }
    </style>
@endsection
@section('content')
    <section class="img-teachers flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
        style="background-image: url('{{asset('assets/img/main/126465066756.jpg')}}');">
        <div class="content relative z-10 selft-center">
            <h1 class="text-4xl font-bold">Pendidik</h1>
            <a href="/tenPendidik" class="text-xl">Profil/Pendidik</a>
        </div>
    </section>
    <section class="frmAddTeachers mt-12">
        <div class="title-teachers text-2xl flex flex-col px-6 w-full lg:w-3/4 lg:mx-auto md:px-12 gap-6 py-4 font-bold border-b-4 border-black relative">
            @if (session('errorSomething'))
                {{ session('errorSomething') }}
            @endif
            @if (session('succedSomething'))
                {{ session('succedSomething') }}
            @endif
            <span role="button" id="btrcr-fmte" class="btrcr-fmte py-2 px-4 lg:px-6 flex items-center">
                <i class="bi bi-plus-circle mr-2 text-2xl"></i>
                <p class="text-lg lg:text-3xl">Pendidik</p>
            </span>
        </div>
    </section>
    <section class="listTeachersStaff mt-8 px-4 md:px-8 space-y-12">
        <div class="list-items grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative" id="listItemsTeachers">
            @foreach ($listTeachers as $teacher)
                <div class="items-teacher aspect-[3/4] overflow-hidden rounded-md relative group" title="{{$teacher->name}}" data-item-id="{{$teacher->teacher_id}}" aria-haspopup="true">
                    <div class="button-editDel hidden md:flex items-center gap-1 bg-black/40 absolute py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                        <span role="button" class="editButtonTeacher border border-black bg-white p-2 rounded-lg hover:bg-gray-200 block w-fit" title="Edit {{$teacher->name}}" aria-label="Edit {{$teacher->name}}" data-edit-id="{{$teacher->teacher_id}}">
                            <i class="bi bi-pencil"></i>
                        </span>
                        <span role="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 block w-fit" title="Delete {{$teacher->name}}" aria-label="Delete {{$teacher->name}}" data-delete-id="{{$teacher->teacher_id}}">
                            <i class="bi bi-trash3"></i>
                        </span>
                    </div>
                    <div class="itemsTeacher-content bg-white regular-shadow rounded-md sm:rounded-xl lg:rounded-2xl w-full h-full" data-id="{{$teacher->teacher_id}}">
                        <img src="{{asset('storage/images/teachers/'. $teacher->name_files)}}" alt="" class="supImg w-full h-full object-cover object-center" >
                        <div class="lg:w-3/4 lg:py-2 bg-white shadow-gray-500 shadow-sm rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] cursor-pointer">
                            <p class="itemClass text-center font-bold line-clamp-1" title="{{$teacher->name}}" aria-roledescription="">{{$teacher->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($listTeachers) > 1)
                <div id="addTeacher" class="group bg-white regular-shadow flex justify-center items-center border rounded-2xl overflow-hidden relative hover:bg-gray-500/25" aria-haspopup="true">
                    <div class="add-icon">
                        <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                    </div>
                    <span role="button" class="btrpp-vii block w-full h-full inset-0 absolute" title="add more teachers"></span>
                </div>
            @endif
            {{-- <div class="ovTeachers w-full h-full absolute left-0 top-0 hidden backdrop-blur-sm" id="overlayTeachers"></div> --}}
        </div>
    </section>
    <div class="pop-teDats" id="pop-teDats" role="dialog" style="display: none;">
        <div class="rootPopDetails w-full h-full max-h-fit lg:h-fit lg:w-1/3 bg-slate-950 fixed pb-8 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-50 rounded-lg overflow-hidden">
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
            <div id="pop-teSumDats" class="teSumDats">
                <div class="contentSumTeDats h-[30rem] xl:h-[32rem] 2xl:h-[36rem] overflow-y-scroll p-8 text-sm xl:text-base">
                    <div class="contentDisplayDetails" style="display: none;">
                        <div class="abtSumEks">
                            <div class="cntnAbtSumEks text-white overflow-hidden">
                                <div class="imgWthNameTeDats flex flex-col xl:flex-row items-center gap-4">
                                    <div class="thImgTe flex-shrink-0 aspect-square border-2 w-40 rounded-[100%] overflow-hidden p-1">
                                        <img src="" alt=" Image" class="h-full w-full object-cover object-center rounded-[100%]" id="popupImageTeacher">
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
                                                <span role="button" id="editTeachers" class="border-2 px-6 py-1 rounded-md block" title="" data-show-item-id="" data-show-item-name="">
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
                                                    <i class="bi bi-people text-2xl md:text-3xl" title="Status" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base" id="statusDisplayTeachers" data-value=""></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="data-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-briefcase text-2xl md:text-3xl" title="Bidang" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base" id="sectorDisplayTeachers" data-value=""></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="data-item overflow-hidden ">
                                                <div class="cntnItem flex items-center gap-4">
                                                    <i class="bi bi-clock-history text-2xl md:text-3xl" title="Tahun Terdaftar" aria-hidden="true"></i>
                                                    <div class="desc-link">
                                                        <p class="text-sm md:text-base" id="yearsDisplaySignTeachers" data-value=""></p>
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
                                <div >
                                    <div class="btDelTeDats">
                                        <span role="button" class="border-2 px-6 py-1 rounded-md block">
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
                                                <div class="thImgTe mx-auto aspect-square border-2 w-72 rounded-xl overflow-hidden p-1">
                                                    <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="h-full w-full object-cover object-center rounded-xl" id="previewGalPreview">
                                                </div>
                                            </label>
                                            <div class="inpFileTeachers hidden">
                                                <input type="file" name="imageTeachers" id="imageTeachers" class="hidden" accept="image/*" value="">
                                            </div>
                                        </div>
                                        <div class="nmeTeWthNipTeWthInpGndTea w-full space-y-2">
                                            <div class="nmeTeWthNip" role="">
                                                <div class="nmeTe">
                                                    <div class="thLabels">
                                                        <label for="nameTeachers">Nama</label>
                                                    </div>
                                                    <input type="text" name="nameTeachers" id="nameTeachers" class="text-black w-full py-1 px-4 outline-none rounded-sm" required>
                                                </div>
                                                <div class="nipTe">
                                                    <div class="thLabels">
                                                        <label for="nipTeachers">Nip</label>
                                                    </div>
                                                    <input type="text" name="nipTeachers" id="nipTeachers" class="text-black w-full py-1 px-4 outline-none rounded-sm" value="" required>
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
                                                        <i class="bi bi-facebook text-2xl md:text-3xl" aria-hidden="true"></i>
                                                        <div class="desc-link leading-4 space-y-2">
                                                            <div class="lnkActive-rNot">
                                                                <div class="thLabels flex items-center gap-2">
                                                                    <label for="facebook-active" class="text-sm md:text-base">Facebook</label>
                                                                    <label for="facebook-active" class="text-sm md:text-base">
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all" style="">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all" style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="facebook-active" id="facebook-active" value="" class="hidden" aria-checked="false" aria-label="Facebook Account">
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
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all" style="">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all" style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="instagram-active" id="instagram-active" value="" class="hidden"  aria-checked="false" aria-label="Instagram Account">
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
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all" style="">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all" style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="twitter-active" id="twitter-active" value="" class="hidden"  aria-checked="false" aria-label="Twitter Account">
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
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all" style="">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all" style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="tiktok-active" id="tiktok-active" value="" class="hidden"  aria-checked="false" aria-label="Tiktok Account">
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
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all" style="">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all" style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="youtube-active" id="youtube-active" value="" class="hidden"  aria-checked="false" aria-label="Youtube Account">
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
                                                                        <div class="border rounded-lg w-14 h-6 relative  transition-all" style="">
                                                                            <span class="roundActive absolute rounded-[100%] w-6 h-6 border top-1/2 -translate-y-1/2 transition-all" style="left:0; transform: translate(0, -50%)"></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <input type="checkbox" name="emails-active" id="emails-active" value="" class="hidden"  aria-checked="false" aria-label="Emails Account">
                                                            </div>
                                                            <div class="inpLnkEmails">
                                                                <input type="email" name="emailsAccount" id="emailsAccount" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs underline text-black transition-all hidden opacity-0" aria-label="Emails Account">
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
                                                                <input type="text" name="bidangTeachers" id="bidangTeachers" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs text-black transition-all" aria-label="Sector Teachers" required>
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
                                                                <input type="date" name="yearsSignTeachers" id="yearsSignTeachers" class="w-full rounded-sm outline-none px-2 py-0.5 text-xs text-black transition-all" aria-label="Date Years Teacher Sign In" required>
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
    <script src="{{asset('assets/js/teachers/popDetailsTeachers.js')}}"></script>
    <script src="{{asset('assets/js/teachers/dataTeachers.js')}}"></script>
@endsection
