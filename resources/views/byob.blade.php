@extends('layouts.menu')
@section('title', 'GFS - Build Your Own Bowl')
@section('content')
    @php
        $arr = [];
        foreach ($ingredientCategories as $categoryIndex => $category) {
            array_push($arr, ['title' => $category->name, 'list' => []]);
            foreach ($category->ingredients as $ingredientIndex => $ingredient) {
                array_push($arr[$categoryIndex]['list'], ['name' => $ingredient->name, 'kcal' => $ingredient->calories, 'protein' => $ingredient->protein, 'fat' => $ingredient->fat, 'carbs' => $ingredient->carbohydrate]);
            }
        }
    @endphp
    <div class="px-3 sm:px-14 relative mb-20">

        <div class="flex flex-col">
            @foreach ($ingredientCategories as $categoryIndex => $category)
                <div class="py-4">
                    <span class="text-xl md:text-4xl lg:text-6xl font-semibold">{{ $category->name }}</span>
                    <div class="flex mt-4 mx-3 px-4 overflow-x-auto overflow-y-hidden w-full no-scrollbar">
                        @foreach ($category->ingredients as $ingredientIndex => $ingredient)
                            <div class="flex flex-col items-center min-w-24 md:min-w-44 lg:min-w-56 xl:min-w-64 md:ml-12 mx-4">
                                <img class="rounded-full border-4 lg:border-8 border-black aspect-square w-full" src="{{ $ingredient->photo->thumbnail }}" />
                                <span class="text-base md:text-xl lg:text-3xl whitespace-nowrap mt-3">{{ $ingredient->name }}</span>
                                <span class="text-base md:text-xl lg:text-3xl">({{ $ingredient->calories }} kcal)</span>
                            </div>
                            <div class="wheel-outline mt-6 mr-4 transform duration-300 scale-0">
                                <div id="acw-{{ $categoryIndex . '-' . $ingredientIndex }}" class="counter w-8 md:w-10 lg:w-12 h-11 md:h-14 lg:h-20">0</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="fixed right-5 bottom-4 flex flex-col items-center">
            <div id="nut-table" class="transform transition-transform duration-300 origin-bottom scale-0">
                <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden pr-3">
                    <thead class="bg-black">
                        <tr class="text-white">
                            <th class="px-4 py-2">Nutrition</th>
                            <th class="px-4 py-2">Quantity (g)</th>
                            <th class="px-4 py-2 flex justify-between items-center">
                                Calories (kcal)
                                <span class="ml-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke="currentColor" class="w-6 h-6 cursor-pointer ml-3 text-gray-500 hover:text-gray-700" onclick="toggleCalR()">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </th>

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

                            <td class="px-4 py-2">Total</td>
                            <td id="total-quantity" class="px-4 py-2">0</td>
                            <td class="px-4 py-2 flex justify-between items-center">
                                <span id="total-cal">0</span>
                                <button class="btn bg-[#027148] hover:bg-green-500 text-white font-bold py-2 px-4 rounded m-2" onclick="reset()">
                                    Reset
                                </button>
                            </td>
                 
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="ml-auto transform transition-transform duration-300 origin-bottom cursor-pointer" id="click-me" onclick="toggleCal(this)">
                <span class="font-bold text-xs md:text-sm lg:text-base text-white bg-black px-2 py-1">Click me</span>
                <img class="mx-auto max-h-10 md:max-h-14 lg:max-h-20 mt-2" id="cal-img" src="https://cdn-icons-png.freepik.com/512/5223/5223103.png" />
            </div>
        </div>

  
    </div>
    <script type="text/javascript">
        var arr = @json($arr);
        var carbMultiplier = @json(config('settings.carbohydrate_multiplier'));
        var proteinMultiplier = @json(config('settings.protein_multiplier'));
        var fatMultiplier = @json(config('settings.fat_multiplier'));
        const elementList = document.querySelectorAll("[id^='acw']");
        elementList.forEach(element => {
            var counter = new Counter(element.id);
            counter.options.inverted = true;
        });

        function toggleCal(e) {
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

        function toggleCalR() {
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

        function reset() {
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
            document.getElementById('total-quantity').innerHTML = 0.00.toFixed(2)
            document.getElementById('total-cal').innerHTML = 0.00.toFixed(2)
        }
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
