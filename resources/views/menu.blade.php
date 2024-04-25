
@extends('layouts.menu')
@section('title', 'GFS - Build Your Own Bowl')
@section('content')
@php
    $arr = [
        [
            'title' => 'Pre-set Bowl',
            'list' => [
                [
                    'name' => 'Fruit Bowl',
                    'img' => 'https://www.tasteofhome.com/wp-content/uploads/2018/01/exps4271_MC163887D03_24_4b-1.jpg',
                    'kcal' => 246,
                    'price' => 28.90
                ],
                [
                    'name' => 'Colourful Vegan',
                    'img' => 'https://www.creativefabrica.com/wp-content/uploads/2023/10/30/This-Magnificent-Half-Human-Creature-With-Rainbow-Iridescent-Skin-Color-80494198-1.png',
                    'kcal' => 345,
                    'price' => 28.90
                ],
                [
                    'name' => 'Chicken Teriyakki Bowl',
                    'img' => 'https://reciperunner.com/wp-content/uploads/2021/06/teriyaki-chicken-rice-bowls-photo-735x1062.jpg',
                    'kcal' => 233,
                    'price' => 28.90
                ],
                [
                    'name' => 'Almond Butter Tofu',
                    'img' => 'https://thiswifecooks.com/wp-content/uploads/2022/06/Almond-Butter-Tofu-1.png',
                    'kcal' => 231,
                    'price' => 28.90
                ],
                [
                    'name' => 'Fruit Bowl',
                    'img' => 'https://www.tasteofhome.com/wp-content/uploads/2018/01/exps4271_MC163887D03_24_4b-1.jpg',
                    'kcal' => 696,
                    'price' => 28.90
                ],
                [
                    'name' => 'Colourful Vegan',
                    'img' => 'https://www.creativefabrica.com/wp-content/uploads/2023/10/30/This-Magnificent-Half-Human-Creature-With-Rainbow-Iridescent-Skin-Color-80494198-1.png',
                    'kcal' => 696,
                    'price' => 28.90
                ]
            ]
        ],
        [
            'title' => 'Juice',
            'list' => [
                [
                    'name' => 'Watermelon',
                    'img' => 'https://redinnhotpot.com/wp-content/uploads/2022/03/cold-watermelon-smoothie-dark-background_ccexpress-1.jpeg',
                    'kcal' => 246,
                    'price' => 28.90
                ],
                [
                    'name' => 'Kiwi',
                    'img' => 'https://recipe52.com/wp-content/uploads/2020/01/Kiwi-Juice-recipe-6.jpg',
                    'kcal' => 345,
                    'price' => 28.90
                ],
                [
                    'name' => 'Banana',
                    'img' => 'https://img.onmanorama.com/content/dam/mm/en/food/recipe/images/2023/4/20/banana-juice.jpg',
                    'kcal' => 233,
                    'price' => 28.90
                ],
                [
                    'name' => 'Grape',
                    'img' => 'https://www.indianhealthyrecipes.com/wp-content/uploads/2022/02/apple-juice.jpg.webp',
                    'kcal' => 231,
                    'price' => 28.90
                ],
                [
                    'name' => 'Apple',
                    'img' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjPvU3l_aAkkHqpb0Eg7KUhzkD6Vkre2q8TRlW_uIinwOkr49JmkfeBxYZN638CPoOXZPFT54NMC6MCoeJBmv2cTv9Qru0i5aU_-DK676w9yCbhrsVN8c4k6xDRj0U4D7uO_EggkDFba4qB/s1600/Fresh+grape+juice.jpg',
                    'kcal' => 696,
                    'price' => 28.90
                ],
                [
                    'name' => 'Orange',
                    'img' => 'https://www.alphafoodie.com/wp-content/uploads/2020/11/Orange-Juice-1-of-1.jpeg',
                    'kcal' => 696,
                    'price' => 28.90
                ]
            ]
        ]
    ];
@endphp
    <div class="px-14 relative">
        <div class="flex flex-col">
            @foreach ($arr as $k => $v)
                <div class="py-4">
                    <span class="text-xl md:text-4xl lg:text-6xl font-semibold">{{$v['title']}}</span>
                    <div class="flex mt-4 px-8 overflow-x-auto overflow-y-hidden w-full">
                        @foreach ($v['list'] as $li)
                            <div class="flex flex-col items-center min-w-24 md:min-w-44 lg:min-w-56 xl:min-w-64 mx-8 cursor-pointer">
                                <img class="rounded-full border-8 border-black aspect-square w-full" src="{{ asset($li['img']) }}" />
                                <span class="text-base md:text-xl lg:text-3xl whitespace-nowrap">{{$li['name']}}</span>
                                <span class="text-xs md:text-base lg:text-xl">({{$li['kcal']}} kcal)</span>
                                <span class="text-base md:text-xl lg:text-3xl">RM {{$li['price']}}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection