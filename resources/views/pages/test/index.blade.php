{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Chart</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    <canvas id="myChart" class="w-16 h-9"></canvas>
    
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {!! json_encode($chartData) !!},
        });
    </script>
</body>
</html> --}}

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
    <div class="gallery mx-auto my-20 flex items-center gap-5 overflow-x-scroll relative w-1/2 h-96 p-6 overflow-y-hidden border border-black" style="scroll-snap-type: x mandatory;">
        <div class="gallery-image min-w-[75%]" style="scroll-snap-align: center;">
            <img src="assets/img/dumb/imgtemp 1.jpg" alt="" class="gallery-item w-auto h-full object-cover">
        </div>
        <div class="gallery-image min-w-[75%]" style="scroll-snap-align: center;">
            <img src="assets/img/dumb/imgtemp 2.jpg" alt="" class="gallery-item w-auto h-full object-cover">
        </div>
        <div class="gallery-image min-w-[75%]" style="scroll-snap-align: center;">
            <img src="assets/img/dumb/imgtemp 3.jpg" alt="" class="gallery-item w-auto h-full object-cover">
        </div>
        <div class="gallery-image min-w-[75%]" style="scroll-snap-align: center;">
            <img src="assets/img/dumb/imgtemp 4.jpg" alt="" class="gallery-item w-auto h-full object-cover">
        </div>
        <div class="gallery-image min-w-[75%]" style="scroll-snap-align: center;">
            <img src="assets/img/dumb/imgtemp 5.jpg" alt="" class="gallery-item w-auto h-full object-cover">
        </div>
        <div class="gallery-image min-w-[75%]" style="scroll-snap-align: center;">
            <img src="assets/img/dumb/imgtemp 6.jpg" alt="" class="gallery-item w-auto h-full object-cover">
        </div>
    </div>
</body>
</html>