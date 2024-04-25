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
        <div class="fixed right-2 bottom-2 flex flex-col items-center">
            <div id="nut-table" class="hidden">
                <table class="table-auto bg-gray-200">
                    <thead>
                        <tr class="bg-gray-200">
                            <td>
                                Item
                            </td>
                            <td>
                                Quantity (g)
                            </td>
                            <td>
                                Protein (g)
                            </td>
                            <td>
                                Carbs (g)
                            </td>
                            <td>
                                Fat (g)
                            </td>
                            <td>
                                Calorie (kcal)
                            </td>
                        </tr>
                    </thead>
                    <!-- <thead>
                        <tr class="bg-gray-200">
                            <td>
                                Nutrition
                            </td>
                            <td>
                                Quantity (g)
                            </td>
                            <td>
                                Calories (kcal)
                            </td>
                        </tr>
                    </thead> -->
                    <tbody id='nut-tbody'>

                    </tbody>
                    <!-- <tbody id="nut-tbody">
                        <tr>
                            <td>
                                Carbs
                            </td>
                            <td id="carb-quantity">
                                0.00
                            </td>
                            <td id="carb-calories">
                                0.00
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Protein
                            </td>
                            <td id="protein-quantity">
                                0.00
                            </td>
                            <td id="protein-calories">
                                0.00
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Fat
                            </td>
                            <td id="fat-quantity">
                                0.00
                            </td>
                            <td id="fat-calories">
                                0.00
                            </td>
                        </tr>
                    </tbody> -->
                </table>
            </div>
            <div class="transition-transform transform origin-bottom-right cursor-pointer" onclick="toggleCal(this)">
                <span class="font-bold text-3xl text-white bg-black px-4 py-1" id="click-me">Click me</span>
                <img class="max-h-36 mt-5" id="cal-img" src="https://cdn-icons-png.freepik.com/512/5223/5223103.png" />
            </div>
        </div>
        <div class="flex flex-col">
            @foreach ($arr as $k => $v)
                <div class="py-4">
                    <span class="text-xl md:text-4xl lg:text-6xl font-semibold">{{$v['title']}}</span>
                    <div class="flex mt-4 px-8 overflow-x-auto overflow-y-hidden w-full">
                        @foreach ($v['list'] as $ik => $li)
                            <div class="flex flex-col items-center min-w-24 md:min-w-44 lg:min-w-56 xl:min-w-64 mx-8">
                                <img class="rounded-full border-8 border-black aspect-square w-full" src="{{ asset($li['img']) }}" />
                                <span class="text-base md:text-xl lg:text-3xl whitespace-nowrap">{{$li['name']}}</span>
                                <span class="text-base md:text-xl lg:text-3xl">({{$li['kcal']}} kcal)</span>
                            </div>
                            <div class="wheel inline-block align-middle hidden mr-6">
                                <div id="acw-{{$k.'-'.$ik}}" class="counter">0</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript">
        var arr = @json($arr);
        const elementList = document.querySelectorAll("[id^='acw']");
        elementList.forEach(element => {
            var counter = new Counter(element.id);
            counter.options.inverted = true;
        });

        function toggleCal(e){
            const wheelList = document.querySelectorAll("[class^='wheel']");
            e.classList.toggle('scale-50');
            e.classList.toggle('bottom-0');
            e.classList.toggle('right-0');
            wheelList.forEach(element => {
                element.classList.toggle("hidden")
            });

            document.getElementById('nut-table').classList.toggle("hidden")
        }
    </script>
@endsection
