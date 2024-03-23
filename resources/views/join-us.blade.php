@extends('layouts.menu')
@section('title', 'GFS - Join Us')
@section('content')
    <div class="px-3 sm:px-14 relative">
        <div class="flex flex-row pt-5">
            <span class="text-6xl font-semibold mx-auto md:mx-0">Partner With Us</span>
        </div>
        <div class="py-5 gap-8 lg:grid lg:grid-cols-5">
            <div class="col-span-2 flex flex-col">
                <div class="grow flex flex-col justify-center">
                    <img class="rounded-full border-8 border-black aspect-square max-w-72 mx-auto"
                        src="https://placehold.co/600x600" />
                </div>
            </div>
            <div class="overflow-y-auto grid gap-5 mx-8 sm:mx-0 lg:col-span-3 lg:gap-8">
                <div class="flex flex-row gap-5">
                    <div class="basis-2/6 self-center hidden sm:block">
                        <img class="rounded-full border-8 border-black aspect-square max-w-52" src="https://placehold.co/600x600" />
                    </div>
                    <div class="flex flex-col justify-center sm:basis-4/6">
                        <div class="text-2xl items-center font-bold">Franchising</div>
                        <span class="text-md items-center mt-2">Interested in opening YOUR OWN GFS OUTLET?</span>
                    </div>
                </div>

                <div class="flex flex-row gap-5">
                    <div class="basis-2/6 self-center hidden sm:block">
                        <img class="rounded-full border-8 border-black aspect-square max-w-52" src="https://placehold.co/600x600" />
                    </div>
                    <div class="flex flex-col justify-center sm:basis-4/6">
                        <div class="text-2xl items-center font-bold">Physical & Mental Health</div>
                        <span class="text-md items-center mt-2">Are you a personal trainer, nutritionist, dietitian, Zumba instructor?</span>
                    </div>
                </div>

                <div class="flex flex-row gap-5">
                    <div class="basis-2/6 self-center hidden sm:block">
                        <img class="rounded-full border-8 border-black aspect-square max-w-52" src="https://placehold.co/600x600" />
                    </div>
                    <div class="flex flex-col justify-center sm:basis-4/6">
                        <div class="text-2xl items-center font-bold">Mental Health</div>
                        <span class="text-md items-center mt-2">Or are you a psychologist/psychology graduate, counsellor?</span>
                    </div>
                </div>

                <div class="flex flex-row gap-5">
                    <div class="basis-2/6 self-center hidden sm:block">
                        <img class="rounded-full border-8 border-black aspect-square max-w-52" src="https://placehold.co/600x600" />
                    </div>
                    <div class="flex flex-col justify-center sm:basis-4/6">
                        <div class="text-2xl items-center font-bold">Creative Ideas</div>
                        <span class="text-md items-center mt-2">Do you have creative ideas?</span>
                        <span class="text-md items-center mt-2">
                            Whatsapp us @ 016-451 3003<br>
                            E-mail us @ guiltfreesociety@gmail.com
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
