@extends('layouts.menu')
@section('title', 'GFS - Menu')
@section('content')
    <div class="px-14 relative">
        <div class="flex flex-col">
            @foreach ($menuCategories as $categoryIndex => $category)
                <div class="py-4">
                    <span class="text-xl md:text-4xl lg:text-6xl font-semibold">{{ $category->name }}</span>
                    <div class="flex mt-4 px-8 overflow-x-auto overflow-y-hidden w-full">
                        @foreach ($category->products as $menuIndex => $menu)
                            <div class="flex flex-col items-center min-w-24 md:min-w-44 lg:min-w-56 xl:min-w-64 mx-8 cursor-pointer">
                                <img class="rounded-full border-8 border-black aspect-square w-full" src="{{ $menu->photo->thumbnail }}" />
                                <span class="text-base md:text-xl lg:text-3xl whitespace-nowrap">{{ $menu->name }}</span>
                                <span class="text-base md:text-xl lg:text-xl">({{ $menu->ingredients->sum('calories') }} kcal)</span>
                                <span class="text-base md:text-xl lg:text-3xl">RM {{ $menu->price }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection