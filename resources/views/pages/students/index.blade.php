@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="img-classes flex items-center justify-center relative overflow-hidden  text-center text-white h-80 lg:h-[28rem]">
        <div class="lazy-placeholder animate-pulse w-full h-full absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-gray-300">
            <div class="txPlace absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 flex flex-col justify-center items-center gap-2">
                <div class="bg-gray-200 w-56 py-6 rounded-xl"></div>                
                <div class="bg-gray-200 w-32 py-2 rounded-md"></div>                
            </div>
        </div>
        <div class="cntnTopImage hidden">
            <div class="imgBgTop absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full -z-10">
                <div class="ovTop bg-black/60 w-full h-full absolute left-0 top-1/2 -translate-y-1/2"></div>
                <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="w-full h-full object-cover object-center">            
            </div>
            <div class="content relative z-10 selft-center">
                <h1 class="text-4xl font-bold">Kelas VII A</h1>
            </div>
        </div>
    </section>
    <section class="teachers-class mt-12 text-center text-xl font-bold space-y-4">
        <div class="placeHolderTeacherClass space-y-2 animate-pulse">
            <div class="imgTe mx-auto w-52 lg:w-72 relative group">
                <div class="aspect-square rounded-[100%] overflow-hidden border-4 p-2 relative bg-gray-200"></div>
            </div>
            <div class="bg-gray-200 w-32 py-4 mx-auto rounded-xl"></div>
            <div class="socmedTe space-x- text-2xl group-">
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
                <div class="inline-block w-10 h-10 rounded-xl bg-gray-200"></div>
            </div>
        </div>
        <div class="contentTeachersClass hidden">
            <div class="imgTe mx-auto w-52 lg:w-72 relative group">
                <div class="aspect-square rounded-[100%] overflow-hidden border-4 p-2 relative">
                    <img src="{{asset('assets/img/main/126465066756.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-[100%]">
                </div>
                <div class="editImgTe absolute right-[5%] top-[15%] -translate-x-[5%] -translate-y-[15%] opacity-0 transition-opacity group-hover:opacity-100">
                    <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
            </div>
            <h2> @{{Nama Guru}} </h2>
            <div class="socmedTe space-x- text-2xl group-">
                <a href="" class="inline-block p-2 rounded-xl hover:opacity-70">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="" class="inline-block p-2 rounded-xl hover:opacity-70">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="" class="inline-block p-2 rounded-xl hover:opacity-70">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="" class="inline-block p-2 rounded-xl hover:opacity-70">
                    <i class="bi bi-youtube"></i>
                </a>
            </div>
        </div>
    </section>
    <section class="frmAddStnds mt-12">
        <div class="title-students text-2xl flex items-center px-6 md:px-12 gap-6 py-4 font-bold border-b-4 border-black relative">
            <form action="" method="POST" enctype="multipart/form-data" class="sr-only">
                @csrf
                <input type="file" name="fmt_Excel" id="fmtExcel" accept=".xlsx, .xls" value="" class="sr-only" onchange="openExcelPopUp(this)">
                <button type="submit" id="sbFmtExcel" class="sr-only"></button>
            </form>
            <span role="button" type="button" class="btrinp-file text-sm py-2 px-6 border-2 rounded-lg flex items-center hover:bg-gray-100">
                <i class="bi bi-file-earmark-arrow-up-fill md:mr-2 text-2xl text-gray-600"></i>
                <p class="hidden md:block">File</p>
            </span>
            <span role="button" id="btrcr-fm" class="btrcr-fm text-sm py-2 px-6 border-2 rounded-lg flex items-center hover:bg-gray-100">
                <i class="bi bi-plus-circle md:mr-2 text-2xl"></i>
                <p class="hidden md:block">Siswa</p>
            </span>
        </div>
    </section>
    <section class="listStudents mt-8 px-4 space-y-12">
        {{-- <div class="list-items flex flex-wrap gap-5"> --}}
        <div class="list-student mt-6 grid grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5 relative">
            @for ($i=0; $i < 10; $i++)
                <div class="itemStudent group aspect-[3/4] bg-white regular-shadow border rounded-2xl overflow-hidden relative">
                    <div class="lazy-placeholder w-full h-full animate-pulse relative">
                        <div class="flex items-center justify-center w-full h-full bg-gray-300 rounded">
                            <svg class="w-10 h-10 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                            </svg>
                        </div>
                        <div class="lzLR flex items-center gap-2 absolute bg-gray-200 py-1 px-4 rounded-xl right-[5%] top-[5%] -translate-x-[5%] -translate-y-[5%] ">
                            <div class="bg-gray-300 w-8 h-8 rounded-lg"></div>
                            <div class="bg-gray-300 w-8 h-8 rounded-lg"></div>
                        </div>
                        <div class="bg-gray-200 w-3/4 py-6 rounded-xl absolute bottom-[5%] left-1/2 -translate-y-[5%] -translate-x-1/2"></div>
                    </div>
                    <div class="contentItems w-full h-full hidden">
                        <div class="button-editDel flex gap-2 items-center absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                            <span role="button" class="editBtClass border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-pencil"></i>
                            </span>
                            <span role="button" class="delBtClass border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                <i class="bi bi-trash3"></i>
                            </span>
                        </div>
                        <img src="{{asset('storage/images/classes/default.png')}}" alt="" class="lozad supImg w-full h-full object-cover object-center relative" loading="lazy">
                        <div class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all" data-class-grade="" data-class-id="">
                            <p class="nameStudent w-3/4 py-2 text-center font-bold bg-white rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%]">
                                kjasbf
                            </p>
                        </div>
                    </div>
                </div>
            @endfor
            <div class="group bg-white regular-shadow flex justify-center items-center border rounded-2xl overflow-hidden relative hover:bg-gray-500/25">
                <div class="add-icon">
                    <i class="bi bi-plus-circle text-8xl opacity-50"></i>
                </div>
                <button type="button" class="btrpp-vii block w-full h-full inset-0 absolute z-10"></button>
            </div>
        </div>
    </section>
    <section id="pop-upFormAddStudent" class="pop-upFormAddStudent fixed w-full lg:w-1/2 max-h-full left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2  px-8 py-6 bg-white border border-black rounded-2xl overflow-auto z-50">
        <div class="mx-auto">
            <button id="btrpp-clsFrm" type="button" class="icon border border-black rounded-lg absolute top-[5%] right-[5%] -translate-x-[5%] -translate-y-[5%]">
                <i class="bi bi-x text-5xl"></i>
            </button>
            <form action="{{ route('storeClass') }}" method="POST" class="form-addClass space-y-6" enctype="multipart/form-data">
                @csrf
                <div class="frmStdnt">
                    <div class="imgStudent block">
                        <div class="group bg-white regular-shadow w-80 h-80 border-dashed rounded-2xl overflow-hidden relative mx-auto">
                            <div class="btnResetImage flex absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                <span role="button" class="resetImageStudent border border-black bg-white p-0.5 rounded-lg hover:bg-gray-200 text-2xl">
                                    <i class="bi bi-arrow-clockwise flex"></i>
                                </span>
                            </div>
                            <img src="" alt="" id="previewImage" class="supImg w-full h-full object-cover object-center relative bg-gray-400/50">
                            <label for="imgFrmStudent" class="block w-full h-full absolute inset-0 group-hover:bg-black/30 transition-all cursor-pointer">
                                <label for="imgFrmStudent" class="itemClass w-3/4 py-2 text-white text-center font-bold cursor-pointer bg-blue-400 rounded-xl z-10 absolute -bottom-full left-1/2 translate-y-full -translate-x-1/2 transition-all group-hover:bottom-[5%] group-hover:-translate-y-[5%] hover:bg-cyan-500">
                                    <i class="bi bi-plus-circle text-lg"></i>
                                    Add Image
                                </label>
                            </label>
                            <input type="file" name="imgFrmStudent" id="imgFrmStudent" accept="image/*" class="w-15 h-15 border border-black sr-only" onchange="previewFile(event)" value="">
                        </div>
                    </div>
                    <div class="nmeAndNisStdnt space-y-2">
                        <div class="nameWithClassStudent flex items-center gap-2">
                            <div class="nameStudent w-full">
                                <div class="theLabels">
                                    <label for="nameFrmStudent" class="nameFrmStudent font-bold">Nama Siswa</label>
                                </div>
                                <input type="text" id="nameFrmStudent" class="border w-full py-2 px-4 rounded-lg">
                            </div>
                            <div class="classStudent flex-shrink-0 w-48">
                                <div class="thHeadClass font-bold">
                                    <p>Kelas</p>
                                </div>
                                <div class="t">
                                    <p class="border w-full py-2 px-4 rounded-lg">VII</p>
                                </div>
                            </div>
                        </div>
                        <div class="nisStudent">
                            <div class="theLabels">
                                <label for="nisFrmStudent" class="nisFrmStudent font-bold">NIS Siswa</label>
                            </div>
                            <input type="text" name="nisFrmStudent" id="nisFrmStudent" class="border w-full py-2 px-4 rounded-lg">
                        </div>
                    </div>
                    <div class="lnkSumTeDats mt-8">
                        <div class="cntnLnkSumTeDats">
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
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="facebook-active" class="text-sm md:text-base">Facebook</label>
                                                            <label for="facebook-active" class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all" style="">
                                                                    <span class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="facebook-active" id="facebook-active" value="" class="checkboxActiveLink hidden"
                                                            aria-checked="false" aria-label="Facebook Account">
                                                    </div>
                                                    <div class="inpLnkFacebook">
                                                        <input type="text" name="facebookLink" id="facebookLink" class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
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
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="instagram-active"
                                                                class="text-sm md:text-base">Instagram</label>
                                                            <label for="instagram-active"
                                                                class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all"
                                                                    style="">
                                                                    <span class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="instagram-active"
                                                            id="instagram-active" value="" class="checkboxActiveLink hidden"
                                                            aria-checked="false" aria-label="Instagram Account">
                                                    </div>
                                                    <div class="inpLnkinstagram">
                                                        <input type="text" name="instagramLink"
                                                            id="instagramLink"
                                                            class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
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
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="twitter-active"
                                                                class="text-sm md:text-base">Twitter</label>
                                                            <label for="twitter-active"
                                                                class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all"
                                                                    style="">
                                                                    <span
                                                                        class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="twitter-active"
                                                            id="twitter-active" value="" class="checkboxActiveLink hidden"
                                                            aria-checked="false" aria-label="Twitter Account">
                                                    </div>
                                                    <div class="inpLnkTwitter">
                                                        <input type="text" name="twitterLink" id="twitterLink"
                                                            class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
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
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="tiktok-active"
                                                                class="text-sm md:text-base">Tiktok</label>
                                                            <label for="tiktok-active"
                                                                class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all"
                                                                    style="">
                                                                    <span
                                                                        class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="tiktok-active"
                                                            id="tiktok-active" value="" class="checkboxActiveLink hidden"
                                                            aria-checked="false" aria-label="Tiktok Account">
                                                    </div>
                                                    <div class="inpLnkTiktok">
                                                        <input type="text" name="tiktokLink" id="tiktokLink"
                                                            class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
                                                            aria-label="Tiktok Link">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="link-item" role="listitem">
                                        <div class="overflow-hidden">
                                            <div class="cntnItem flex items-center gap-4">
                                                <i class="bi bi-youtube text-2xl md:text-3xl" aria-hidden="true"></i>
                                                <div class="desc-link leading-4 space-y-2 w-full">
                                                    <div class="lnkActive-rNot">
                                                        <div class="thLabels flex items-center gap-2">
                                                            <label for="youtube-active"
                                                                class="text-sm md:text-base">Youtube</label>
                                                            <label for="youtube-active"
                                                                class="text-sm md:text-base">
                                                                <div class="border bg-gray-200 rounded-lg w-14 h-6 relative  transition-all"
                                                                    style="">
                                                                    <span
                                                                        class="roundActive absolute rounded-[100%] w-6 h-6 border-2 border-gray-500 bg-gray-300 top-1/2 -translate-y-1/2 transition-all"
                                                                        style="left:0; transform: translate(0, -50%)"></span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <input type="checkbox" name="youtube-active" id="youtube-active" value="" class="checkboxActiveLink hidden" aria-checked="false" aria-label="Youtube Account">
                                                    </div>
                                                    <div class="inpLnkYoutube">
                                                        <input type="text" name="youtubeLink" id="youtubeLink"
                                                            class="rounded-md outline-none px-2 py-1 w-full text-xs underline text-black transition-all hidden opacity-0"
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
                </div>
                <button type="submit" class="block border border-black py-2 px-12 rounded-xl mx-auto hover:bg-blue-400"> Simpan </button>
            </form>
        </div>
    </section>
    {{-- <div id="confInpExcForm" class="flex flex-col justify-center items-center gap-[10%] fixed text-center overflow-hidden z-50 p-6 w-full h-full lg:w-1/3 lg:h-1/3 bg-white border border-black rounded-3xl aspect-square" style="top: 200%; left:50%; transform:translate(-50%, -50%); visibility: hidden; opacity: 0; transition: all .3s ease-in-out">
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
    </div> --}}
@endsection
@section('custom-script')
    <script src="{{asset('assets/js/students/student.js')}}"></script>
    <script src="{{asset('assets/js/students/studentForm.js')}}"></script>
    {{-- <script src="assets/js/students/formsInpExcel.js"></script>
    <script src="assets/js/students/grouplist.js"></script>
    <script src="assets/js/students/formsAdd.js"></script> --}}
@endsection
