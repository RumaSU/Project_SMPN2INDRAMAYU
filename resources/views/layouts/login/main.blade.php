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
        @include('layouts.login.header')
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="mt-10">
        @include('layouts.login.footer')
    </footer>
    
    <script src="assets/js/main/nav.js"></script>
    @yield('custom-script')
</body>
</html>