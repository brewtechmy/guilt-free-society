<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <script src="{{ asset('js/counter.js') }}"></script>
    <link href="{{ asset('css/counter.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Your Laravel App')</title>
</head>

<body class="bg-[#e2fbe2]">

    <header>
        <nav class="bg-black border-gray-200 rounded-b-lg md:rounded-none">
            <div class="max-w-screen-xl items-center mx-auto justify-between flex flex-wrap p-2 md:p-0 md:flex-nowrap">
                <a href="{{ route('landing-page') }}" class="shrink-0 flex items-center space-x-3 rtl:space-x-reverse">
                    <img class="h-[60px] w-[60px] md:h-[120px] md:w-[120px]" src="{{ url('/images/gfs_main_logo.jpg') }}"
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
                <div class="hidden w-full text-white md:grow md:block md:w-auto md:h-[120px]" id="navbar-default">
                    <div class="h-full w-full text-center align-middle flex flex-col md:flex-row">
                        <a href="{{ route('byob') }}"
                            class="flex-1 flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-4 hover:cursor-pointer {{ request()->is('byob') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Build Your Own Bowl
                        </a>
                        <a href="{{ route('menu') }}"
                            class="flex-1 flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-5 hover:cursor-pointer {{ request()->is("menu") ? "bg-[#e2fbe2] text-black" : "" }}">
                            Menu
                        </a>
                        <a href="{{ route('story') }}"
                            class="flex-1 flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-4 hover:cursor-pointer {{ request()->is('story') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Our Story
                        </a>
                        <a href="{{ route('service') }}"
                            class="flex-1 flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-3 hover:cursor-pointer {{ request()->is('service') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Our Service
                        </a>
                        <a href="{{ route('join-us') }}"
                            class="flex-1 flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-5 hover:cursor-pointer {{ request()->is('join-us') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Join Us
                        </a>
                        <a href="{{ route('contact-us') }}"
                            class="flex-1 flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-2 hover:cursor-pointer {{ request()->is('contact-us') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Contact Us
                        </a>
                        @if (count($advertisements) > 0)
                            <div class="h-[120px] hidden md:flex" id="menuCarousel">
                                @foreach ($advertisements as $key => $ads)
                                    <img src="{{ $ads->photo->getUrl() }}" alt="{{ $ads->photo->name }}">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        </nav>
    </header>

    <main class="max-w-[100vw]">
        <div class="mx-auto max-w-[1260px]">
            <div class="bg-slate-50/45">
                @yield('content')
            </div>
        </div>
    </main>

    <footer>
    </footer>

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

        const elements = document.querySelectorAll('[data-collapse-toggle]');
        Array.from(elements).forEach((element, index) => {
            let target = document.getElementById(element.getAttribute('data-collapse-toggle'));

            element.addEventListener('click', () => {
                target.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>
