@extends('layouts.menu')
@section('title', 'GFS - Contact Us')
@section('content')
    @php
        $arr = ['https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg', 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg'];
    @endphp
    <div class="sm:px-14 relative">
        <div class="pt-5 text-center md:text-left">
            <span class="text-6xl font-semibold">Our Outlets</span>
        </div>
        <div class="py-4 grid gap-10 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-10">
            @foreach ($outlets as $key => $outlet)
                <div class="grid gap-5 lg:grid-cols-2">
                    <div class="w-56 basis-2/5 self-center justify-self-center">
                        {{-- <img class="rounded-full border-8 border-black aspect-square object-cover" src="{{ $outlet->photo->getUrl() ?? '' }}" /> --}}
                        <div class="inline-block bg-black rounded-full p-2">
                            <img class="rounded-full border-black aspect-square object-cover w-full" src="{{ $outlet->photo->getUrl() ?? '' }}" />
                        </div>
                    </div>
                    <div class="flex flex-col basis-3/5 text-center lg:text-left gap-3">
                        <div class="text-2xl font-bold px-2 md:px-0">{{ $outlet->name }}</div>
                        <span class="text-md px-2 md:px-0">
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
                        <div class="outlet-gmap-wrapper">
                            {!! $outlet->embed_map_url !!}
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="grid gap-5 lg:grid-cols-2">
                <div class="w-56 basis-2/5 self-center justify-self-center">
                    <img class="rounded-full border-8 border-black aspect-square object-cover" src="/images/outlet_imgs/outlet2.png" />
                </div>
                <div class="flex flex-col basis-3/5 text-center lg:text-left gap-3">
                    <div class="text-2xl font-bold whitespace-nowrap">Guilt Free Society +</div>
                    <span class="text-md">
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
        <div class="flex flex-col mt-2">
            <div class="basis-1/2">
                <div class="py-4">
                    <div class="text-center md:text-left">
                        <span class="text-6xl font-semibold ">Help Us Improve</span>
                    </div>
                    <div class="py-4">
                        <div class="rounded-lg border-black md:mx-70 md:border-8">
                            <iframe class="w-full" src="{{ $link }}?embedded=true" width="900" height="606" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
