@extends('layouts.menu')
@section('title', 'GFS - Build Your Own Bowl')
@section('content')
@php
$arr = [];
foreach ($ingredientCategories as $categoryIndex => $category) {
array_push($arr, ['title' => $category->name, 'list' => []]);
foreach ($category->ingredients as $ingredientIndex => $ingredient) {
array_push($arr[$categoryIndex]['list'], ['name' => $ingredient->name, 'kcal' => $ingredient->calories, 'protein' => $ingredient->protein / 100 * $ingredient->quantity, 'fat' => $ingredient->fat / 100 * $ingredient->quantity, 'carbs' => $ingredient->carbohydrate / 100 * $ingredient->quantity]);
}
}
@endphp
<div class="px-3 sm:px-14 relative mb-20">
    <div class="flex flex-col">
        @foreach ($ingredientCategories as $categoryIndex => $category)
        <div class="py-4 relative">
            <span class="text-xl md:text-4xl lg:text-6xl font-semibold">{{ $category->name }}</span>
            <div class="flex mt-4 overflow-x-auto overflow-y-hidden w-full no-scrollbar">
                @foreach ($category->ingredients as $ingredientIndex => $ingredient)
                <div class="flex flex-col items-center min-w-24 max-w-24 md:min-w-44 md:max-w-44 lg:min-w-56 lg:max-w-56 xl:min-w-64 xl:max-w-64 ml-8 md:ml-8 mr-3 md:mr-8 lg:mr-10 xl:mr-12 text-ellipsis select-none">
                    <img class="rounded-full border-4 lg:border-8 border-black aspect-square w-full pointer-events-none select-none" src="{{ url($ingredient->photo->getUrl()) }}" />
                    <span class="text-base md:text-xl lg:text-3xl whitespace-nowrap mt-3 truncate max-w-32 md:max-w-56 lg:max-w-72 xl:max-w-80">{{ $ingredient->name }}</span>
                    <span class="text-base md:text-xl lg:text-3xl">({{ $ingredient->calories / 100 * $ingredient->quantity }} kcal)</span>
                </div>
                <div class="wheel-outline mt-6 sm:mt-16 md:mt-16 lg:mt-20 md:mr-4 transform duration-300 scale-0 hidden">
                    <div id="acw-{{ $categoryIndex . '-' . $ingredientIndex }}" class="counter w-8 md:w-10 lg:w-12 h-11 md:h-14 lg:h-20">0</div>
                </div>
                @endforeach
            </div>
            <div class="absolute top-1/2 -left-1 md:-left-5 transform -translate-y-1/2 bg-white rounded-full p-2 cursor-pointer shadow-lg left-arrow" id="left-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 md:w-6 md:h-6 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </div>
            <div class="absolute top-1/2 -right-1 md:-right-5 transform -translate-y-1/2 bg-white rounded-full p-2 cursor-pointer shadow-lg right-arrow" id="right-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 md:w-6 md:h-6 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- <div class="z-20 fixed right-0 bottom-0 md:right-5 md:bottom-16 flex flex-col items-center cursor-move">
    <!-- nutriention table -->
    <div class="ml-auto transform transition-transform duration-300 origin-bottom cursor-pointer" id="click-me" onclick="toggleCal(this)">
        <span class="font-bold text-xs md:text-sm lg:text-base text-white bg-black px-2 py-1">Click me</span>
        <img class="mx-auto max-h-10 md:max-h-14 lg:max-h-20 mt-2" id="cal-img" src="https://cdn-icons-png.freepik.com/512/5223/5223103.png" />
    </div>
</div> --}}

<div id="floating-button" class="group fixed bottom-0 md:bottom-0 right-0 md:right-4 p-2 flex items-end justify-end">
    <!-- nutriention table -->
    <div id="nut-table" class="right-0 bottom-0 transform transition-transform duration-300 origin-bottom hidden absolute cursor-move">
        <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden pr-3">
            <thead class="bg-black">
                <tr>
                    <td colspan="3" class="text-white text-center">
                        Scroll / Drag the spinner to calculate calories
                    </td>
                </tr>
                <tr class="text-white">
                    <th class="px-4 py-2">Nutrition</th>
                    <th class="px-4 py-2">Quantity (g)</th>
                    <th class="px-4 py-2 flex justify-between items-center">
                        Calories (kcal)
                        <span class="ml-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="3" stroke="currentColor" id="down-btn" class="w-6 h-6 cursor-pointer ml-3 text-gray-500 hover:text-gray-700">
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
                        <button id="reset-btn" class="btn bg-[#027148] hover:bg-green-500 text-white font-bold py-2 px-4 rounded m-2">
                            Reset
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="click-me" class="bg-black rounded-full w-16 h-16 m-4 flex items-center justify-center cursor-pointer shadow-xl animate-bounce">
        <i class="fab fa-nutritionix text-white text-4xl"></i>
    </div>
