@extends('layouts.menu')
@section('title', 'GFS - Our Service')
@section('content')
    <div class="px-3 sm:px-14 relative">
        <div class="flex flex-row pt-5">
            <span class="text-6xl font-semibold mx-auto text-center md:mx-0">Our Service</span>
        </div>
        <div class="overflow-y-auto py-5 grid gap-5 mx-8 sm:mx-0 grid lg:grid-cols-2 lg:gap-8">
            @foreach ($services as $service)
                <div class="flex flex-col sm:flex-row gap-5">
                    <div class="sm:basis-2/6 self-center">
                        {{-- <img class="rounded-full border-8 border-black aspect-square object-cover max-w-52 mx-auto" src="{{ $service->photo?->getUrl() ?? 'https://placehold.co/600x600?text=No+Photo' }}" /> --}}
                        <div class="inline-block bg-black rounded-full p-2 w-52 h-52">
                            <img class="rounded-full border-black aspect-square object-cover w-full" src="{{ $service->photo?->getUrl() ?? 'https://placehold.co/600x600?text=No+Photo' }}" />
                        </div>
                    </div>
                    <div class="flex flex-col justify-center sm:basis-4/6">
                        <div class="text-2xl font-bold text-center sm:text-left">{!! $service->title !!}</div>
                        <span class="text-md mt-2 text-center sm:text-left">{!! $service->description !!}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
