<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-center pt-20">
            <img src="{{ asset('assets/images/pict11.png') }}" class="w-[322px]" alt="">
        </div>
    </x-slot>

    <div class="flex flex-col justify-center aligns-center pb-40">
        <h1 class="font-bold text-[32px] text-center mt-[50px]">Thank You For Buying Our Product</h1>
        <h2 class="mt-4 text-base text-center">Use RumaRuma to found your best furniture <br>
            for you.
        </h2>
        <button class="mt-6 bg-[#C69B7B] w-[180px] py-2 rounded-2xl mx-auto hover:bg-[#b48f72] transition-colors">
            <p class="text-white text-center font-bold">Done</p>
        </button>
    </div>

</x-app-layout>