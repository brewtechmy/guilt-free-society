@extends('layouts.menu')
@section('title', 'GFS - Build Your Own Bowl')
@section('content')
@php
    $arr = [
        [
            'title' => 'Base',
            'list' => [
                [
                    'name' => 'Brown rice',
                    'img' => 'https://5.imimg.com/data5/SELLER/Default/2021/3/ZJ/WX/AR/22880332/organic-basmati-brown-rice-500x500.jpg',
                    'kcal' => 246,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Quinoa',
                    'img' => 'https://static01.nyt.com/images/2024/01/04/multimedia/AS-Quinoa-tpjk/AS-Quinoa-tpjk-superJumbo.jpg',
                    'kcal' => 345,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Greens',
                    'img' => 'https://cdn.loveandlemons.com/wp-content/uploads/2021/04/green-salad.jpg',
                    'kcal' => 233,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Soba',
                    'img' => 'https://store.177milkstreet.com/cdn/shop/products/izumo-soba-noodles-umami-insider-28276732887097_700x.jpg?v=1632417414',
                    'kcal' => 231,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Rice',
                    'img' => 'https://img.freepik.com/free-photo/closeup-white-rice-textured_53876-30443.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Potato',
                    'img' => 'https://www.recipetineats.com/wp-content/uploads/2020/03/Creamy-Mashed-Potato_8-copy.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ]
            ]
        ],
        [
            'title' => 'Protein',
            'list' => [
                [
                    'name' => 'Chicken',
                    'img' => 'https://www.wholesomeyum.com/wp-content/uploads/2021/12/wholesomeyum-Air-Fryer-Chicken-Breast-Recipe-32.jpg',
                    'kcal' => 246,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Fish',
                    'img' => 'https://kitchenatics.com/wp-content/uploads/2020/06/Grilled-Fish-Fillet-with-BBQ-Vegetables-500x500.jpg',
                    'kcal' => 345,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Beef',
                    'img' => 'https://www.simplyrecipes.com/thmb/0viHgWhjDdQ2caxPC6xozUvloQA=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2018__06__Grilled-Steak-LEAD-HORIZONTAL-33b562e0f6ce4a30b42a0ec603005569.jpg',
                    'kcal' => 233,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Shrimp',
                    'img' => 'https://www.acouplecooks.com/wp-content/uploads/2018/09/Grilled-Shrimp-006.jpg',
                    'kcal' => 231,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Egg',
                    'img' => 'https://assets.bonappetit.com/photos/58c95c88aafcc51ad9a32bc9/3:2/w_4998,h_3332,c_limit/jammy-soft-boiled-eggs.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Protein Powder',
                    'img' => 'https://thedaily9.in/wp-content/uploads/2023/01/Protein-shakes.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ]
            ]
        ],
        [
            'title' => 'Protein',
            'list' => [
                [
                    'name' => 'Chicken',
                    'img' => 'https://www.wholesomeyum.com/wp-content/uploads/2021/12/wholesomeyum-Air-Fryer-Chicken-Breast-Recipe-32.jpg',
                    'kcal' => 246,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Fish',
                    'img' => 'https://kitchenatics.com/wp-content/uploads/2020/06/Grilled-Fish-Fillet-with-BBQ-Vegetables-500x500.jpg',
                    'kcal' => 345,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Beef',
                    'img' => 'https://www.simplyrecipes.com/thmb/0viHgWhjDdQ2caxPC6xozUvloQA=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2018__06__Grilled-Steak-LEAD-HORIZONTAL-33b562e0f6ce4a30b42a0ec603005569.jpg',
                    'kcal' => 233,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Shrimp',
                    'img' => 'https://www.acouplecooks.com/wp-content/uploads/2018/09/Grilled-Shrimp-006.jpg',
                    'kcal' => 231,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Egg',
                    'img' => 'https://assets.bonappetit.com/photos/58c95c88aafcc51ad9a32bc9/3:2/w_4998,h_3332,c_limit/jammy-soft-boiled-eggs.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Protein Powder',
                    'img' => 'https://thedaily9.in/wp-content/uploads/2023/01/Protein-shakes.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ]
            ]
        ],
        [
            'title' => 'Protein',
            'list' => [
                [
                    'name' => 'Chicken',
                    'img' => 'https://www.wholesomeyum.com/wp-content/uploads/2021/12/wholesomeyum-Air-Fryer-Chicken-Breast-Recipe-32.jpg',
                    'kcal' => 246,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Fish',
                    'img' => 'https://kitchenatics.com/wp-content/uploads/2020/06/Grilled-Fish-Fillet-with-BBQ-Vegetables-500x500.jpg',
                    'kcal' => 345,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Beef',
                    'img' => 'https://www.simplyrecipes.com/thmb/0viHgWhjDdQ2caxPC6xozUvloQA=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2018__06__Grilled-Steak-LEAD-HORIZONTAL-33b562e0f6ce4a30b42a0ec603005569.jpg',
                    'kcal' => 233,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Shrimp',
                    'img' => 'https://www.acouplecooks.com/wp-content/uploads/2018/09/Grilled-Shrimp-006.jpg',
                    'kcal' => 231,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Egg',
                    'img' => 'https://assets.bonappetit.com/photos/58c95c88aafcc51ad9a32bc9/3:2/w_4998,h_3332,c_limit/jammy-soft-boiled-eggs.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Protein Powder',
                    'img' => 'https://thedaily9.in/wp-content/uploads/2023/01/Protein-shakes.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ]
            ]
        ],
        [
            'title' => 'Protein',
            'list' => [
                [
                    'name' => 'Chicken',
                    'img' => 'https://www.wholesomeyum.com/wp-content/uploads/2021/12/wholesomeyum-Air-Fryer-Chicken-Breast-Recipe-32.jpg',
                    'kcal' => 246,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Fish',
                    'img' => 'https://kitchenatics.com/wp-content/uploads/2020/06/Grilled-Fish-Fillet-with-BBQ-Vegetables-500x500.jpg',
                    'kcal' => 345,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Beef',
                    'img' => 'https://www.simplyrecipes.com/thmb/0viHgWhjDdQ2caxPC6xozUvloQA=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2018__06__Grilled-Steak-LEAD-HORIZONTAL-33b562e0f6ce4a30b42a0ec603005569.jpg',
                    'kcal' => 233,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Shrimp',
                    'img' => 'https://www.acouplecooks.com/wp-content/uploads/2018/09/Grilled-Shrimp-006.jpg',
                    'kcal' => 231,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Egg',
                    'img' => 'https://assets.bonappetit.com/photos/58c95c88aafcc51ad9a32bc9/3:2/w_4998,h_3332,c_limit/jammy-soft-boiled-eggs.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ],
                [
                    'name' => 'Protein Powder',
                    'img' => 'https://thedaily9.in/wp-content/uploads/2023/01/Protein-shakes.jpg',
                    'kcal' => 696,
                    'quantity' => 150,
                    'protein' => 21.53,
                    'carbs' => 11.69,
                    'fat' => 0.05
                ]
            ]
        ]
    ];
@endphp
    <div class="px-14 relative">
        <div class="fixed right-5 bottom-1 flex flex-col items-center">
            <div id="nut-table" class="transform transition-transform duration-300 origin-bottom scale-0">
                <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden pr-3">
                    <thead class="bg-black">
                        <tr class="text-white">
                            <th class="px-4 py-2">Nutrition</th>
                            <th class="px-4 py-2">Quantity (g)</th>
                            <th class="px-4 py-2 pr-10">Calories (kcal)</th>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke="currentColor" class="w-6 h-6 absolute top-0 right-2 mt-2 cursor-pointer text-white" onclick="toggleCalR()">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </tr>
                    </thead>
                    <tbody id="nut-tbody">
                        <tr>
                            <td class="px-4 py-2">Carbs</td>
                            <td id="carb-quantity" class="px-4 py-2">0</td>
                            <td id="carb-calories" class="px-4 py-2">0</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">Protein</td>
                            <td id="protein-quantity" class="px-4 py-2">0</td>
                            <td id="protein-calories" class="px-4 py-2">0</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">Fat</td>
                            <td id="fat-quantity" class="px-4 py-2">0</td>
                            <td id="fat-calories" class="px-4 py-2">0</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td>
                            <button class="btn bg-[#027148] hover:bg-green-500 text-white font-bold py-2 px-4 rounded m-2" onclick="reset()">
                                Reset
                            </button>
                            </td>
                            <td class="px-4 py-2">Total</td>
                            <td id="total-cal" class="px-4 py-2">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="ml-auto transform transition-transform duration-300 origin-bottom cursor-pointer" id="click-me" onclick="toggleCal(this)">
                <span class="font-bold text-sm md:text-base lg:text-xl text-white bg-black px-4 py-1">Click me</span>
                <img class="max-h-14 md:max-h-20 lg:max-h-28 mt-2" id="cal-img" src="https://cdn-icons-png.freepik.com/512/5223/5223103.png" />
            </div>
        </div>
        <div class="flex flex-col">
            @foreach ($arr as $k => $v)
                <div class="py-4">
                    <span class="text-xl md:text-4xl lg:text-6xl font-semibold">{{$v['title']}}</span>
                    <div class="flex mt-4 px-8 overflow-x-auto overflow-y-hidden w-full">
                        @foreach ($v['list'] as $ik => $li)
                            <div class="flex flex-col items-center min-w-24 md:min-w-44 lg:min-w-56 xl:min-w-64 md:ml-12 mr-4">
                                <img class="rounded-full border-4 lg:border-8 border-black aspect-square w-full" src="{{ asset($li['img']) }}" />
                                <span class="text-base md:text-xl lg:text-3xl whitespace-nowrap">{{$li['name']}}</span>
                                <span class="text-base md:text-xl lg:text-3xl">({{$li['kcal']}} kcal)</span>
                            </div>
                            <div class="wheel-outline mr-6 transform duration-300 scale-0">
                                <div id="acw-{{$k.'-'.$ik}}" class="counter w-8 md:w-10 lg:w-12 h-11 md:h-14 lg:h-20">0</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript">
        var arr = @json($arr);
        var carbMultiplier = @json(4);
        var proteinMultiplier = @json(4);
        var fatMultiplier = @json(9);
        const elementList = document.querySelectorAll("[id^='acw']");
        elementList.forEach(element => {
            var counter = new Counter(element.id);
            counter.options.inverted = true;
        });

        function toggleCal(e){
            const wheelList = document.querySelectorAll("[class^='wheel-outline']");
            wheelList.forEach(element => {
                element.classList.toggle("scale-0")
            });
            e.classList.toggle('scale-0');
            setTimeout(() => {
                e.classList.toggle('hidden');
                document.getElementById('nut-table').classList.toggle("scale-0")
            }, 300);
        }
        function toggleCalR(){
            const wheelList = document.querySelectorAll("[class^='wheel-outline']");
            document.getElementById('nut-table').classList.toggle('scale-0');
            setTimeout(() => {
                document.getElementById('click-me').classList.toggle("hidden")
            }, 300);
            setTimeout(() => {
                document.getElementById('click-me').classList.toggle("scale-0")
            }, 400);
            wheelList.forEach(element => {
                element.classList.toggle("scale-0")
            });
        }

        function reset(){
            const elementList = document.querySelectorAll("[id^='acw']");
            elementList.forEach(element => {
                var counter = new Counter(element.id);
                counter.options.inverted = true;
            });
	        document.getElementById('carb-quantity').innerHTML = 0.00.toFixed(2)
            document.getElementById('protein-quantity').innerHTML = 0.00.toFixed(2)
            document.getElementById('fat-quantity').innerHTML = 0.00.toFixed(2)
            document.getElementById('carb-calories').innerHTML = 0.00.toFixed(2)
            document.getElementById('protein-calories').innerHTML = 0.00.toFixed(2)
            document.getElementById('fat-calories').innerHTML = 0.00.toFixed(2)
            document.getElementById('total-cal').innerHTML = 0.00.toFixed(2)
        }
    </script>
@endsection
