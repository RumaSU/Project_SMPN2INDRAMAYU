@extends('pages.galery.main')
@section('link-rel')
    @parent
    
@endsection
@section('galery-contents')
    <section class="sectionGalery transition-opacity duration-500" id="secGalAct">
        <hr class="mt-6 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
        <div class="mt-8">
            <div class="galAct w-11/12 mx-auto">
                <div class="cntnGalAct">
                    <div class="tlCat-galAct flex flex-col lg:flex-row gap-2 lg:justify-between lg:items-center">
                        <div class="tlGal w-fit rounded-xl font-bold text-lg lg:text-3xl">
                            <h2>KEGIATAN</h2>
                        </div>
                        <div class="hrefNInpImg flex items-center gap-2">
                            <div class="hrefToAnother">
                                <div class="cnHref">
                                    <a href="/galeri/kegiatan">
                                        <div class="tx flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl">
                                            <i class="bi bi-search"></i>
                                            <p class="hidden lg:block">Lainnya</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="inpImgGal">
                                <div class="thBtnsAdd">
                                    <span role="button" class="actCat-gal flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl" id="btnAddImgGal" onclick="showPopUpForm(this);"> 
                                        <i class="icAddGal bi bi-plus-circle"></i>
                                        <p>Tambah</p>
                                    </span>
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
    <section class="sectionGalery transition-opacity duration-500 opacity-0 hidden" id="secGalInsfra">
        <hr class="mt-6 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
        <div class="mt-8">
            <div class="galInsfra w-11/12 mx-auto">
                <div class="cntnGakInsfra">
                    <div class="tlCat-galInsfra flex flex-col lg:flex-row gap-2 lg:justify-between lg:items-center">
                        <div class="tlGal w-fit rounded-xl font-bold text-lg lg:text-3xl">
                            <h2>SARPRAS</h2>
                        </div>
                        <div class="hrefNInpImg flex items-center gap-2">
                            <div class="hrefToAnother">
                                <div class="cnHref">
                                    <a href="/galeri/sarpras">
                                        <div class="tx flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl">
                                            <i class="bi bi-search"></i>
                                            <p class="hidden lg:block">Lainnya</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="inpImgGal">
                                <div class="thBtnsAdd">
                                    <span role="button" class="actCat-gal flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl" id="btnAddImgGal" onclick="showPopUpForm(this);"> 
                                        <i class="icAddGal bi bi-plus-circle"></i>
                                        <p>Tambah</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-items mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5">
                        @for ($i=1; $i <= 9; $i++)
                            @if ($i < 9)
                                <div class="items-students">
                                    <div class="cntn-item relative" title="Ini sarpras {{$i}}">
                                        <div class="imgCont aspect-square bg-white regular-shadow rounded-md sm:rounded-xl lg:rounded-2xl overflow-hidden w-full h-full group relative">
                                            <div class="button-editDel hidden md:block absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                                <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </div>
                                            <img src="{{asset('assets/img/dumb/imgtemp '. $i .'.jpg')}}" alt="" class="supImg w-full h-full object-cover object-center" onclick="openPopup(this.src)" style="user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none;  -ms-user-select: none;">
                                            <div class="lg:w-3/4 lg:py-2 bg-blue-400 rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] lg:hover:bg-cyan-500 cursor-default">
                                                <p class="itemClass text-white text-center font-bold ">
                                                    Test
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="items-students hidden md:block">
                                    <div class="cntn-item relative" title="Ini sarpras {{$i}}">
                                        <div class="imgCont aspect-square bg-white regular-shadow rounded-md sm:rounded-xl lg:rounded-2xl overflow-hidden w-full h-full group relative">
                                            <div class="button-editDel hidden md:block absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                                <button class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </div>
                                            <img src="{{asset('assets/img/dumb/imgtemp '. $i .'.jpg')}}" alt="" class="supImg w-full h-full object-cover object-center" onclick="openPopup(this.src)" style="user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none;  -ms-user-select: none;">
                                            <div class="lg:w-3/4 lg:py-2 bg-blue-400 rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] lg:hover:bg-cyan-500 cursor-default">
                                                <p class="itemClass text-white text-center font-bold ">
                                                    Test
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                        <div class="gotoAnotherInsfraGal group bg-white regular-shadow border rounded-2xl overflow-hidden relative hover:bg-gray-500/25 max-h-full hidden lg:block" style="grid-column: span 3; grid-row-end: span;">
                            <div class="hrefTo-full">
                                <a href="/galeri/sarpras" class="block w-full h-full inset-0 absolute">
                                    <div class="txt flex justify-center items-center h-full">
                                        <p class="text-2xl">Lainnya</p>                                
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="gotoAnotherInsfraGal group bg-white regular-shadow border rounded-2xl overflow-hidden relative hover:bg-gray-500/25 h-36 mt-8 block lg:hidden">
                        <div class="hrefTo-full">
                            <a href="/galeri/sarpras" class="block w-full h-full inset-0 absolute">
                                <div class="txt flex justify-center items-center h-full">
                                    <p class="text-2xl">Lainnya</p>                                
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sectionGalery transition-opacity duration-500 opacity-0 hidden" id="secGalAchie">
        <hr class="mt-6 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
        <div class="mt-8">
            <div class="galAchie w-11/12 mx-auto">
                <div class="cntnGalAchie">
                    <div class="tlCat-galAchie flex flex-col gap-2 lg:flex-row lg:justify-between lg:items-center">
                        <div class="tlGal w-fit rounded-xl font-bold text-lg lg:text-3xl">
                            <h2>PRESTASI</h2>
                        </div>
                        <div class="hrefNInpImg flex items-center gap-2">
                            <div class="hrefToAnother">
                                <div class="cnHref">
                                    <a href="/galeri/prestasi" role="link">
                                        <div class="tx flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl">
                                            <i class="bi bi-search"></i>
                                            <p class="hidden lg:block">Lainnya</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="inpImgGal">
                                <div class="thBtnsAdd">
                                    <span role="button" class="actCat-gal flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl" id="btnAddImgGal" onclick="opnFormGals()"> 
                                        <i class="icAddGal bi bi-plus-circle"></i>
                                        <p>Tambah</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-items mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5">
                        @for ($i=1; $i <= 9; $i++)
                            @if ($i < 9)
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
                                            <img src="{{asset('assets/img/dumb/imgtemp '. $i .'.jpg')}}" alt="" class="supImg w-full h-full object-cover object-center" onclick="openPopup(this.src)" style="user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none;  -ms-user-select: none;">
                                            <a href="" class="lg:w-3/4 lg:py-2 bg-blue-400 rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] lg:hover:bg-cyan-500 cursor-pointer">
                                                <p class="itemClass text-white text-center font-bold ">
                                                    Test
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="items-students hidden md:block">
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
                                            <img src="{{asset('assets/img/dumb/imgtemp '. $i .'.jpg')}}" alt="" class="supImg w-full h-full object-cover object-center" onclick="openPopup(this.src)" style="user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none;  -ms-user-select: none;">
                                            <a href="" class="lg:w-3/4 lg:py-2 bg-blue-400 rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] lg:hover:bg-cyan-500 cursor-pointer">
                                                <p class="itemClass text-white text-center font-bold ">
                                                    Test
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                        <div class="gotoAnotherInsfraGal group bg-white regular-shadow border rounded-2xl overflow-hidden relative hover:bg-gray-500/25 max-h-full hidden lg:block" style="grid-column: span 3; grid-row-end: span;">
                            <div class="hrefTo-full">
                                <a href="/galeri/prestasi" class="block w-full h-full inset-0 absolute">
                                    <div class="txt flex justify-center items-center h-full">
                                        <p class="text-2xl">Lainnya</p>                                
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="gotoAnotherInsfraGal group bg-white regular-shadow border rounded-2xl overflow-hidden relative hover:bg-gray-500/25 h-36 mt-8 block lg:hidden">
                        <div class="hrefTo-full">
                            <a href="/galeri/prestasi" class="block w-full h-full inset-0 absolute">
                                <div class="txt flex justify-center items-center h-full">
                                    <p class="text-2xl">Lainnya</p>                                
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <section class="sectionGalery transition-opacity duration-500 opacity-0 hidden" id="secGalCrea">
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
                                    <span role="button" class="actCat-gal flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl" id="btnAddImgGal" onclick="showPopUpForm(this);"> 
                                        <i class="icAddGal bi bi-plus-circle"></i>
                                        <p>Tambah</p>
                                    </span>
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
@endsection
@section('custom-script')
    @parent
    <script src="{{asset('assets/js/galeri/chsActiveGal.js')}}"></script>        
@endsection