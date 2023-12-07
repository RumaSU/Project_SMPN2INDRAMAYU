@extends('layouts.main.main')
@section('link-rel')

@endsection
@section('content')
    <section class="newsArticle mt-12 w-full">
        <div class="cntnListNStikyNews px-6 xl:px-0 xl:w-3/4 md:mx-auto md:flex md:gap-12">
            <div class="articleNewsContents">
                <article class="articleNewsOpens">
                    <div class="contentsNews">
                        <section class="topArticleNews">
                            <div class="aboutThisArtc">
                                <div class="cnAbtThis">
                                    <div class="titleArticleNews">
                                        <div class="t">
                                            <h2 class="text-5xl font-bold">Title News</h2>
                                        </div>
                                    </div>
                                    <div class="lstTagsArticleNews flex items-center gap-2 text-sm mt-2">
                                        @for ($i=0; $i<5; $i++)
                                            <div class="listTagItems">
                                                <div class="contentTagItems">
                                                    <div class="t">
                                                        <a href="">
                                                            <p>This it tags</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-2 border-black rounded-[100%]"></div>
                                        @endfor
                                    </div>
                                    <div class="authorNews mt-4">
                                        <div class="cntn">
                                            <div class="t">
                                                <a href="" class="flex items-center gap-2 w-fit">
                                                    <i class="bi bi-person"></i>
                                                    <p>Author News</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mainImgNews">
                                <div class="imgMain aspect-video">
                                    <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="w-full h-full object-cover object-center">
                                </div>
                            </div>
                            <div class="timestampThisArticleNews">
                                <div class="timeDateCreateNews text-end">
                                    <div class="t">
                                        <i class="bi bi-clock-history"></i>
                                        <time class="text-sm" >21 Desember 2023</time>                                        
                                    </div>
                                </div>
                            </div>
                        </section>
                        @for ($i=0; $i<5; $i++)
                            <section class="sectionPrghContentNews{{$i}} my-2">
                                @if ($i == 3)
                                    <div class="optionalImagesPrghContentNews{{$i}}">
                                        <div class="imgPrghContentNews">
                                            <div class="img aspect-video w-1/2">
                                                <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="w-full h-full object-cover object-center">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="prghContentNews">
                                        <div class="areaTextContent">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac molestie nibh. Curabitur efficitur eu quam sed tincidunt. Proin id erat fermentum, vehicula est at, pulvinar enim. Fusce aliquet commodo eros viverra cursus. Curabitur non mauris nibh. Vestibulum eget vehicula odio. Curabitur tristique leo in elit pretium gravida. Aliquam at arcu nunc. Suspendisse potenti. Pellentesque eu massa sed est malesuada tempus eget eu nibh. Sed porttitor, sem et sollicitudin feugiat, risus eros pellentesque nulla, non eleifend elit odio auctor lorem. Nulla non eleifend magna.
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </section>
                        @endfor
                        <hr class="mt-6 mx-auto border-[1.5px] border-black/40 rounded-2xl">
                        <section class="authorThisArticles">
                            <div class="contnAuthorArtc p-8">
                                <div class="authorProfile flex items-center gap-2">
                                    <div class="imgAuthorProfile">
                                        <div class="img aspect-square w-24 rounded-[100%]">
                                            <img src="{{asset('assets/img/dumb/imgtemp 4.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-[100%]">
                                        </div>
                                    </div>
                                    <div class="aboutAuthorProfile leading-3">
                                        <div class="nameAuthor">
                                            <div class="t">
                                                <a href="">
                                                    <p class="text-2xl">Nama authornya</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="nisRNipAuthor">
                                            <div class="t">
                                                <p class="text-sm">This is nip author</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </article>
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
        <div class="anotherNews mt-12">
            <div class="listContentsNews w-11/12 lg:w-3/4 mx-auto">
                <div class="headerListNews bg-white">
                    <div class="txt">
                        <h2 class="text-2xl font-semibold">Berita Lainnya</h2>
                    </div>
                </div>
                <hr class="mt-6 mx-auto border-[1.5px] border-black/40 rounded-2xl">
                <div class="listContensts">
                    <div class="listNews space-y-1 mt-2 grid grid-cols-2 md:grid-cols-4 md:gap-6 xl:gap-12">
                        @for ($i=1; $i<=8; $i++)
                            <div class="newsItems">
                                <div class="contentsItems-news p-1 rounded-md">
                                    <div class="imgNewsItems aspect-square flex-shrink-0">
                                        <img src="{{asset('assets/img/dumb/imgtemp ' . $i . '.jpg')}}" alt="" class="w-full h-full object-cover object-center rounded-lg">
                                    </div>
                                    <div class="contentsItems w-full">
                                        <div class="titleLineNews">
                                            <a href="" class="h-18">
                                                <h3 class="md:text-lg font-semibold  line-clamp-3 leading-5">
                                                    Tittle News Tittle News Tittle News Tittle News Tittle News
                                                    Tittle News Tittle News Tittle News Tittle News Tittle News
                                                </h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="foo mb-96"></div>
@endsection
@section('custom-script')

@endsection