<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="assets/bootstrap-icons/bootstrap-icons.min.css">
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
    
    <div id="imagePopup" class="fixed overflow-hidden z-50 p-6 w-full lg:w-[80%] h-[80%] bg-white border border-black rounded-3xl aspect-square" style="top: 200%; left:50%; transform:translate(-50%, -50%); visibility: hidden; opacity: 0; transition: all .3s ease-in-out">
        <div class="button-closeEdit flex gap-4 text-xl md:text-2xl absolute py-1 px-4 rounded-xl z-10 right-[2%] top-[5%] -translate-x-[2%] -translate-y-[5%]">
            <div class="editB">
                <i class="bi bi-pencil-fill p-2 text-black bg-white border border-black rounded-xl cursor-pointer"></i>
            </div>
            <div class="close-btn" onclick="closePopup()">
                <i class="bi bi-x-circle-fill p-2 text-red-600 bg-white border border-black rounded-xl cursor-pointer" onclick="closePopup()"></i>
            </div>
        </div>
        <img src="" alt="" id="popupImage" class="w-full h-full object-cover object-center rounded-xl">
    </div>
    <div id="overlayPopUp" class="overlayPopUp hidden w-full h-full bg-black/30 fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-40"></div>
    
    <script src="assets/js/main/nav.js"></script>
    <script src="assets/js/main/popImage.js"></script>
    @yield('custom-script')
</body>
</html>