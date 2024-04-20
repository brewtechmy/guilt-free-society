<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Your Laravel App')</title>
</head>

<body class="bg-[#e2fbe2]">

    <header>
        <nav class="bg-black border-gray-200">
            <div class="max-w-screen-xl flex items-center mx-auto">
                <a href="{{ route('landing-page') }}" class="shrink-0 flex items-center space-x-3 rtl:space-x-reverse">
                    <img class="h-8 md:h-[120px] md:w-[120px]" src="{{ url('/images/gfs_main_logo.jpg') }}"
                        alt="gfs_main_logo" />
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="h-[120px] hidden w-full grow text-white md:block md:w-auto" id="navbar-default">
                    <div class="h-full w-full flex text-center align-middle">
                        <a href="{{ route('byob') }}"
                            class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer {{ request()->is('byob') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Build Your Own Bowl
                        </a>
                        <a class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer">
                            Menu
                        </a>
                        <a href="{{ route('story') }}"
                            class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer {{ request()->is('story') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Our Story
                        </a>
                        <a href="{{ route('join-us') }}"
                            class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer {{ request()->is('join-us') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Join Us
                        </a>
                        <a href="{{ route('contact-us') }}"
                            class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer {{ request()->is('contact-us') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Contact Us
                        </a>
                        @if (count($advertisements) > 0)
                            <div class="shrink-0 w-[250px]">
                                <div class="h-[120px] flex overflow-x-auto" style="overflow:hidden"
                                    id="menuCarousel">
                                    @foreach ($advertisements as $key => $ads)
                                    <img class="min-w-[250px]" src="{{ $ads->photo->getUrl() }}" alt="{{ $ads->photo->name }}">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
                    <script>
                        @if (count($advertisements) > 0)
                            var slider = tns({
                                container: '#menuCarousel',
                                items: 1,
                                controls: false,
                                nav: false,
                                autoplay: true,
                                autoplayTimeout: 3500,
                                autoplayButtonOutput: false,
                            });
                        @endif
                    </script>
                </div>
            </div>
        </nav>
        </nav>
    </header>

    <main class="max-w-[100vw]">
        <div class="mx-auto max-w-[1260px]">
            <div class="sm:mx-12 bg-slate-50/45">
                @yield('content')
            </div>
        </div>
    </main>

    <footer>
    </footer>

</body>

</html>
