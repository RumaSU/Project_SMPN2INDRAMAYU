<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Testing</title>
</head>
<body>
    <div id="slider" class="overflow-hidden my-0 mx-auto border border-black mt-32 w-3/4 relative p-4">
        <figure class="flex w-[500%] h-96 m-0 duration-1000 overflow-hidden">
            <a href="" class="w-full object-cover object-center flex-shrink-0 transition-all" style="transform: translateX(-100%);"></a>
            <a href="" class="w-full object-cover object-center flex-shrink-0 transition-all" style="transform: translateX(-100%);">
                <img src="{{asset('assets/img/dumb/imgtemp 1.jpg')}}" alt="" class="w-full h-full object-cover object-center aspect-video">
            </a>
            <a href="" class="w-full object-cover object-center flex-shrink-0 transition-all">
                <img src="{{asset('assets/img/dumb/imgtemp 2.jpg')}}" alt="" class="w-full h-full object-cover object-center aspect-video">
            </a>
            <a href="" class="w-full object-cover object-center flex-shrink-0 transition-all">
                <img src="{{asset('assets/img/dumb/imgtemp 3.jpg')}}" alt="" class="w-full h-full object-cover object-center aspect-video">
            </a>
            <a href="" class="w-full object-cover object-center flex-shrink-0 transition-all">
                <img src="{{asset('assets/img/dumb/imgtemp 4.jpg')}}" alt="" class="w-full h-full object-cover object-center aspect-video">
            </a>
            <a href="" class="w-full object-cover object-center flex-shrink-0 transition-all">
                <img src="{{asset('assets/img/dumb/imgtemp 5.jpg')}}" alt="" class="w-full h-full object-cover object-center aspect-video">
            </a>
        </figure>
    </div>
    <script>
        let positions = [0, 0, 0, 0, 0, 0]; // Daftar posisi untuk setiap gambar
        const images = document.querySelectorAll("#slider figure a");

        const interval = setInterval(() => {
            positions = positions.map((pos, index) => {
                const newPosition = pos + 100;
                if (newPosition >= 600) {
                    return 0;
                }
                images[index].style.transform = `translateX(-${newPosition}%)`;
                return newPosition;
            });
        }, 2000); // Ubah nilai ini untuk mengatur interval perpindahan gambar

    </script>
</body>
</html>