@extends('layouts.main.main')
@section('link-rel')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    {{-- <section class="imgOssool-profiles relative">
        <div class="img-profiles flex items-center justify-center relative text-center text-white h-96 bg-cover bg-center bg-no-repeat after:absolute after:top-0 after:left-0 after:bg-black/60 after:w-full after:h-full"
            style="background-image: url('assets/img/main/126465066756.jpg');">
            <div class="content relative z-10 selft-center">
                <h1 class="text-4xl font-bold">Osis </h1>
            </div>
        </div>
        <div class="imgOss transition-all mx-auto w-52 lg:w-72 -mt-36 group text-center text-xl font-bold relative">
            <div class="aspect-square rounded-[100%] overflow-hidden border-4 p-2 bg-white relative">
                <img src="assets/img/main/126465066756.jpg" alt="" class="w-full h-full object-cover object-center rounded-[100%]" onclick="openPopup(this.src)">
            </div>
            <div class="editimgOss absolute right-[5%] top-[15%] -translate-x-[5%] -translate-y-[15%] opacity-0 transition-opacity group-hover:opacity-100">
                <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                    <i class="bi bi-pencil"></i>
                </button>
            </div>
        </div>
        <div class="descEks p-6 group">
            <div class="w-full lg:w-3/4 transition-all md mx-auto text-center text-sm md:text-lg relative">
                <p class="line-clamp-6">
                    Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                    Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                    Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                    Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                    Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                    Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                    Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                    Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                </p>
                <div class="editdescCtn scrollbar absolute z-10 -right-[2%] -top-1/4 translate-x-[2%] translate-y-1/4 lg:-right-[2%] lg:-top-1/4 lg:translate-x-[2%] lg:translate-y-1/4 invisible opacity-0 transition-all group-hover:visible group-hover:opacity-100">
                    <button class="editB p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="topHeaderPageProfileOsis flex items-center justify-center relative overflow-hidden  text-center text-white h-80 lg:h-[28rem]">
        {{-- <div class="lazy-placeholder animate-pulse w-full h-full absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-gray-300">
            <div class="txPlace absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 flex flex-col justify-center items-center gap-2">
                <div class="bg-gray-200 w-56 py-6 rounded-xl"></div>                
                <div class="bg-gray-200 w-32 py-2 rounded-md"></div>                
            </div>
        </div> --}}
        <div class="cntnTopImage" style="display: ">
            <div class="imageFullBgOsis absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full -z-10">
                <div class="ovTop bg-black/60 w-full h-full absolute left-0 top-1/2 -translate-y-1/2"></div>
                <img src="{{asset('assets/img/main/126465066756.jpg')}}" alt="" class="lazyLoadThisPage w-full h-full object-cover object-center">            
            </div>
            <div class="content relative z-10 selft-center">
                <h1 class="text-4xl font-bold">Osis</h1>
            </div>
        </div>
    </section>
    <div class="osisLogo mt-6 transition-transform lg:mt-0 lg:-translate-y-1/3">
        <div class="contentDisplayOsLg w-10/12 mx-auto" style="display: block">
            <div class="schollLogoBall">
                <div class="mg aspect-square aspect-[1/1] w-72 mx-auto rounded-[100%] p-1 border-2 bg-white overflow-hidden">
                    {{-- <div class="lazy-placeholder flex items-center justify-center w-full h-full rounded-[100%] bg-gray-200 animate-pulse">
                        <i class="bi bi-image-fill text-4xl text-gray-400"></i>
                    </div> --}}
                    <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" style="display: " alt="" class="lazyLoadThisPage w-full h-full object-cover object-center rounded-[100%]" onclick="openPopup(this.src)">
                </div>
            </div>
            <div class="osisDesc mt-6 w-9/12 mx-auto">
                <div class="contentDesc text-base text-center font-bold space-y-2">
                    <div class="t">
                        <p class="line-clamp-6">
                            Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                            Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                            Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                            Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                            Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                            Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <span role="button" id="_spnBtnEdPgOsTop">
                    <div class="t border-2 px-12 py-2 rounded-xl border-gray-200 bg-gray-400 transition-all hover:bg-gray-600 hover:text-white">Edit</div>
                </span>
            </div>
        </div>
        <div class="containerFrmSchllLogoBall w-10/12 mx-auto" style="display: none"></div>
    </div>
    <hr class="mt-12 mx-auto w-[90%] border-[1.5px] border-black/40 rounded-2xl">
    <section class="cTea mt-12 flex flex-col lg:flex-row justify-center items-center gap-4 lg:gap-16">
        <div class="photo-cTea" onclick="openPopup(this.querySelector('img').src)">
            <div class="img-pri relative p-4 w-[280px] h-[400px]">
                <div class="blur-effect absolute w-[250px] h-[370px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#AFAFAF]"
                    style="background: linear-gradient(30deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 85.94%, #FFF 95.31%, #FFF 100%), linear-gradient(331deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 85.56%, #FFF 94.83%, #FFF 99.47%), linear-gradient(0deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(90deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50.01%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(270deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 94.88%, #FFF 100%), linear-gradient(209deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.00) 50.01%, #FFF 87.5%, #FFF 100%), linear-gradient(151deg, rgba(255, 255, 255, 0.00) 50%, rgba(255, 255, 255, 0.88) 83.33%, #FFF 89.56%, #FFF 100%);">
                </div>
                <img src="{{asset('storage/images/teachers/default.png')}}" id="imgTeacherOsisGuide" class="object-center object-cover w-full h-full" alt="">
            </div>
        </div>
        <div class="quote-cTea w-11/12 lg:w-1/2 shadow-gray-700 shadow-md rounded-xl relative group">
            <div class="icFrm">
                <div class="icon-quote absolute left-[3%] top-6 -translate-x-[3%] -translate-y-6">
                    <img src="assets/img/icon/quote.png" class="w-12 h-12 lg:w-20 lg:h-20" alt="">
                </div>
                <div class="spnEdTeGuid block absolute gap-2 right-4 top-6">
                    <div class="edStats">
                        <span role="button" id="edPageOsisChsTeGuid" class="border-2 border-gray-400 bg-gray-200 px-12 py-1 block text-center rounded-lg">
                            <div class="t block w-fit">Edit</div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="contnQuote px-12 pt-14 pb-8 lg:px-20 lg:pt-24 lg:pb-12 h-auto transition-all">
                <div class="containerContentQuote">
                    <div class="quote mt-6 mx-auto text-base lg:text-lg border-2 border-dashed border-black/40 p-4 rounded-2xl relative group">
                        <div class="h-full  relative group">
                            <blockquote class="line-clamp-[8]">
                                Lorem ipsum dolor amet
                                Osis adalah wadah Pembinaan Kesiswaan di sekolah untuk pengembangan minat, bakat serta potensi Peserta Didik.
                            </blockquote>
                        </div>
                    </div>
                    <div class="detail-person w-3/4 mt-4 mx-auto">
                        <div class="name-person text-base lg:text-xl text-[#4f4f4f]">
                            <strong>Name person</strong>
                        </div>
                        <div class="position-person text-[12px] lg:text-[16px] text-[#808080]">
                            Pembina Osis
                        </div>
                    </div>
                </div>
                <div class="containerFrmEdT"></div>
            </div>
        </div>
    </section>
    <section class="deSum-Eksl mt-24">
        <div class="2xl:w-3/4 p-4 py-10 mx-auto bg-gray-100 2xl:rounded-xl">
            <div id="containerDisplayStatOsis" class="datSumEks flex-col md:flex-row justify-center items-center h-full gap-6 select-none" style="display: flex">
                <div class="it1-leEks w-64 lg:w-54 p-6 rounded-lg hover:bg-gray-300/60">
                    <div class="tdat relative group">
                        <strong class="tiLeEks">Ketua</strong>
                        <div class="pcEdDatLeEks absolute -right-[10%] -top-1/4 -translate-x-[10%] -translate-y-1/4">
                            <span role="button" class="edStatOsis p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                <i class="bi bi-pencil"></i>
                            </span>
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
                            <span role="button" class="edStatOsis p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                <i class="bi bi-pencil"></i>
                            </span>
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
                            <span role="button" class="edStatOsis p-2 relative after:absolute after:w-full after:h-full after:group-hover:border-2 after:rounded-xl after:group-hover:border-sky-400 after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:blur-[1px] after:z-10">
                                <i class="bi bi-pencil"></i>
                            </span>
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
            <div id="containerFormStatOsis" class="containerFrmDeSum border border-black" style="display: none">
                {{-- <form action="" method="POST" class="">
                    <div class="flex flex-col md:flex-row justify-center items-center h-full gap-6 select-none">
                        <div class="cntrChsLeOs p-6 rounded-lg">
                            <div class="searchStd bg-white rounded-lg flex items-center gap-2 p-2">
                                <i class="bi bi-search"></i>
                                <input type="text" id="searchStdLe" class="rounded-lg border-none">
                            </div>
                            <div class="liChsLeStdnt relative mt-2">
                                <input type="checkbox" id="shwLiChsLeStdnt" class="peer hidden sr-only">
                                <label for="shwLiChsLeStdnt" class="py-4 block bg-white rounded-lg relative *:peer-checked:-rotate-90">
                                    <div class="d absolute top-1/2 -translate-y-1/2 right-4 z-[5] transition-all">
                                        <i class="bi bi-chevron-left text-lg"></i>
                                    </div>
                                </label>
                                <div class="liStdntChsLe mt-2 absolute z-[4] bg-white rounded-lg p-2 w-full h-0 opacity-0 invisible transition-all peer-checked:h-auto peer-checked:opacity-100 peer-checked:visible">
                                    <ul class="grid gap-1 py-4 h-52 overflow-y-scroll" style="display: ">
                                        @for ($i=1; $i<10; $i++)
                                            <li>
                                                <label for="chsLeOsisStdn_{{$i}}" class="cursor-pointer relative block">
                                                    <input type="radio" name="stdntLeOsis" id="chsLeOsisStdn_{{$i}}" value="chsLeOsisStdn_{{$i}}" class="hidden sr-only peer">
                                                    <div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm">
                                                        <div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden">
                                                            <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center">
                                                        </div>
                                                        <p class="w-full select-none">Name std {{$i}}</p>
                                                    </div>
                                                    <div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible">
                                                        <i class="bi bi-check-circle-fill text-green-600 text-xl"></i>
                                                    </div>
                                                </label>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cntrChsMemOs p-6 rounded-lg">
                            <div class="searchStd bg-white rounded-lg flex items-center gap-2 p-2">
                                <i class="bi bi-search"></i>
                                <input type="text" id="searchStdMem" class="rounded-lg border-none">
                            </div>
                            <div class="liChsMembrStdnt relative mt-2">
                                <input type="checkbox" id="shwLiChsMemrStdnt" class="peer hidden sr-only">
                                <label for="shwLiChsMemrStdnt" class="py-4 block bg-white rounded-lg relative *:peer-checked:-rotate-90">
                                    <div class="d absolute top-1/2 -translate-y-1/2 right-4 z-[5] transition-all">
                                        <i class="bi bi-chevron-left text-lg"></i>
                                    </div>
                                </label>
                                <div class="liStdntChsMemr mt-2 absolute z-[4] bg-white rounded-lg px-2 w-full h-0 opacity-0 invisible transition-all peer-checked:h-auto peer-checked:opacity-100 peer-checked:visible">
                                    <ul class="grid gap-1 py-4 h-52 overflow-y-scroll" style="display: ">
                                        @for ($i=1; $i<10; $i++)
                                            <li>
                                                <label for="chsMemOsisStdn_{{$i}}" class="cursor-pointer relative block">
                                                    <input type="checkbox" name="stdntChsMemberOsis{{$i}}" id="chsMemOsisStdn_{{$i}}" value="chsMemOsisStdn_{{$i}}" class="hidden sr-only peer">
                                                    <div class="cnt relative bg-white flex items-center p-1 gap-2 rounded-xl overflow-hidden transition-all hover:bg-gray-300 peer-checked:bg-green-200 peer-checked:shadow-gray-500 peer-checked:shadow-sm">
                                                        <div class="imgTe aspect-[1/1] w-12 rounded-[100%] overflow-hidden">
                                                            <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center">
                                                        </div>
                                                        <p class="w-full select-none">Name std {{$i}}</p>
                                                    </div>
                                                    <div class="ic absolute right-3 top-1/2 -translate-y-1/2 transition-all opacity-0 invisible peer-checked:opacity-100 peer-checked:visible">
                                                        <i class="bi bi-check-circle-fill text-green-600 text-xl"></i>
                                                    </div>
                                                </label>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cnclSubmChStd">
                            <div class="ceqsuf flex items-center justify-end gap-2">
                                <div class="cncl">
                                    <span role="button" id="_cnclChsStdn" class="block px-8 py-2 rounded-xl border-2 border-gray-600 bg-gray-200 hover:bg-gray-400">
                                        <div class="t">Cancel</div>
                                    </span>
                                </div>
                                <div class="sbmtChsStdn">
                                    <button type="submit" id="sbmtChsStdn" class="">
                                        <div class="t block px-8 py-2 rounded-xl border-2 border-blue-800 bg-blue-600 text-white hover:bg-blue-700">
                                            <p>Submit</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </section>
    <hr class="mt-28 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
    <section class="mt-8">
        <div class="strOrg w-11/12 mx-auto">
            <div class="chrt-stcOrgEks">
                <div class="titleChrt">
                    <div class="tSct w-fit py-3 px-6 bg-blue-600 rounded-xl text-white font-bold text-base">
                        <h2>Struktur Organisasi</h2>
                    </div>
                </div>
                <div class="chrtImg mt-6 relative mx-auto w-3/4 max-w-4xl rounded-2xl group border border-black">
                    <div class="spnEditrReset absolute right-0 translate-x-1/4 -translate-y-1/3 flex items-center gap-2 z-[2] visible opacity-100 lg:opacity-0 lg:invisible transition-all group-hover:visible group-hover:opacity-100">
                        <span role="button" id="_btnResetImageLft" class="border block p-2 bg-white rounded-lg hover:bg-gray-200" data-action-orgstrc-reset="StrOrg_Img?act=lftImg+29ndf8821sx">
                            <i class="bi bi-arrow-clockwise text-2xl"></i>
                        </span>
                        <span role="button" id="_btnInpImageLft" class="border block p-2 bg-white rounded-lg hover:bg-gray-200">
                            <i class="bi bi-pencil text-2xl"></i>
                        </span>
                    </div>
                    <div class="theChrtImg aspect-square aspect-[1/1] rounded-2xl overflow-hidden">
                        <img src="assets/img/dumb/imgtemp 1.jpg" alt="" class="w-full h-full object-cover object-center transition-all group-hover:scale-125" onclick="openPopup(this.src)">
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
            </div>
            <div class="liImg-galOsis mt-6">
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-2 md:gap-8 2xl:grid-cols-4">
                    @for ($i=1; $i<=9; $i++)
                        <div class="contItem-imgGalOsis rounded-sm md:rounded-xl lg:rounded-2xl shadow-gray-500 shadow-sm overflow-hidden relative aspect-video aspect-[4/3] lg:aspect-[4/3] transition-all group grid grid-cols-3 grid-rows-3">
                            <div class="cntrImg w-full overflow-hidden h-full col-start-1 col-end-4 row-start-1 row-end-4">
                                <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center hover:scale-125 transition-all" onclick="openPopup(this.src)">
                            </div>
                            <div class="sumItem-galOsis bg-white lg:rounded-xl sticky lg:translate-y-[150%] group-hover:translate-y-0 lg:w-[90%] px-2 py-2 md:px-6 md:py-3 overflow-hidden transition-all self-center mx-auto col-start-1 col-end-4 row-start-3 row-end-4">
                                <div class="dateItem-galOsis text-[10px] md:text-xs xl:text-sm text-blue-600">
                                    <p class="tracking-tight line-clamp-1">2 Agustus 2017</p>
                                </div>
                                <div class="tiItem-galOsis text-xs md:text-base xl:text-lg lg:font-bold">
                                    <h3 class="line-clamp-1 sm:line-clamp-2 lg:line-clamp-1">
                                        Ini judul gambarnya asdada ad asdasd asd asd asd asd asd asd asd asd sa
                                        Ini judul gambarnya asdada ad asdasd asd asd asd asd asd asd asd asd sa
                                        Ini judul gambarnya asdada ad asdasd asd asd asd asd asd asd asd asd sa
                                        Ini judul gambarnya asdada ad asdasd asd asd asd asd asd asd asd asd sa
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endfor
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
                            <h3 class="text-4xl lg:text-7xl font-bold">Ada pertanyaan atau ingin tahu selengkapnya?</h3>
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
@endsection
@section('custom-script')
    <script src="{{asset('assets/js/osis/osis.js')}}"></script>
    <script src="{{asset('assets/js/osis/osis_teguid.js')}}"></script>
@endsection
