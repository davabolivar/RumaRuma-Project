<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto flex flex-col justify-center pt-[66px] items-center">
            <h1 class="text-5xl font-medium text-center">Furniture For <br>
                Your Dream House
            </h1>
            <p class="mt-4 font-medium text-sm text-center">Find your way to the good living with out furniture!</p>
            @if(Auth::user())
                <form action="{{ route('user/search') }}" method="POST">
                    @csrf
                    <div class="bg-[#C69B7B]/50 flex rounded-full py-[6px] px-3 w-[424px] mt-[30px] justify-between items-center">
                        <input type="text" name="search" class="bg-transparent border-0 rounded-full w-full font-medium text-black" placeholder="Office Chair">
                        <button class="bg-white px-[21px] py-[10px] w-[95px] ml-4 rounded-full">
                            <p class="text-center font-medium">Search</p>
                        </button>
                    </div>
                </form>
            @else
            <div class="bg-[#C69B7B]/50 flex rounded-full py-[6px] px-3 w-[424px] mt-[30px] justify-between items-center">
                <p class="pl-5 font-medium">Office Chair</p>
                <div class="bg-white px-[21px] py-[10px] w-[95px] rounded-full">
                    <a href="{{ route('login') }}"><p class="text-center font-medium">Search</p></a>
                </div>
            </div>
            @endif
        </div>
    </x-slot>

    <div class="pt-[125px] max-w-5xl mx-auto">
        <div class="flex space-x-4">
            @if($data)
                @foreach ($data as $barang)
                <div class="space-y-2">
                    <img src="/barangImage/{{ $barang->image }}" alt="">
                    <p class="font-medium text-sm">
                        <span class="font-bold">{{ $barang->name }}</span><br>
                        {{ $barang->category }} <br>
                        Rp {{ $barang->price }}
                        @if(Auth::user())
                        <button class="bg-[#C69B7B] w-full py-1 rounded-lg mt-2 hover:bg-[#b48f72] transition-colors">
                            <a href="{{ route('productdetail', $barang->id) }}"><p class="text-white text-center font-bold text-base">Buy Here</p></a>
                        </button>
                        @else
                            <button class="bg-[#9e9d9c] w-full py-1 rounded-lg mt-2 hover:bg-[#777777] transition-colors">
                                <a href="{{ route('login') }}"><p class="text-white text-center font-bold text-base">Buy Here</p></a>
                            </button>
                        @endif
                    </p>
                </div>
                @endforeach
        </div>
        <div class="flex space-x-20 mt-10">
                @foreach ($data2 as $barang2)
                <div class="space-y-2">
                    <img src="/barangImage/{{ $barang2->image }}" alt="">
                    <p class="font-medium text-sm">
                        <span class="font-bold">{{ $barang2->name }}</span><br>
                        {{ $barang2->category }} <br>
                        Rp {{ $barang2->price }}
                        @if(Auth::user())
                        <button class="bg-[#C69B7B] w-full py-1 rounded-lg mt-2 hover:bg-[#b48f72] transition-colors">
                            <a href="{{ route('productdetail', $barang2->id) }}"><p class="text-white text-center font-bold text-base">Buy Here</p></a>
                        </button>
                        @else
                            <button class="bg-[#9e9d9c] w-full py-1 rounded-lg mt-2 hover:bg-[#777777] transition-colors">
                                <a href="{{ route('login') }}"><p class="text-white text-center font-bold text-base">Buy Here</p></a>
                            </button>
                        @endif
                    </p>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="mt-[62px] mitra h-[450px] pt-[125px]">
        <div class="flex-col">
            <h1 class="text-center font-bold text-2xl">Ingin Bermitra dengan kami</h1>
            <h2 class="text-center text-lg pt-3">
                Kami membuka peluang kepada para pengrajin furniture lokal agar dapat menjual <br>
                produk mereka dikancah internasional
            </h2>
            <div class="bg-[#C69B7B] py-4 rounded-lg w-[300px] mt-6 mx-auto cursor-pointer hover:bg-[#b48f72] transition-colors">
                <p class="text-white text-center font-bold">Pelajari lebih lanjut</p>
            </div>
        </div>
    </div>

</x-app-layout>
