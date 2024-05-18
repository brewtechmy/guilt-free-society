@extends('layouts.menu')
@section('title', 'GFS - Join Us')
@section('content')
    <div class="px-3 sm:px-14 relative">
        <div class="flex flex-row pt-5">
            <span class="text-6xl font-semibold mx-auto text-center md:mx-0">Partner With Us</span>
        </div>
        <div class="py-5">
            <div class="overflow-y-auto grid gap-5 mx-8 sm:mx-0 lg:grid-cols-2 lg:gap-8">
                @foreach($joinUs as $key => $joinUsValue)
                    <div class="flex flex-row gap-5">
                        <div class="basis-2/6 self-center hidden sm:block">
                            <img class="rounded-full border-8 border-black aspect-square object-cover max-w-52" src="{{ $joinUsValue->photo ? $joinUsValue->photo->getUrl() : ""}}"/>
                        </div>
                        <div class="flex flex-col justify-center sm:basis-4/6">
                            <div class="text-2xl items-center font-bold">{{ $joinUsValue->title }}</div>
                            <span class="text-md items-center mt-2">{!! $joinUsValue->description !!}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
