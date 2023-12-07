@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="">
        <div class="headerTopNews p-6">
            <div class="leftRightContents-News flex justify-center items-center flex-wrap gap-3">
                <div class="mainNew lg:p-10 lg:rounded-md lg:shadow-md lg:shadow-black h-fit">
                    <div class="mainNews-Contents xl:w-[50rem] xl:h-[40rem]">
                        <div class="imgDateAuthor-news block">
                            <div class="topImgNews">
                                <div class="imgNews aspect-video">
                                    <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="w-full h-full object-cover object-center">
                                </div>
                            </div>
                            <div class="dateAuthor-news mt-2 flex flex-col md:flex-row justify-between md:items-center text-xs opacity-50 select-none">
                                <div class="date-timeNews flex items-center gap-1">
                                    <div class="dateNews">
                                        <div class="t">
                                            <p>21 Januari 2023</p>
                                        </div>
                                    </div>
                                    <div class="dvdIconDots">
                                        <i class="bi bi-dot"></i>
                                    </div>
                                    <div class="timeNews">
                                        <div class="t">
                                            <p>14:03:06</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="authorNews">
                                    <div class="t">
                                        <a href="">
                                            <p>Author News</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mainContentsNews">
                            <div class="topTitleMains-news mt-3">
                                <div class="title-TagsNews">
                                    <div class="titleNews">
                                        <div class="t">
                                            <a href="/berita/testing" class="w-fit block">
                                                <h2 class="text-3xl font-bold">Judul Berita</h2>                                                
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tagsNews">
                                        <div class="listTagsNews flex items-center flex-wrap gap-1">
                                            @for ($i=0; $i<4; $i++)
                                                <div class="tagsItems">
                                                    <a href="" role="link" class="block @if ($i==0) pr-2 @else px-2 @endif rounded-md text-sm underline cursor-default select-none">
                                                        <div class="t">
                                                            <p>Tag 1</p>
                                                        </div>
                                                    </a>
                                                </div>
                                                @if ($i < 3)
                                                    <span class="d relative block border-2 border-black rounded-[100%]"></span>                                                
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="textContentsNews">
                                <div class="textContents mt-2">
                                    <div class="t">
                                        <p class="line-clamp-6 leading-5">
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                            ini adalah isi berita yang memiliki maksimal 6 baris saja
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listContentsNews hidden xl:block p-4 xl:rounded-md xl:shadow-md xl:shadow-black">
                    <div class="listContensts w-96 h-[45rem] overflow-y-scroll relative">
                        <div class="headerListNews sticky top-0 bg-white py-4">
                            <div class="txt">
                                <h2 class="text-xl font-semibold">Berita Lainnya</h2>
                            </div>
                        </div>
                        <div class="listNews space-y-1 mt-2">
                            @for ($i=1; $i<=10; $i++)
                                <div class="newsItems">
                                    <div class="contentsItems-news flex items-center gap-1 p-1 rounded-md">
                                        <div class="imgNewsItems aspect-square w-24 flex-shrink-0">
                                            <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-lg">
                                        </div>
                                        <div class="contentsItems w-full">
                                            <div class="titleLineNews">
                                                <a href="" class="h-18">
                                                    <h3 class="text-lg font-semibold  line-clamp-3 leading-5">
                                                        Tittle News
                                                        Tittle News
                                                        Tittle News
                                                        Tittle News
                                                        Tittle News
                                                        Tittle News
                                                        Tittle News
                                                        Tittle News
                                                        Tittle News
                                                        Tittle News
                                                    </h3>
                                                </a>
                                            </div>
                                            <div class="tagsNDatetime flex items-center gap-1 text-xs opacity-50 mt-2">
                                                <div class="primaryTagsNews">
                                                    <div class="t">
                                                        <a href="">
                                                            <p>This is tags</p>
                                                        </a> 
                                                    </div>
                                                </div>
                                                <span class="border-2 border-black rounded-[100%]"></span>
                                                <div class="dataTimeNews">
                                                    <div class="t">
                                                        <p>This is Times</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="hedrNewsUpdate mt-12">
        <div class="t w-10/12 lg:px-6 mx-auto text-xl lg:text-4xl font-bold">
            <h2>Berita Terbaru</h2>
        </div>
    </div>
    <hr class="mt-6 mx-auto w-10/12 border-[1.5px] border-black/40 rounded-2xl">
    <section class="newsUpdate mt-12 w-full">
        <div class="cntnListNStikyNews px-6 xl:px-0 xl:w-3/4 md:mx-auto md:flex md:gap-2">
            <div class="newsContentsPgnt10">
                <div class="listNewsPgnt space-y-2">
                    @for ($i=1; $i<10; $i++)
                        <article class="newsItems">
                            <div class="contentArticleNews">
                                <div class="contentsItems-news flex flex-col md:flex-row md:items-center gap-1 p-1 md:h-36 rounded-md">
                                    <div class="imgNewsItems aspect-video h-32 flex-shrink-0">
                                        <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-lg">
                                    </div>
                                    <div class="contentsItems">
                                        <div class="titleLineNews">
                                            <a href="">
                                                <h3 class="text-xl font-semibold">Tittle News</h3>
                                            </a>
                                        </div>
                                        <div class="textLineNews h-20 w-full">
                                            <p class="text-sm line-clamp-3">
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                            </p>
                                        </div>
                                        <div class="tagsNDatetime flex items-center gap-1 text-xs opacity-50">
                                            <div class="primaryTagsNews">
                                                <div class="t">
                                                    <a href="">
                                                        <p>This is tags</p>
                                                    </a> 
                                                </div>
                                            </div>
                                            <span class="border-2 border-black rounded-[100%]"></span>
                                            <div class="dataTimeNews">
                                                <div class="t">
                                                    <time datetime="">This is Times</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </article>
                    @endfor
                    @for ($i=1; $i<10; $i++)
                        <article class="newsItems">
                            <div class="contentArticleNews">
                                <div class="contentsItems-news flex flex-col md:flex-row md:items-center gap-1 p-1 md:h-36 rounded-md">
                                    <div class="imgNewsItems aspect-video h-32 flex-shrink-0">
                                        <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-lg">
                                    </div>
                                    <div class="contentsItems">
                                        <div class="titleLineNews">
                                            <a href="">
                                                <h3 class="text-xl font-semibold">Tittle News</h3>
                                            </a>
                                        </div>
                                        <div class="textLineNews h-20 w-full">
                                            <p class="text-sm line-clamp-3">
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                            </p>
                                        </div>
                                        <div class="tagsNDatetime flex items-center gap-1 text-xs opacity-50">
                                            <div class="primaryTagsNews">
                                                <div class="t">
                                                    <a href="">
                                                        <p>This is tags</p>
                                                    </a> 
                                                </div>
                                            </div>
                                            <span class="border-2 border-black rounded-[100%]"></span>
                                            <div class="dataTimeNews">
                                                <div class="t">
                                                    <time datetime="">This is Times</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </article>
                    @endfor
                    @for ($i=1; $i<10; $i++)
                        <article class="newsItems">
                            <div class="contentArticleNews">
                                <div class="contentsItems-news flex flex-col md:flex-row md:items-center gap-1 p-1 md:h-36 rounded-md">
                                    <div class="imgNewsItems aspect-video h-32 flex-shrink-0">
                                        <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-lg">
                                    </div>
                                    <div class="contentsItems">
                                        <div class="titleLineNews">
                                            <a href="">
                                                <h3 class="text-xl font-semibold">Tittle News</h3>
                                            </a>
                                        </div>
                                        <div class="textLineNews h-20 w-full">
                                            <p class="text-sm line-clamp-3">
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                                This is text items in news This is text items in news This is text items in news This is text items in news
                                            </p>
                                        </div>
                                        <div class="tagsNDatetime flex items-center gap-1 text-xs opacity-50">
                                            <div class="primaryTagsNews">
                                                <div class="t">
                                                    <a href="">
                                                        <p>This is tags</p>
                                                    </a> 
                                                </div>
                                            </div>
                                            <span class="border-2 border-black rounded-[100%]"></span>
                                            <div class="dataTimeNews">
                                                <div class="t">
                                                    <time datetime="">This is Times</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </article>
                    @endfor
                </div>
            </div>
            <div class="rgPgnt relative hidden md:block">
                <div class="thsBrdStickyNews w-60 xl:w-80 2xl:w-96 flex-shrink-0 block sticky top-0">
                    <div class="newsFlash">
                        <div class="headerListNewsFlash">
                            <div class="txt">
                                <h2 class="text-xl font-semibold">Kilas Berita</h2>
                            </div>
                        </div>
                        <div class="contnListNewsFlash block lg:mt-6 space-y-1">
                            @for ($i=1; $i<3; $i++)
                                @if ($i<2)
                                    <div class="newsFlashItems">
                                        <a href="" class="hover:bg-gray-200 block p-2 rounded-xl">
                                            <div class="contentsItems-news p-1 rounded-md">
                                                <div class="imgNewsItems aspect-video flex-shrink-0">
                                                    <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-lg">
                                                </div>
                                                <div class="contentsItems">
                                                    <div class="titleLineNews">
                                                        <div class="t">
                                                            <h3 class="text-xl font-semibold">Tittle News</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <div class="newsItems">
                                        <div class="contentsItems-news rounded-md">
                                            <div class="contentsItems">
                                                <div class="titleLineNews">
                                                    <a href="" class="min-h-[6rem] xl:p-2 rounded-xl block hover:bg-gray-50">
                                                        <h3 class="text-lg xl:text-xl font-semibold line-clamp-3">
                                                            Tittle News
                                                            Tittle News
                                                            Tittle News
                                                            Tittle News
                                                            Tittle News
                                                            Tittle News
                                                            Tittle News
                                                            Tittle News
                                                            Tittle News
                                                            Tittle News
                                                        </h3>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <hr class="border-[1.5px] border-black/40 rounded-2xl">
                            @endfor
                        </div>
                    </div>
                    <div class="anotherNews mt-6 lg:mt-12">
                        <div class="headerListAnotherNews">
                            <div class="txt">
                                <h2 class="text-xl font-semibold">Berita Lainnya</h2>
                            </div>
                        </div>
                        <div class="contnListAnotherNews grid grid-cols-2 gap-2 lg:mt-6">
                            @for ($i=1; $i<7; $i++)
                                <div class="newsItems">
                                    <a href="" class="contentsItems-news rounded-md relative overflow-hidden">
                                        <div class="cntnNews">
                                            <div class="imgNewsItems aspect-video">
                                                <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-lg">
                                            </div>
                                            <div class="contentsItems absolute left-1/2 bottom-2 -translate-x-1/2 -translate-y-0 bg-slate-100/50 w-full text-center">
                                                <div class="primaryTagsNews">
                                                    <div class="t">
                                                        <p>
                                                            <p>This is tags</p>
                                                        </p> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="anotherNews w-fit mx-auto mt-20 px-2">
            <div class="listIndxNews flex flex-wrap items-center justify-center gap-2">
                @for ($i=1; $i<=10; $i++)
                    <div class="indxNews">
                        <a href="" class="block border border-black p-2 rounded-lg">
                            <div class="t">
                                <p>{{$i}}</p>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    <section>
        <div class="galRefrehsNews">
            <hr class="mt-6 mx-auto w-3/4 border-[1.5px] border-black/40 rounded-2xl">
            <div class="mt-8">
                <div class="galAct w-11/12 mx-auto">
                    <div class="cntnGalAct">
                        <div class="tlCat-galAct">
                            <div class="tlGal w-fit rounded-xl font-bold text-lg lg:text-3xl">
                                <h2>Galeri Pilihan</h2>
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
        </div>
    </section>
    <div class="foo mb-96"></div>
@endsection
@section('custom-script')

@endsection