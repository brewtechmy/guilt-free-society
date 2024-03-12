<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Guilt Free Society</title>
</head>
<body>
    <div class="h-svh">
        <div class="h-3/4 bg-black flex justify-center">
            <img class="my-auto h-1/2 max-h-[400px]" src="{{ url('/images/gfs_main_logo.jpg') }}" alt="gfs_main_logo">
        </div>
        <div class="h-1/4 grid grid-cols-1 md:grid-cols-2">
            <img class="h-full w-full" src="{{ url('/images/monsta_promo.png') }}" alt="monsta_promo">
            <img class="h-full w-full" src="{{ url('/images/atome_banner.png') }}" alt="atome_banner">
        </div>
    </div>
</body>
</html>
