@extends('layouts.menu')
@section('title', 'GFS - Menu')
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
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Colourful Vegan',
                        'img' => 'https://www.creativefabrica.com/wp-content/uploads/2023/10/30/This-Magnificent-Half-Human-Creature-With-Rainbow-Iridescent-Skin-Color-80494198-1.png',
                        'kcal' => 345,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Chicken Teriyakki Bowl',
                        'img' => 'https://reciperunner.com/wp-content/uploads/2021/06/teriyaki-chicken-rice-bowls-photo-735x1062.jpg',
                        'kcal' => 233,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Almond Butter Tofu',
                        'img' => 'https://thiswifecooks.com/wp-content/uploads/2022/06/Almond-Butter-Tofu-1.png',
                        'kcal' => 231,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Fruit Bowl',
                        'img' => 'https://www.tasteofhome.com/wp-content/uploads/2018/01/exps4271_MC163887D03_24_4b-1.jpg',
                        'kcal' => 696,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Colourful Vegan',
                        'img' => 'https://www.creativefabrica.com/wp-content/uploads/2023/10/30/This-Magnificent-Half-Human-Creature-With-Rainbow-Iridescent-Skin-Color-80494198-1.png',
                        'kcal' => 696,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Juice',
                'list' => [
                    [
                        'name' => 'Watermelon',
                        'img' => 'https://redinnhotpot.com/wp-content/uploads/2022/03/cold-watermelon-smoothie-dark-background_ccexpress-1.jpeg',
                        'kcal' => 246,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Kiwi',
                        'img' => 'https://recipe52.com/wp-content/uploads/2020/01/Kiwi-Juice-recipe-6.jpg',
                        'kcal' => 345,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Banana',
                        'img' => 'https://img.onmanorama.com/content/dam/mm/en/food/recipe/images/2023/4/20/banana-juice.jpg',
                        'kcal' => 233,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Grape',
                        'img' => 'https://www.indianhealthyrecipes.com/wp-content/uploads/2022/02/apple-juice.jpg.webp',
                        'kcal' => 231,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Apple',
                        'img' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjPvU3l_aAkkHqpb0Eg7KUhzkD6Vkre2q8TRlW_uIinwOkr49JmkfeBxYZN638CPoOXZPFT54NMC6MCoeJBmv2cTv9Qru0i5aU_-DK676w9yCbhrsVN8c4k6xDRj0U4D7uO_EggkDFba4qB/s1600/Fresh+grape+juice.jpg',
                        'kcal' => 696,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                    [
                        'name' => 'Orange',
                        'img' => 'https://www.alphafoodie.com/wp-content/uploads/2020/11/Orange-Juice-1-of-1.jpeg',
                        'kcal' => 696,
                        'price' => 28.9,
                        'ingredients' => [
                            'Sides' => ['Edamame', 'Carrot', 'Wakame', 'Sweet corn'],
                            'Toppings' => ['Lime', 'Raisin', 'Goji berry', 'Almond nut'],
                        ],
                    ],
                ],
            ],
        ];
        $arr = [];
        foreach ($menuCategories as $categoryIndex => $category) {
            array_push($arr, ['title' => $category->name, 'list' => []]);
            foreach ($category->products as $menuIndex => $menu) {
                array_push($arr[$categoryIndex]['list'], ['name' => $menu->name, 'kcal' => $menu->calories, 'price' => $menu->price, 'description' => $menu->ingredients->pluck('name')->implode(', ')]);
            }
        }
    @endphp
    <div class="px-3 sm:px-14 relative">
        <div class="flex flex-col">
            @foreach ($menuCategories as $categoryIndex => $category)
                <div class="py-4">
                    <span class="text-xl md:text-4xl lg:text-6xl font-semibold">{{ $category->name }}</span>
                    <div class="flex mt-4 py-3 px-4 overflow-x-auto overflow-y-hidden w-full no-scrollbar">
                        @foreach ($category->products as $menuIndex => $menu)
                            <div class="flex flex-col items-center min-w-24 md:min-w-44 lg:min-w-56 xl:min-w-64 md:ml-12 mr-20 md:mr-8 lg:mr-10 xl:mr-12 cursor-pointer text-ellipsis">
                                <img class="rounded-full border-4 lg:border-8 border-black aspect-square w-full hover:scale-105" src="{{ $menu->photo->getUrl() }}" data-description="{{ $categoryIndex . '-' . $menuIndex }}" onclick="showDetails(this)" />
                                <span class="text-base md:text-xl lg:text-3xl whitespace-nowrap mt-3 truncate max-w-32 md:max-w-56 lg:max-w-72 xl:max-w-80">{{ $menu->name }}</span>
                                <span class="text-xs md:text-base lg:text-xl">({{ $menu->ingredients->sum('calories') }} kcal)</span>
                                <span class="text-base md:text-xl lg:text-3xl">RM {{ $menu->price }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Popout HTML -->
    <div id="popout" class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50">
        <div id="popout-content" class="bg-white p-8 rounded-lg text-center transform transition-transform duration-300 -translate-y-full max-w-lg shadow-lg">
            <div class="text-2xl font-bold mb-4" id='item-title'></div>
            <div id="details-content" class="text-left"></div>
        </div>
    </div>
    <script>
        var arr = @json($arr);

        function showDetails(element) {
            var description = element.getAttribute('data-description');
            var popoutContent = document.getElementById('popout-content');
            var detailsContent = document.getElementById('details-content');
            var parts = description.split('-');
            var item = arr[parts[0]].list[parts[1]]

            detailsContent.innerHTML = '';
            document.getElementById('item-title').innerHTML = item['name']
            // Object.keys(item['ingredients']).forEach(function(key) {
            //     var header = document.createElement('div');
            //     header.className = 'text-lg font-semibold mt-4';
            //     header.textContent = key;
            //     detailsContent.appendChild(header);

            //     var values = item['ingredients'][key];
            //     var detailsString = values.join(', ');
            //     var detailsStringElement = document.createElement('p');
            //     detailsStringElement.textContent = detailsString;
            //     detailsContent.appendChild(detailsStringElement);
            // });
            detailsContent.innerHTML = item['description']

            var popout = document.getElementById('popout');
            popout.classList.remove('hidden');
            popoutContent.classList.remove('-translate-y-full');
        }

        document.addEventListener('click', function(event) {
            var popout = document.getElementById('popout');
            if (!event.target.closest('#popout-content') && !event.target.closest('[data-description]')) {
                popout.classList.add('hidden');
                popout.querySelector('#popout-content').classList.add('-translate-y-full');
            }
        });
    </script>
    <script>
        const dragScrolls = document.querySelectorAll('.no-scrollbar');

        dragScrolls.forEach((dragScroll) => {
            let isMouseDown = false;
            let startX, scrollLeft;

            dragScroll.addEventListener('mousedown', (e) => {
                isMouseDown = true;
                startX = e.pageX - dragScroll.offsetLeft;
                scrollLeft = dragScroll.scrollLeft;
            });

            dragScroll.addEventListener('mousemove', (e) => {
                if (!isMouseDown) return;
                e.preventDefault();
                const x = e.pageX - dragScroll.offsetLeft;
                const walk = (x - startX) * 3; // Adjust scrolling speed here
                dragScroll.scrollLeft = scrollLeft - walk;
            });

            dragScroll.addEventListener('mouseup', () => {
                isMouseDown = false;
            });
        });
    </script>
@endsection
