<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Your Laravel App')</title>
</head>

<body>

    <header>
        <nav class="bg-black border-gray-200">
            <div class="max-w-screen-xl flex items-center mx-auto">
                <a href="{{ route('landing-page') }}" class="shrink-0 flex items-center space-x-3 rtl:space-x-reverse">
                    <img class="h-8 md:h-[120px] md:w-[120px]" src="https://scontent.fpen1-1.fna.fbcdn.net/v/t39.30808-6/358469989_755855429872996_368311450259519210_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=js2GABIOE9oAX-BZSul&_nc_ht=scontent.fpen1-1.fna&oh=00_AfArZwwIftoR5TJUUo6evdFgGTJOYcnMDdvwlGLYA0Lxxw&oe=65F54508" alt="GFS Logo" />
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
                        <div onclick="location.href='{{ route('byob') }}';" class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer {{ request()->is("byob") ? "bg-[#e2fbe2] text-black" : "" }}">
                            Build Your Own Bowl
                        </div>
                        <div class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer">
                            Menu
                        </div>
                        <div onclick="location.href='{{ route('story') }}';" class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer {{ request()->is("story") ? "bg-[#e2fbe2] text-black" : "" }}">
                            Our Story
                        </div>
		                <div onclick="location.href='{{ route('join-us') }}';" class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer {{ request()->is("join-us") ? "bg-[#e2fbe2] text-black" : "" }}">
		                    Join Us
		                </div>
                        <div onclick="location.href='{{ route('contact-us') }}';" class="flex-1 p-5 flex items-center justify-center hover:cursor-pointer {{ request()->is("contact-us") ? "bg-[#e2fbe2] text-black" : "" }}">
                            Contact Us
                        </div>
                        <img class="shrink-0 h-[120px] min-w-[250px]" src="https://cdn.klfoodie.com/2020/06/GF-In-app-Banner-01.jpg" />
                    </div>
                </div>
            </div>
        </nav>
        </nav>
    </header>

    <main class="bg-[#e2fbe2]">
        @yield('content')
    </main>

    <footer>
    </footer>

</body>

</html>
