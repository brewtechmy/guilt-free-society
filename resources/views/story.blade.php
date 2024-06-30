@extends('layouts.menu')
@section('title', 'GFS - Our Story')
@section('content')
    <div class="px-5 sm:px-14 pt-4 grid grid-cols-1 lg:grid-cols-2 gap-10">
        <div class="">
            <div class="text-6xl font-semibold text-center md:text-left">Our Values</div>
            <div class="flex flex-col py-4 gap-3">
                {{-- <img class="rounded-full border-8 border-black aspect-square object-cover max-w-[55vw] mx-auto sm:max-w-72"
                src="{{ $images['our_values_image']->getUrl() }}"/> --}}
                <div class="inline-block bg-black rounded-full p-2 w-52 lg:w-72 mx-auto">
                    <img class="rounded-full border-black aspect-square object-cover w-full" src="{{ $images['our_values_image']->getUrl() }}"/>
                </div>
                <span class="text-2xl text-justify">
                    {!! $texts['our_values_text']['value'] !!}
                </span>
            </div>
        </div>
        <div class="flex flex-col gap-10">
            <div class="basis-1/2">
                <div class="text-6xl font-semibold text-center sm:text-left">Our Vision</div>
                <div class="items-center gap-6 py-4 flex flex-col sm:flex-row">
                    <img class="aspect-square object-cover max-w-[55vw]" src="{{ $images['our_vision_image']->getUrl() }}" />
                    <span class="text-2xl text-justify">{!! $texts['our_vision_text']['value'] !!}</span>
                </div>
            </div>
            <div class="basis-1/2">
                <div class="text-6xl font-semibold text-center sm:text-right">Our Mission</div>
                <div class="items-center gap-6 py-4 flex flex-col sm:flex-row">
                    <img class="aspect-square object-cover max-w-[30vw] sm:ml-auto sm:order-last" src="{{ $images['our_mission_image']->getUrl() }}" />
                    <span class="text-2xl text-justify">{!! $texts['our_mission_text']['value'] !!}</span>
                </div>
            </div>
        </div>
    </div>
    @if (count($journeys) > 0)
        <div class="px-5 sm:px-14 flex flex-col pt-5">
            <div class="text-6xl font-semibold text-center md:text-left">Our Journey</div>
            <div class="py-4">
                <div class="mx-70 rounded-lg">
                <div class="grid grid-rows-6 md:grid-rows-4 lg:grid-rows-3 grid-flow-col gap-4 auto-rows-max">
                    @for ($i = 0; $i < count($journeys); $i++)
                        <img class="aspect-square object-cover w-auto h-auto rounded-lg" src="{{ $journeys[$i]->getUrl() }}" alt="">
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
