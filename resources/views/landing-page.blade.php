<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Guilt Free Society</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/@pqina/flip/dist/flip.min.css" rel="stylesheet">
</head>

<body class="hover:cursor-pointer" onclick="location.href='{{ route('byob') }}';">
    <div class="h-dvh {{ count($advertisements) == 0 ? 'bg-black' : '' }}">
        <div class="{{ count($advertisements) > 0 ? 'h-3/4 bg-black' : '' }} text-center flex flex-col justify-center">
            <img class="max-h-[60%] max-w-[75%] mx-auto" src="{{ url('/images/gfs_main_logo.jpg') }}"
                alt="gfs_main_logo">
            <div class="tick w-fit mx-auto text-2xl sm:text-3xl" data-value="{{ $soldCount - 10 }}"
                data-did-init="setupFlip">
                <div data-repeat="true" aria-hidden="true">
                    <span data-view="flip"></span>
                </div>
            </div>
            <div class="text-white text-lg sm:text-xl">Healthy bowls sold</div>
            <div class="text-white mt-1 md:mt-3 text-lg sm:text-2xl">Begin your health journey here
                <i class="fa-regular fa-hand-pointer animate-bounce"></i>
            </div>
        </div>

        @if (count($advertisements) > 0)
            <div class="h-1/4 flex overflow-x-auto" id="carousel">
                @foreach ($advertisements as $key => $ads)
                    <img src="{{ $ads->photo->getUrl() }}" alt="{{ $ads->photo->name }}">
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script src="https://unpkg.com/@pqina/flip/dist/flip.min.js"></script>
    <script>
        @if (count($advertisements) > 0)
            var slider = tns({
                container: '#carousel',
                items: 1,
                controls: false,
                nav: false,
                autoplay: true,
                autoplayTimeout: 3500,
                autoplayButtonOutput: false,
                responsive: {
                    640: {
                        items: 2
                    },
                }
            });
        @endif


        function setupFlip(tick) {
            Tick.helper.interval(function() {
                if (tick.value < {{ $soldCount }}) tick.value++;
                tick.root.setAttribute('aria-label', tick.value);
            }, 180);
        }
    </script>
</body>

</html>
