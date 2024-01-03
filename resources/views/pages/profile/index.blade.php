@extends('layouts.main.main')
@section('link-rel')
    <link rel="stylesheet" href="assets/css/profil/photoSH.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .inpNumStSch::-webkit-outer-spin-button, .inpNumStSch::-webkit-inner-spin-button{-webkit-appearance: none; margin:0;}
    </style>
@endsection
@section('content')
    @php
        $txDtNpsn = isset($dataSt) ? $dataSt->npsn : 0;
        $txDtWdtSch = isset($dataSt) ? $dataSt->wdth_sch : 0;
        $imgViMiImg = isset($imgViMi) ? $imgViMi->name_files : 'default.png';
        $imgStrOrgLft = isset($imgStrOrg) ? $imgStrOrg->imgleft : 'default.png';
        $imgStrOrgRght = isset($imgStrOrg) ? $imgStrOrg->imgright : 'default.png';
    @endphp
    <section class="topHeaderPageProfileSchool flex items-center justify-center relative overflow-hidden  text-center text-white h-80 lg:h-[28rem]">
        <div class="lazy-placeholder animate-pulse w-full h-full absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-gray-300">
            <div class="txPlace absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 flex flex-col justify-center items-center gap-2">
                <div class="bg-gray-200 w-56 py-6 rounded-xl"></div>
                <div class="bg-gray-200 w-32 py-2 rounded-md"></div>
            </div>
        </div>
        <div class="cntnTopImage" style="display: none">
            <div class="imageFullBgSchool absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full -z-10">
                <div class="ovTop bg-black/60 w-full h-full absolute left-0 top-1/2 -translate-y-1/2"></div>
                <img src="{{asset('assets/img/main/126465066756.jpg')}}" alt="" class="lazyLoadThisPage w-full h-full object-cover object-center">
            </div>
            <div class="content relative z-10 selft-center">
                <h1 class="text-4xl font-bold">Profil Sekolah</h1>
            </div>
        </div>
    </section>
    <div class="schoolNameWthLogo mt-6 transition-transform lg:mt-0 lg:-translate-y-1/3">
        <div class="schollLogoBall">
            <div class="mg aspect-square aspect-[1/1] w-72 mx-auto rounded-[100%] p-1 border-2 bg-white overflow-hidden">
                <div class="lazy-placeholder flex items-center justify-center w-full h-full rounded-[100%] bg-gray-200 animate-pulse">
                    <i class="bi bi-image-fill text-4xl text-gray-400"></i>
                </div>
                <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" style="display: none" alt="" class="lazyLoadThisPage w-full h-full object-cover object-center rounded-[100%]" onclick="openPopup(this.src)">
            </div>
        </div>
        <div class="schoolName mt-12">
            <div class="contentName uppercase text-center font-bold space-y-2">
                <div class="nameS">
                    <h2 class="text-5xl">SMPN 2 INDRAMAYU</h2>
                </div>
                <div class="locSch">
                    <h3 class="text-2xl">INDRAMAYU - JAWABARAT</h3>
                </div>
            </div>
        </div>
    </div>
    <section class="viMi-Schools mt-8">
        {{-- <div class="contentViMiWthSchool border border-black flex flex-col lg:flex-row items-center justify-center lg:px-48 space-y-16 lg:space-y-0 relative"> --}}
        <div class="contentViMiWthSchool lg:grid flex flex-col-reverse gap-8 lg:gap-0 lg:grid-cols-2 lg:space-y-0 relative w-10/12 mx-auto">
            <div class="visiMisi min-h-[24rem]">
                <div class="titleViMi relative w-fit group">
                    <div class="biEdit hidden xl:block opacity-0 invisible transition-all group-hover:opacity-100 group-hover:visible">
                        <span role="button" class="btnEdVisiMisi absolute right-0 p-1.5 border-2 translate-x-1/2 -translate-y-1/2 bg-white rounded-lg hover:bg-gray-200">
                            <i class="bi bi-pencil"></i>
                        </span>
                    </div>
                    <div class="cntn uppercase flex items-center gap-4">
                        <div class="tCntn w-48 py-4 bg-blue-600 text-center text-white font-bold rounded-2xl">
                            <h3>Visi & Misi</h3>
                        </div>
                        <div class="btnEdVisiMisi block xl:hidden border-2 w-32 py-2 text-center text-sm rounded-xl bg-gray-100 hover:bg-gray-300">
                            <span role="button">
                                <div class="t">Edit</div>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="visiProfile group mt-2 px-6 relative">
                    <div class="VisiCtn cursor-default select-none">
                        <p class="line-clamp-4">
                            @if (isset($dataVi))
                                {{$dataVi->visi}}
                            @else
                                Disini adalah tempat visinya
                            @endif
                        </p>
                    </div>
                </div>
                <div class="liMiProfile mt-4 text-sm space-y-4 leading-4 select-none">
                    @if (isset($dataMi))
                        @foreach ($dataMi as $idx => $misi)
                            <div class="misi-{{$idx}} relative group pl-2 flex items-center gap-4">
                                <i class="bi bi-check-circle-fill text-3xl text-blue-600"></i>
                                <p>{{$misi->misi}}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="misi-itm relative group pl-2 flex items-center gap-4">
                            <i class="bi bi-check-circle-fill text-3xl text-blue-600"></i>
                            <p>Disinilah tempat misi sekolahnya</p>
                        </div>
                    @endif
                </div>
                <div class="frmViMiProfile mt-2 px-6"></div>
            </div>
            <div class="squarePhoto">
                <div class="frmHiddenEditImg">
                </div>
                <div class="contentPhoto grid grid-cols-7 grid-rows-7 w-[28rem] aspect-square aspect-[1/1] mx-auto group relative">
                    <div class="spnEditrReset absolute right-0 flex items-center gap-2 translate-x-1/4 -translate-y-1/2 z-[2] invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                        <span role="button" id="_btnResetImageViMi" class="border block p-2 bg-white rounded-lg hover:bg-gray-200" data-action-vimi-reset="vimi_Img?act=viImg2+2fdqj3u-2n">
                            <i class="bi bi-arrow-clockwise text-2xl"></i>
                        </span>
                        <span role="button" id="_btnInpImageViMi" class="border block p-2 bg-white rounded-lg hover:bg-gray-200">
                            <i class="bi bi-pencil text-2xl"></i>
                        </span>
                    </div>
                    <div class="imgSchool overflow-hidden" style="grid-area: 1 / 2 / 7 / 8">
                        <div class="lazy-placeholder flex items-center justify-center w-full h-full rounded-lg bg-gray-200 animate-pulse">
                            <i class="bi bi-image-fill text-4xl text-gray-400"></i>
                        </div>
                        <img src="{{asset('storage/images/pages/profile/' . $imgViMiImg)}}" style="display: none" alt="" id="_imgViMiView" class="lazyLoadThisPage w-full h-full object-cover object-center rounded-lg">
                    </div>
                    <div class="acredSch select-none z-[2]" style="grid-area: 6 / 1 / 8 / 4">
                        <div class="bg-blue-500 w-full h-full rounded-lg grid grid-cols-3 grid-rows-3 overflow-hidden">
                            <div class="acrCont z-[2] flex flex-col items-center justify-center text-white font-bold" style="grid-area: 2 / 2 / 3 / 3">
                                <div class="ta text-lg">Akreditasi</div>
                                <div class="tc text-6xl">A</div>
                            </div>
                            <div class="biAc translate-x-1/2 translate-y-[15%]" style="grid-area: 1 / 1 / -1 / -1">
                                <i class="bi bi-award-fill text-blue-400 text-9xl"></i>
                            </div>
                            <div class="biAc -translate-x-1/4 -translate-y-1/4" style="grid-area: 1 / 1 / 2 / 2">
                                <i class="bi bi-award text-blue-400 text-5xl"></i>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('saveVisiMisiImage')}}" method="POST" enctype="multipart/form-data" class="self-center" style="grid-area: 7 / 6 / 8 / 8">
                        @csrf
                        <input type="hidden" name="_tokenResetImgViMi" id="_tokenResetImgViMi" class="hidden sr-only">
                        <input type="file" name="_filImgViMi" id="_filImgViMi" class="hidden sr-only" accept="image/*">
                        <button type="submit" id="_btnSubmitImageViMi" class="transition-all w-full opacity-0 invisible" style="display: none">
                            <div class="t border-2 w-full py-2 rounded-xl transition-all bg-gray-100 hover:bg-gray-300">Simpan</div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <hr class="mt-12 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
    <section class="mt-12">
        <div class="flex flex-col-reverse xl:flex-row gap-12 w-10/12 mx-auto relative group">
            <div class="frmEdStsPrflSch flex items-center flex-col xl:flex-row-reverse xl:absolute gap-2 top-0 right-0 -translate-x-0 -translate-y-0 xl:opacity-0 xl:invisible transition-all group-hover:opacity-100 group-hover:visible">
                <div class="frmInpHdnStatsProfileSch w-full md:w-1/2 xl:w-fit">
                    <form action="{{route('saveStSchool')}}" method="post">
                        @csrf
                        <input type="number" min="0" max="" name="npsnPrflSch" id="npsnPrflSch" class="inpNumStSch hidden sr-only">
                        <input type="number" min="0" max="" name="WdthPrflSch" id="WdthPrflSch" class="inpNumStSch hidden sr-only">
                        <button type="submit" class="w-full border-2 border-gray-400 bg-gray-200 px-12 py-1 block text-center rounded-lg">
                            <div class="t">Simpan</div>
                        </button>
                    </form>
                </div>
                <div class="edStats w-full md:w-1/2 xl:w-fit">
                    <span role="button" id="edStatProfileSch" class="border-2 border-gray-400 bg-gray-200 px-12 py-1 block text-center rounded-lg">
                        <div class="t">Edit</div>
                    </span>
                    <span role="button" id="edCanclStatProfileSch" style="display: none" class="border-2 border-gray-400 bg-gray-200 px-12 py-1 block text-center rounded-lg">
                        <div class="t">Cancel</div>
                    </span>
                </div>
            </div>
            <div class="stContn w-full flex flex-col lg:flex-row justify-center lg:items-center gap-6 lg:gap-24">
                <div class="npsnSch flex gap-4">
                    <div class="imgIcP w-20">
                        <img src="assets/img/icon/pen.png" alt="">
                    </div>
                    <div class="dctnNpsn max-w-[11rem] flex flex-col justify-between">
                        <p class="otpStScha text-xl font-bold"> {{$txDtNpsn}} </p>
                        <input type="number" max="9999999999" id="tmpNpnPrfSch" class="inpNumStSch tmpInpStScha rounded-lg font-bold" style="display: none">
                        <p class="text-xs leading-3">Nomor Pokok Sekolah Nasional (NPSN)</p>
                    </div>
                </div>
                <div class="arSch flex gap-4">
                    <div class="imgIcLr w-20">
                        <img src="assets/img/icon/layer.png" alt="">
                    </div>
                    <div class="dctnAr max-w-[11rem] flex flex-col justify-between">
                        <div class="t flex items-center gap-1 font-bold">
                            <p class="otpStScha text-xl"> {{$txDtWdtSch}} </p>
                            <input type="number" max="99999" id="tmpWdhPrfSch" class="inpNumStSch tmpInpStScha rounded-lg w-24" style="display: none;">
                            <div class="sp">
                                m<sup>2</sup>
                            </div>
                        </div>
                        <p class="text-xs leading-3">Luas Tanah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-20">
        <div class="shrcRcEksTe relative h-96">
            <div class="contentShrcRcEksTe absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-[2] text-white w-full">
                <div class="ctnShrc flex flex-col lg:flex-row justify-center items-center gap-8 relative z-10 h-full p-12">
                    <div class="rngKl flex gap-4 justify-center items-center max-w-[450px]">
                        <div class="nbr-Kl text-4xl xl:text-7xl font-bold">
                            @if (isset($countArr['cntClass']))
                                {{ $countArr['cntClass'] }}
                            @else
                                0
                            @endif
                        </div>
                        <div class="descChild space-y-8 text-left">
                            <a href="" class="text-xl block group relative font-bold">
                                Ruang Kelas
                                <i class="bi bi-arrow-right hidden lg:block text-4xl transition-all absolute right-[10%] top-1/2 -translate-x-[10%] -translate-y-1/2 group-hover:right-0 group-hover:-translate-x-0"></i>
                            </a>
                            <p class="text-sm leading-4 line-clamp-2">Serta fasilitas penunjang kegiatan belajar mengajar lainnya</p>
                        </div>
                    </div>
                    {{-- <div class="rngEks  gap-4 justify-center items-center max-w-[450px] hidden">
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
                    </div> --}}
                    <div class="rngTe flex gap-4 justify-center items-center max-w-[450px]">
                        <div class="nbr-Kl text-4xl xl:text-7xl font-bold">
                            @if (isset($countArr['cntTeacher']))
                                {{ $countArr['cntTeacher'] }}
                            @else
                                0
                            @endif
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
            <div class="bgImage h-full">
                <div class="ovBg bg-blue-800/80 w-full h-full absolute left-0"></div>
                <img src="{{asset('assets/img/main/126465066756.jpg')}}" alt="" class="w-full h-full object-cover object-center">
            </div>
        </div>
    </section>
    <section class="mt-20">
        <div class="strOrg">
            <div class="containerStrOrg w-10/12 mx-auto">
                <div class="titleStrOrg relative w-fit group flex items-center gap-6">
                    {{-- <div class="biEdit opacity-0 invisible transition-all group-hover:opacity-100 group-hover:visible">
                        <span role="button" class="absolute right-0 p-1.5 border-2 translate-x-1/2 -translate-y-1/2 bg-white rounded-lg hover:bg-gray-200">
                            <i class="bi bi-pencil"></i>
                        </span>
                    </div> --}}
                    <div class="cntn px-6 py-4 bg-blue-600 text-center text-white font-bold rounded-2xl uppercase">
                        <h3>Struktur Organisasi</h3>
                    </div>
                    <div class="frmHiddenEditImg">
                        <form action="{{route('saveOrResetStrOrgImage')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_tokenResetLftImg" id="_tokenResetLftImg" class="hidden sr-only">
                            <input type="hidden" name="_tokenResetRghtImg" id="_tokenResetRghtImg" class="hidden sr-only">
                            <input type="file" name="_filLftImg" id="_filLftImg" class="hidden sr-only" accept="image/*">
                            <input type="file" name="_filRghtImg" id="_filRghtImg" class="hidden sr-only" accept="image/*">
                            <button type="submit" id="_btnSubmitImageOrgStrc" class="transition-all opacity-0 invisible" style="display: none">
                                <div class="t border-2 px-6 lg:px-8 py-2 rounded-xl transition-all bg-gray-100 hover:bg-gray-300">Simpan</div>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="contentStrOrg grid xl:grid-cols-2 gap-6 xl:gap-0 mt-6">
                    <div class="lftChrtOrg ">
                        <div class="conEl relative w-fit mx-auto overflow-hidden group">
                            <div class="spnEditrReset absolute right-0 flex items-center gap-2 z-[2] invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                                <span role="button" id="_btnResetImageLft" class="border block p-2 bg-white rounded-lg hover:bg-gray-200" data-action-orgstrc-reset="StrOrg_Img?act=lftImg+29ndf8821sx">
                                    <i class="bi bi-arrow-clockwise text-2xl"></i>
                                </span>
                                <span role="button" id="_btnInpImageLft" class="border block p-2 bg-white rounded-lg hover:bg-gray-200">
                                    <i class="bi bi-pencil text-2xl"></i>
                                </span>
                            </div>
                            <div class="mgSogImg p-4">
                                <div class="aspect-[3/4] w-[32rem] overflow-hidden rounded-xl">
                                    <div class="lazy-placeholder flex items-center justify-center w-full h-full bg-gray-200 animate-pulse">
                                        <i class="bi bi-image-fill text-4xl text-gray-400"></i>
                                    </div>
                                    <img src="{{asset('storage/images/pages/profile/' . $imgStrOrgLft)}}" style="display: none" alt="" id="_imgStrcOrgLft" class="lazyLoadThisPage w-full h-full object-center object-cover origin-center hover:scale-110 transition-all">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rghtImgssa flex items-center">
                        <div class="conEl relative w-fit mx-auto overflow-hidden group">
                            <div class="spnEditrReset absolute right-0 flex items-center gap-2 z-[2]  invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                                <span role="button" id="_btnResetImageRght" class="border block p-2 bg-white rounded-lg hover:bg-gray-200" data-action-orgstrc-reset="StrOrg_Img?act=rghtImg+2i8jdfnq82sc">
                                    <i class="bi bi-arrow-clockwise text-2xl"></i>
                                </span>
                                <span role="button" id="_btnInpImageRght" class="border block p-2 bg-white rounded-lg hover:bg-gray-200">
                                    <i class="bi bi-pencil text-2xl"></i>
                                </span>
                            </div>
                            <div class="mgsImg p-6">
                                <div class="aspect-video aspect-[16/9] min-h-40 overflow-hidden rounded-xl">
                                    <div class="lazy-placeholder flex items-center justify-center w-full h-96 bg-gray-200 animate-pulse">
                                        <i class="bi bi-image-fill text-4xl text-gray-400"></i>
                                    </div>
                                    <img src="{{asset('storage/images/pages/profile/' . $imgStrOrgRght)}}" style="display: none" alt="" id="_imgStrcOrgRght" class="lazyLoadThisPage w-full h-full object-center object-cover origin-center hover:scale-110 transition-all">
                                </div>
                            </div>
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
    </section>
    <div class="foo mb-96"></div>
@endsection
@section('custom-script')
    <script src="{{asset('assets/js/profile/profile.js')}}"></script>
    <script src="{{asset('assets/js/profile/profile_misi.js')}}"></script>
    <script src="{{asset('assets/js/profile/profile_strorg.js')}}"></script>
    <script src="{{asset('assets/js/profile/profile_stat.js')}}"></script>
@endsection
