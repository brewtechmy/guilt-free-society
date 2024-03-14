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
        <nav>
            <div class="hidden lg:flex bg-black h-48 w-full text-2xl justify-left text-white">
                <img onclick="location.href='{{ route('landing-page') }}';" class="max-h-48" src="https://scontent.fpen1-1.fna.fbcdn.net/v/t39.30808-6/358469989_755855429872996_368311450259519210_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=js2GABIOE9oAX-BZSul&_nc_ht=scontent.fpen1-1.fna&oh=00_AfArZwwIftoR5TJUUo6evdFgGTJOYcnMDdvwlGLYA0Lxxw&oe=65F54508" />
                <div onclick="location.href='{{ route('byob') }}';" class="flex items-center p-8 hover:cursor-pointer {{ request()->is("byob") ? "bg-[#e2fbe2] text-black" : "" }}">

                    Build Your Own Bowl
                </div>
                <div class="flex items-center p-8 hover:cursor-pointer">
                    Menu
                </div>
                <div onclick="location.href='{{ route('story') }}';" class="flex items-center p-8 hover:cursor-pointer {{ request()->is("story") ? "bg-[#e2fbe2] text-black" : "" }}">
                    Our Story
                </div>
                <div onclick="location.href='{{ route('join-us') }}';" class="flex items-center p-8 hover:cursor-pointer {{ request()->is("join-us") ? "bg-[#e2fbe2] text-black" : "" }}">
                    Join Us
                </div>
                <div onclick="location.href='{{ route('contact-us') }}';" class="flex items-center p-8 hover:cursor-pointer {{ request()->is("contact-us") ? "bg-[#e2fbe2] text-black" : "" }}">
                    Contact Us
                </div>
                <div class="pl-4 grow">
                    <img class="max-h-48 min-h-48 ml-auto w-2/3" src="https://cdn.klfoodie.com/2020/06/GF-In-app-Banner-01.jpg" />
                </div>
            </div>

            <div class="flex lg:hidden bg-black h-24 w-full leading-5 text-md justify-left text-white">
                <img onclick="location.href='{{ route('landing-page') }}';" class="max-h-24" src="https://scontent.fpen1-1.fna.fbcdn.net/v/t39.30808-6/358469989_755855429872996_368311450259519210_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=js2GABIOE9oAX-BZSul&_nc_ht=scontent.fpen1-1.fna&oh=00_AfArZwwIftoR5TJUUo6evdFgGTJOYcnMDdvwlGLYA0Lxxw&oe=65F54508" />
                <div class="w-full grid grid-cols-5 text-center align-middle">
                    <div onclick="location.href='{{ route('byob') }}';" class="flex items-center justify-center hover:cursor-pointer {{ request()->is("byob") ? "bg-[#e2fbe2] text-black" : "" }}">
                        Build Your Own Bowl
                    </div>
                    <div class="flex items-center justify-center hover:cursor-pointer">
                        Menu
                    </div>
                    <div onclick="location.href='{{ route('story') }}';" class="flex items-center justify-center hover:cursor-pointer {{ request()->is("story") ? "bg-[#e2fbe2] text-black" : "" }}">
                        Our Story
                    </div>
                    <div onclick="location.href='{{ route('join-us') }}';" class="flex items-center justify-center hover:cursor-pointer {{ request()->is("join-us") ? "bg-[#e2fbe2] text-black" : "" }}">
                        Join Us
                    </div>
                    <div onclick="location.href='{{ route('contact-us') }}';" class="flex items-center justify-center hover:cursor-pointer {{ request()->is("contact-us") ? "bg-[#e2fbe2] text-black" : "" }}">
                        Contact Us
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="bg-[#e2fbe2]">
        @yield('content')
    </main>

    <footer>
    </footer>

</body>
</html>
