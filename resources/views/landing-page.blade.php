<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Guilt Free Society</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
</head>

<body>
    <div class="h-dvh">
        <div class="h-3/4 bg-black flex justify-center">
            <img class="my-auto h-1/2 max-h-[400px]" src="{{ url('/images/gfs_main_logo.jpg') }}" alt="gfs_main_logo">
        </div>
        <div class="h-1/4 flex overflow-x-auto" id="carousel">
            @foreach ($advertisements as $key => $ads)
                <img src="{{ $ads->photo->getUrl() }}" alt="{{ $ads->photo->name }}">
            @endforeach
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script>
        var slider = tns({
            container: '#carousel',
            items: 1,
            controls: false,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayButtonOutput: false,
            responsive: {
                768: {
                    items: 2
                },
            }
        });
    </script>
</body>

</html>
