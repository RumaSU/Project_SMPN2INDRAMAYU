@extends('pages.galery.main')
@section('link-rel')
    @parent
    
@endsection
@section('galery-contents')
    <section class="sectionGalery" id="secGalAchie">
        <hr class="mt-6 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
        <div class="mt-8">
            <div class="galAchie w-11/12 mx-auto">
                <div class="cntnGalAchie">
                    <div class="tlCat-galAchie flex flex-col gap-2 lg:flex-row lg:justify-between lg:items-center">
                        <div class="tlGal w-fit rounded-xl font-bold text-lg lg:text-3xl">
                            <h2>PRESTASI</h2>
                        </div>
                        <div class="hrefNInpImg flex items-center gap-2">
                            <div class="inpImgGal">
                                <div class="thBtnsAdd">
                                    <span role="button" class="actCat-gal flex p-2 lg:px-6 lg:py-1 items-center space-x-2 cursor-pointer hover:bg-gray-200 border border-black rounded-lg lg:text-xl" id="btnAddImgGal" onclick="opnFormGals()"> 
                                        <i class="icAddGal bi bi-plus-circle"></i>
                                        <p>Tambah</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-items mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-2 sm:gap-5">
                        @for ($i=1; $i <= 9; $i++)
                            <div class="items-students">
                                <div class="cntn-item relative">
                                    <div class="hvOvQesMa">
                                        <span role="button" id="shSumInfoEks" href="" class="cursor-pointer flex items-center bg-white p-1 rounded-xl aspect-square overflow-hidden absolute z-10 -right-[5%] -top-[5%] translate-x-[5%] translate-y-[5%]" onclick="opnSumGals()">
                                            <i class="bi bi-question-circle text-2xl"></i>
                                        </span>
                                    </div>
                                    <div class="imgCont aspect-square bg-white regular-shadow rounded-md sm:rounded-xl lg:rounded-2xl overflow-hidden w-full h-full group relative">
                                        <div class="button-editDel hidden md:flex items-center gap-1 absolute bg-black/40 py-1 px-4 rounded-xl z-10 -right-full top-[5%] -translate-x-[5%] translate-y-full transition-all group-hover:right-[5%] group-hover:translate-x-[5%] group-hover:top-[5%] group-hover:translate-y-[5%]">
                                            <span role="button" class="editB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 w-fit" title="Edit this" aria-label="Edit this" onclick="opnFormGals()">
                                                <i class="bi bi-pencil"></i>
                                            </span>
                                            <span role="button" class="delB border border-black bg-white p-2 rounded-lg hover:bg-gray-200 w-fit" title="Delete this" aria-label="Delete this">
                                                <i class="bi bi-trash3"></i>
                                            </span>
                                        </div>
                                        <img src="{{asset('assets/img/dumb/imgtemp '. $i .'.jpg')}}" alt="" class="supImg w-full h-full object-cover object-center" onclick="openPopup(this.src)" style="user-drag: none; -webkit-user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-select: none;  -ms-user-select: none;">
                                        <a href="" class="lg:w-3/4 lg:py-2 bg-blue-400 rounded-xl z-10 lg:absolute lg:-bottom-full lg:left-1/2 lg:translate-y-full lg:-translate-x-1/2 lg:transition-all lg:group-hover:bottom-[5%] lg:group-hover:-translate-y-[5%] lg:hover:bg-cyan-500 cursor-pointer">
                                            <p class="itemClass text-white text-center font-bold">
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
        </div>
    </section>
@endsection
@section('custom-script')
    @parent
@endsection