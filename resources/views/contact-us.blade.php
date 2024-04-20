@extends('layouts.menu')
@section('title', 'GFS - Contact Us')
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
    <div class="px-14 relative">
        <div class="flex flex-row pt-5">
            <span class="text-6xl font-semibold">Our Outlets</span>
        </div>
        <div class="py-4 grid gap-10 lg:grid-cols-2 lg:gap-5">
            @foreach ($outlets as $key => $outlet)
                <div class="grid gap-5 lg:grid-cols-2">
                    <div class="min-w-44 max-w-64 basis-2/5 self-center">
                        @if ($outlet->photo)
                            <img class="rounded-full border-8 border-black aspect-square" src="{{ $outlet->photo->getUrl() }}" />
                        @else
                            <img class="rounded-full border-8 border-black aspect-square" src=""/>
                        @endif
                    </div>
                    <div class="flex flex-col basis-3/5">
                        <div class="text-2xl items-center font-bold">{{ $outlet->name }}</div>
                        <span class="text-md items-center mt-2">
                            <div>
                                {{ $outlet->address }}
                            </div>
                            <div>
                                {{ $outlet->business_hour }}
                            </div>
                            <div>
                                {{ $outlet->contact_no }}
                            </div>
                        </span>
                        {!! $outlet->embed_map_url !!}
                    </div>
                </div>
            @endforeach
            {{-- <div class="grid gap-5 lg:grid-cols-2">
                <div class="min-w-44 max-w-64 basis-2/5 self-center">
                    <img class="rounded-full border-8 border-black aspect-square" src="/images/outlet_imgs/outlet2.png" />
                </div>
                <div class="flex flex-col basis-3/5">
                    <div class="text-2xl items-center font-bold whitespace-nowrap">Guilt Free Society +</div>
                    <span class="text-md items-center mt-2">
                        <div>
                            The Walk, Riverson
                            Jln Riverson 1, 88000 Kota Kinabalu
                        </div>
                        <div>
                            11am-8pm Mon-Sat
                        </div>
                        <div>
                            012-863 9907
                        </div>
                    </span>
                    <iframe
                        class="w-full mt-2"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.190645087209!2d116.06473229999999!3d5.9684611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x323b69c09afe39a5%3A0x6525f0594b05431d!2sRiverson%20The%20Walk!5e0!3m2!1sen!2smy!4v1710254621779!5m2!1sen!2smy"
                        width="360" height="240" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div> --}}
        </div>
        <div class="flex flex-col">
            <div class="basis-1/2 mx-1">
                <div class="py-4">
                    <span class="text-6xl font-semibold">Help Us Improve</span>
                    <div class="py-4">
                        <div class="mx-70 border-8 rounded-lg border-black">
                            <iframe
                                class="w-full"
                                src="{{ $link }}?embedded=true"
                                width="900" height="606" frameborder="0" marginheight="0"
                                marginwidth="0">Loading…</iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