</div>
<script type="text/javascript">
    var arr = @json($arr);
    var counters = [];
    var carbMultiplier = @json(config('settings.carbohydrate_multiplier'));
    var proteinMultiplier = @json(config('settings.protein_multiplier'));
    var fatMultiplier = @json(config('settings.fat_multiplier'));
    const elementList = document.querySelectorAll("[id^='acw']");
    elementList.forEach(element => {
        var counter = new Counter(element.id);
        counter.options.inverted = true;
        counters.push(counter);
    });

    function toggleCal(e) {
        const wheelList = document.querySelectorAll("[class^='wheel-outline']");
        wheelList.forEach(element => {
            element.classList.toggle('hidden');
            element.classList.toggle("scale-0")
        });
        e.classList.toggle('scale-0');
        setTimeout(() => {
            e.classList.toggle('hidden');
            document.getElementById('nut-table').classList.toggle("hidden")
        }, 300);
    }

    function toggleCalR() {
        const wheelList = document.querySelectorAll("[class^='wheel-outline']");
        document.getElementById('nut-table').classList.toggle('hidden');
        setTimeout(() => {
            document.getElementById('click-me').classList.toggle("hidden")
        }, 300);
        setTimeout(() => {
            document.getElementById('click-me').classList.toggle("scale-0")
        }, 400);
        wheelList.forEach(element => {
            element.classList.toggle('hidden');
            element.classList.toggle("scale-0")
        });
    }

    function reset() {
        const elementList = document.querySelectorAll("[id^='acw']");
        elementList.forEach(element => {
            var counterToReset = counters.find(counter => counter.DOM.counter.id === element.id);
            counterToReset.setPos(0)
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

    document.querySelectorAll('.left-arrow').forEach(arrow => {
        arrow.addEventListener('click', function() {
            this.parentElement.querySelector('.overflow-x-auto').scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });
    });

    document.querySelectorAll('.right-arrow').forEach(arrow => {
        arrow.addEventListener('click', function() {
            this.parentElement.querySelector('.overflow-x-auto').scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        });
    });

    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('reset-btn').addEventListener('click', reset);
        document.getElementById('down-btn').addEventListener('click', toggleCalR);
        document.getElementById('click-me').addEventListener('click', function() {
            toggleCal(this);
        });
    });
</script>
<script>
    // To make sure calculator icon display above the footer
    document.addEventListener('scroll', function() {
        const footer = document.querySelector('footer');
        const floatingButton = document.getElementById('floating-button');
        const footerRect = footer.getBoundingClientRect();
        const buttonRect = floatingButton.getBoundingClientRect();

        // Check if the button overlaps with the footer
        if (footerRect.top <= window.innerHeight && footerRect.bottom >= window.innerHeight) {
            floatingButton.style.bottom = `${footerRect.height + 6}px`;
        } else {
            floatingButton.style.bottom = '8px';
        }
    });
</script>
<script src="{{ asset('js/draggable.js') }}"></script>
<script src="{{ asset('js/gsap.js') }}"></script>
<script>
    // const page = document.getElementById('page'),
    wrapper = document.getElementById('wrapper'),
        modal = document.getElementById('nut-table'),
        //   reset = document.getElementById('reset'),
        initialX = -50,
        initialY = -50;

    const resetModalPosition = () => {
        TweenLite.to(
            modal,
            0.6, {
                ease: Power3.easeOut,
                x: 0,
                y: 0,
                xPercent: initialX,
                yPercent: initialY,
            }
        );
        //   reset.disabled = true;
    }

    Draggable.create(
        modal, {
            type: 'x,y',
            bounds: wrapper,
            edgeResistance: 0.85,
            inertia: false,
            throwResistance: 3000,
            // onPressInit: function() {
            //   page.classList.add('bg-violet-900');
            // },
            // onRelease: function() {
            //   page.classList.remove('bg-violet-900');
            // },
            onDrag: function() {
                const x = gsap.getProperty(this, 'x'),
                    y = gsap.getProperty(this, 'y');

                //   if (x === 0 & y === 0) {
                //     reset.disabled = true;
                //   } else {
                //     reset.disabled = false;
                //   }
            },
        }
    );

    // reset.addEventListener('click', () => {
    //   resetModalPosition();
    // });

    window.addEventListener('resize', () => {
        resetModalPosition();
    });
</script>
@endsection