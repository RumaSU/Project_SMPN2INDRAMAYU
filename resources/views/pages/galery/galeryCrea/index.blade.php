@extends('pages.galery.main')
@section('link-rel')
    @parent
    
@endsection
@section('galery-contents')
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
@endsection
@section('custom-script')
    @parent
@endsection