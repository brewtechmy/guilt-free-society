<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/counter.js') }}"></script>
    <link href="{{ asset('css/counter.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Your Laravel App')</title>
    <link rel="icon" href="{{ url('/images/gfs_main_logo.jpg') }}">
</head>

<body class="bg-[#e2fbe2]">

    <header>
        <nav class="bg-black border-gray-200 rounded-b-lg md:rounded-none">
            <div class="max-w-screen-xl items-center mx-auto justify-between flex flex-wrap p-2 md:p-0 md:flex-nowrap">
                <a href="{{ route('landing-page') }}" class="shrink-0 flex items-center space-x-3 rtl:space-x-reverse">
                    <img class="h-[60px] w-[60px] md:h-[120px] md:w-[120px]" src="{{ url('/images/gfs_main_logo.jpg') }}" alt="gfs_main_logo" />
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full text-white md:grow md:block md:w-auto md:h-[120px]" id="navbar-default">
                    <div class="h-full w-full text-center align-middle flex flex-col md:flex-row">
                        <a href="{{ route('byob') }}" class="flex-1 lg:text-xl flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-4 hover:cursor-pointer {{ request()->is('byob') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Build Your Own Bowl
                        </a>
                        <a href="{{ route('menu') }}" class="flex-1 lg:text-xl flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-4 hover:cursor-pointer {{ request()->is('menu') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Menu
                        </a>
                        <a href="{{ route('story') }}" class="flex-1 lg:text-xl flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-4 hover:cursor-pointer {{ request()->is('story') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Our Story
                        </a>
                        <a href="{{ route('service') }}" class="flex-1 lg:text-xl flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-3 hover:cursor-pointer {{ request()->is('service') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Our Service
                        </a>
                        <a href="{{ route('join-us') }}" class="flex-1 lg:text-xl flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-5 hover:cursor-pointer {{ request()->is('join-us') ? 'bg-[#e2fbe2] text-black' : '' }}">
                            Join Us
                        </a>
                        <a href="{{ route('contact-us') }}" class="flex-1 lg:text-xl flex items-center justify-center rounded-lg p-2 md:rounded-none md:p-3 hover:cursor-pointer {{ request()->is('contact-us') ? 'bg-[#e2fbe2] text-black' : '' }}">
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
    </header>

    <main class="max-w-[100vw] min-h-[calc(100dvh-124px)] md:min-h-[calc(100dvh-168px)]">
        <div class="mx-auto max-w-screen-xl">
            <div>
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="bg-black text-white">
        <div class="max-w-screen-xl justify-around mx-auto py-4 gap-y-2 flex flex-col md:flex-row">
            <div class="flex flex-col lg:flex-row gap-x-4 gap-y-2">
                <a href="tel:+1234567890" class="flex flex-row self-center gap-2"> <!-- Add phone number -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                    </svg>
                    <span>016-451 3003</span>
                </a>
                <a href="mailto:info@guiltfreesociety.com" class="flex flex-row self-center gap-2"> <!-- Add email -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                    </svg>
                    <span>guiltfreesocietykk@gmail.com</span>
                </a>
            </div>
            <div class="self-center">Copyright © {{ \Carbon\Carbon::now()->format('Y') }} Guilt Free Society</div>
            <div class="flex flex-col lg:flex-row self-center items-center gap-3">
                <div class="hidden md:block">Find us at:</div>
                <div class="flex self-center items-center gap-4">
                    <a href="https://www.facebook.com/people/Guilt-Free-Society-KK/100063456371858/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/guiltfreesocietykk/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
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
