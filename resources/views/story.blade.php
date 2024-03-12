@extends('layouts.menu')
@section('title', 'GFS - Build Your Own Bowl')
@section('content')
    @php
        $arr = [
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg',
        ];
    @endphp
    <div>
        <div class="px-14 flex flex-row">
            <div class="basis-1/2 mx-1">
                <div class="py-4">
                    <span class="text-6xl font-semibold">Our Values</span>
                    <div class="flex flex-col py-4 space-y-2">
                        <img class="rounded-full border-8 border-black aspect-square min-w-72 max-w-72 mx-20"
                            src="https://thedaily9.in/wp-content/uploads/2023/01/Protein-shakes.jpg" />
                        <span class="text-2xl">We believe in one thing - <b>Eat Well, Live Better</b>
                        </span>
                        <span class="text-2xl">So, we promise to bring you only <b> Food Made Real</b>.</span>
                        <span class="text-2xl">Every day, we strive to curate healthy bowls which are delicious and
                            nutritious to
                            help improve your overall health and well-being.</span>
                    </div>
                </div>
            </div>
            <div class="basis-1/2">
                <div class="py-4 mx-1 flex flex-col space-y-3">
                    <div class="basis-1/2">
                        <span class="text-6xl font-semibold">Our Vision</span>
                        <div class="flex flex-row items-center space-x-6 py-4">
                            <img class="rounded-full border-8 border-black aspect-square min-w-72 max-w-72"
                                src="https://thedaily9.in/wp-content/uploads/2023/01/Protein-shakes.jpg" />
                            <span class="text-2xl items-center">Our local community sees
                                a significant improvement in their
                                physical, mental health & well-being.
                            </span>
                        </div>
                    </div>
                    <div class="basis-1/2">
                        <span class="text-6xl font-semibold">Our Mission</span>
                        <div class="flex flex-row items-center space-x-6 py-4">
                            <span class="text-2xl items-center">To establish a one-stop centre
                                in your neighbourhood
                                that provides healthy fast food, fitness training and mental health services.
                            </span>
                            <img class="rounded-full border-8 border-black aspect-square min-w-72 max-w-72"
                                src="https://thedaily9.in/wp-content/uploads/2023/01/Protein-shakes.jpg" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="px-14 flex flex-col">
            <div class="basis-1/2 mx-1">
                <div class="py-4">
                    <span class="text-6xl font-semibold">Our Journey</span>
                    <div class="py-4">
                        <div class="mx-70 border-8 border-black">
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div class="grid gap-4">
                                    @foreach (array_slice($arr, 0, 3) as $v)
                                        <div>
                                            <img class="h-auto max-w-full rounded-lg" src="{{ asset($v) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="grid gap-4">
                                    @foreach (array_slice($arr, 3, 3) as $v)
                                        <div>
                                            <img class="h-auto max-w-full rounded-lg" src="{{ asset($v) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="grid gap-4">
                                    @foreach (array_slice($arr, 6, 3) as $v)
                                        <div>
                                            <img class="h-auto max-w-full rounded-lg" src="{{ asset($v) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="grid gap-4">
                                    @foreach (array_slice($arr, 9, 3) as $v)
                                        <div>
                                            <img class="h-auto max-w-full rounded-lg" src="{{ asset($v) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
