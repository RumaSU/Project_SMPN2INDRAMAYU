<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="assets/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="icon" href="assets/img/main/example-image.jpg" type="image/x-icon">
    <title>@yield('title')</title>
    @yield('link-rel')
</head>
<body>
    <header>
        @include('layouts.main.header')
    </header>
    <nav>
        @include('layouts.main.nav')
    </nav>
    <main>
        @yield('content')
    </main>
    {{-- <footer class="mt-10">
        @include('layouts.main.footer')
    </footer> --}}
    
    {{-- <div id="imagePopup" class="fixed overflow-hidden z-50 w-[80%] h-[80%] bg-white rounded-md group" style="top: 200%; left:50%; transform:translate(-50%, -50%); visibility: hidden; opacity: 0; transition: all .3s ease-in-out"> --}}
    <div id="imagePopup" class="fixed overflow-hidden z-50 w-full h-full md:w-[80%] md:h-[80%] bg-white rounded-md group" style="top: 200%; left:50%; transform:translate(-50%, -50%); visibility: hidden; opacity: 0; transition: all .3s ease-in-out">
        <div class="theDetailImagePopUp select-none">
            <div class="thTiImgPopup bg-white/[85%] absolute flex items-center w-full py-4 px-8 shadow-sm shadow-black -top-full left-0 -translate-x-0 -translate-y-0 transition-all group-hover:-top-0">
                <div class="lTDetails w-full">
                    <div class="TimgPopUp flex items-center">
                        <h2 class="text-xl tracking-tighter font-bold pr-4 border-r border-black">Judul Gambar</h2>
                        <a href="" class="seeFullImage pl-4 text-xs text-blue-700">See Full Image</a>
                    </div>
                    <div class="postByImgPopup">
                        <div class="iconUserBy flex items-center gap-3">
                            <i class="bi bi-person-circle text-lg"></i>
                            <p class="text-sm">Posted by <a href="" class="text-blue-700" >@{{Person}}</a> in  <a href="" class="text-blue-700" >@{{Where post}}</a> </p>
                        </div>
                    </div>
                </div>
                <div class="button-closeEdit flex items-center gap-4 text-xl rounded-xl text-black">
                    <div class="editB">
                        <a href="" class="flex items-center px-1 font-bold rounded-md hover:text-blue-700">
                            <i class="bi bi-pencil-fill rounded-xl cursor-pointer"></i>
                            <p class="text-sm px-2">Edit</p>
                        </a>
                    </div>
                    <div class="close-btn" onclick="closePopup()">
                        <i class="bi bi-x text-5xl rounded-xl cursor-pointer hover:opacity-50" onclick="closePopup()"></i>
                    </div>
                </div>
            </div>
            {{-- <div class="tgFooImgPopup absolute w-full py-2 px-8 shadow-sm shadow-black border border-black bottom-0 left-0 -translate-x-0 -translate-y-0">
                <div class="buLRImgPopup">

                </div>
                <h1>Test</h1>
            </div> --}}
        </div>
        <div class="bNrBImagePopup text-4xl">
            <div class="btnChvLeft absolute transition-all -left-full top-1/2 -translate-x-0 -translate-y-1/2 group-hover:left-4">
                <i class="bi bi-chevron-left py-4 px-1 cursor-pointer relative after:absolute after:w-full after:h-full after:rounded-xl after:blur-sm after:top-0 after:left-0 after:hover:border-2 after:hover:border-sky-500 after:transition-all"></i>
            </div>
            <div class="btnChvRight absolute transition-all -right-full top-1/2 -translate-x-0 -translate-y-1/2 group-hover:right-4">
                <i class="bi bi-chevron-right py-4 px-1 cursor-pointer relative after:absolute after:w-full after:h-full after:rounded-xl after:blur-sm after:top-0 after:left-0 after:hover:border-2 after:hover:border-sky-500 after:transition-all"></i>
            </div>
        </div>
        <div class="mIPopup w-[90%] md:w-[70%] h-full mx-auto">
            <img src="" alt="" id="popupImage" class="w-full h-full object-contain m-auto">
        </div>
    </div>
    <div id="overlayPopUp" class="overlayPopUp hidden w-full h-full fixed left-1/2 top-1/2 bg-black/30 -translate-x-1/2 -translate-y-1/2 z-40"></div>
    
    <script src="assets/js/main/nav.js"></script>
    <script src="assets/js/main/popImage.js"></script>
    @yield('custom-script')
</body>
</html>