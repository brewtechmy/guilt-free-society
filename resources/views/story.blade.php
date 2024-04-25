@extends('layouts.menu')
@section('title', 'GFS - Build Your Own Bowl')
@section('content')
    @php
        $arr = [
            'https://scontent.fkul3-2.fna.fbcdn.net/v/t39.30808-6/431845024_911736820951522_2926372553146498329_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=5f2048&_nc_ohc=KuA7NXM-pCgAX8nCpyW&_nc_ht=scontent.fkul3-2.fna&oh=00_AfCahlw5RlYYqdPQFopqVFgeAxVMXLlGn0yXuVp_9_MZIw&oe=65F5BC0F',
            'https://scontent.fkul3-3.fna.fbcdn.net/v/t39.30808-6/425676799_18009694607246821_7799649237739185340_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=rAFZTHZTWXMAX80E5r8&_nc_ht=scontent.fkul3-3.fna&oh=00_AfBazd1NsYqzhEg78bNko-2I5UG3vfcUc2RzDgL_YDTrhg&oe=65F5D76B',
            'https://scontent.fkul3-3.fna.fbcdn.net/v/t39.30808-6/421681176_18008506550246821_1214923442010927370_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=tLmanq8HOj4AX-Bw6cT&_nc_ht=scontent.fkul3-3.fna&oh=00_AfDTTbDxVK2vtwZrBFsxjhdXSi87KskMiSV100iK5C_eIA&oe=65F58385',
            'https://scontent.fkul3-4.fna.fbcdn.net/v/t39.30808-6/421698105_18008506535246821_222676154888788881_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=tc_ooSy1CIIAX-fxgLB&_nc_ht=scontent.fkul3-4.fna&oh=00_AfD-dgZw1c42TIVhO4Mo5A-FpPz1HLxqZ-YoeDThWz-cag&oe=65F477FF',
            'https://scontent.fkul3-4.fna.fbcdn.net/v/t39.30808-6/424576245_18009001130246821_8652846760114634553_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=5f2048&_nc_ohc=SLkNZZkmgtwAX994Ib9&_nc_ht=scontent.fkul3-4.fna&oh=00_AfDbgiYfl3NQk91fT-1n_X7fY3IClO7q11OOmP-bjI9cgQ&oe=65F5166F',
            'https://scontent.fkul3-3.fna.fbcdn.net/v/t39.30808-6/378228278_797499635708575_832710934146874640_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=OPFAofbHGokAX-gemol&_nc_ht=scontent.fkul3-3.fna&oh=00_AfCH5kk34mheE6utCtlSQUrOYGOLwCPJE75DDoaM8IInXg&oe=65F50F55',
            'https://scontent.fkul3-2.fna.fbcdn.net/v/t39.30808-6/417783310_18006971801246821_2222262674467760591_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_ohc=lH-BM1j-5lkAX91C-Iq&_nc_ht=scontent.fkul3-2.fna&oh=00_AfDlAZQ-wWB3KTBJsV6vQTCE4g40_F9Ne6kwIfMJe7Y51A&oe=65F48A57',
            'https://scontent.fkul3-4.fna.fbcdn.net/v/t39.30808-6/416448034_18006196931246821_272717327529982678_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_ohc=mn90LM85E6wAX-og0Sn&_nc_ht=scontent.fkul3-4.fna&oh=00_AfCLSkFsLulpUAoLa-R0scGWAfPCKSc7T2hgsrI3aOenAA&oe=65F59B49',
            'https://scontent.fkul3-2.fna.fbcdn.net/v/t39.30808-6/410856143_18004542752246821_191979511624716868_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_ohc=i0fNY15EASkAX9y5QkY&_nc_oc=AQmaSC7u4AbBw84uPbqikSdppOoAQnPXqZ3ErjYJJFpebOhGEsKow-j3wVWoy0g3pTOsiQm0hfKwXLpAgFKvXPSK&_nc_ht=scontent.fkul3-2.fna&oh=00_AfC-mDe6MwQJW_8g6yTBGaVJH1upxo38ziU2fXh1dM_qoQ&oe=65F5ABA4',
            'https://scontent.fkul3-2.fna.fbcdn.net/v/t39.30808-6/406861969_18003621719246821_3316724700832255768_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=5f2048&_nc_ohc=ZrAekpPt8eQAX_g6qam&_nc_ht=scontent.fkul3-2.fna&oh=00_AfA-mGTL5CgRlaFT-doslGLGNPd0CpkBqIbSqpoPsFgqdA&oe=65F56F0A',
            'https://scontent.fkul3-2.fna.fbcdn.net/v/t39.30808-6/398490368_17998655525246821_8464446388800192676_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=5f2048&_nc_ohc=hUGGBA4-i7YAX-xgaIs&_nc_ht=scontent.fkul3-2.fna&oh=00_AfB28yx6h8I-bBA8fDMcgdcVhBJh7D-kAYPxrRf43CNzAg&oe=65F4CA40',
            'https://scontent.fkul3-2.fna.fbcdn.net/v/t39.30808-6/399814955_17999391806246821_3223734641245006144_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=5f2048&_nc_ohc=pKnrLJ2hX6QAX-0FdoY&_nc_ht=scontent.fkul3-2.fna&oh=00_AfBR9rJ3hKyyjy7tAFg2fAdOFiFwktqGgpzYlY3C1gpMqA&oe=65F59346',
        ];
    @endphp
    <div class="px-5 sm:px-14 pt-4 grid grid-cols-1 lg:grid-cols-2 gap-10">
        <div class="">
            <div class="text-6xl font-semibold text-center md:text-left">Our Values</div>
            <div class="flex flex-col py-4 gap-3">
                <img class="rounded-full border-8 border-black aspect-square max-w-[55vw] mx-auto sm:max-w-72"
                    src="{{ url('/images/gfs_main_logo.jpg') }}" alt="gfs_main_logo" />
                <span class="text-2xl text-justify">
                    {!! $texts['our_values_text']['value'] !!}
                </span>
            </div>
        </div>
        <div class="flex flex-col gap-10">
            <div class="basis-1/2">
                <div class="text-6xl font-semibold text-center md:text-left">Our Vision</div>
                <div class="flex flex-row items-center gap-6 py-4">
                    <img class="aspect-square max-w-[30vw]" src="{{ url('/images/vision.png') }}" />
                    <span class="text-2xl text-justify">{!! $texts['our_vision_text']['value'] !!}
                    </span>
                </div>
            </div>
            <div class="basis-1/2">
                <div class="text-6xl font-semibold text-center md:text-left">Our Mission</div>
                <div class="flex flex-row items-center gap-6 py-4">
                    <span class="text-2xl text-justify">{!! $texts['our_mission_text']['value'] !!}
                    </span>
                    <img class="aspect-square max-w-[30vw] ml-auto" src="{{ url('/images/mission.png') }}" />
                </div>
            </div>
        </div>
    </div>
    @if (count($journeys) > 0)
        <div class="px-5 sm:px-14 flex flex-col pt-5">
            <div class="text-6xl font-semibold text-center md:text-left">Our Journey</div>
            <div class="py-4">
                <div class="mx-70 border-8 border-black rounded-lg">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 items-center">
                        @for ($i = 0; $i < count($journeys); $i = $i + 3)
                            <div class="grid gap-4">
                                @for ($j = $i; $j < $i + 3; $j++)
                                    <div>
                                        @if (isset($journeys[$j]))
                                            <img class="h-auto max-w-full rounded-lg" src="{{ $journeys[$j]->getUrl() }}"
                                                alt="">
                                        @else
                                        @break
                                    @endif
                                </div>
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
