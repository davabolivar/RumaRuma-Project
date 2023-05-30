@extends('layouts.admin')

@section('content')

    <div class="flex pt-20 max-w-6xl mx-auto space-x-4 pb-20">
        <div class="flex flex-col w-full bg-white pt-14 px-11 pb-8 rounded-2xl">
            <div class="flex justify-between">
                <h1 class="text-3xl font-bold">Add Barang</h1>
            </div>
            <div class="mt-16">
                <form action="{{ route('admin/add/barang') }}" method="POST" id="barangform" class="flex flex-col" enctype="multipart/form-data">
                    @csrf
                    <label for="Name" class="font-bold text-lg">Nama Barang</label>
                    <input type="text" name="name" class="mt-4 border border-[#C69B7B] rounded-xl px-4 py-4" placeholder="Input nama barang" required>
                    <label for="Kategori" class="mt-4 font-bold text-lg">Kategori Barang</label>
                    <input type="text" name="category" class="mt-4 border border-[#C69B7B] rounded-xl px-4 py-4" placeholder="Input kategori barang" required>
                    <label for="Price" class="mt-4 font-bold text-lg">Harga Barang</label>
                    <div class="flex items-center mt-4">
                        <p class="mr-4 font-semibold text-lg">Rp.</p> 
                        <input type="number" name="price" class="border border-[#C69B7B] rounded-xl px-4 py-4" placeholder="000,00" required>
                    </div>
                    <label for="Stock" class="mt-4 font-bold text-lg">Stock Barang</label>
                    <div class="flex items-center mt-4">
                        <input type="number" name="stock" class="border border-[#C69B7B] rounded-xl px-4 py-4" placeholder="000" required>
                        <p class="ml-4 font-semibold text-lg">Qty</p> 
                    </div>
                    <label for="Desc" class="mt-4 font-bold text-lg">Deskripsi Barang</label>
                    <textarea name="description" id="barangform" class="h-[200px] border border-[#C69B7B] rounded-xl px-4 py-4 mt-4" placeholder="Input barang description"></textarea>
                    <label for="Picture" class="mt-4 font-bold text-lg">Gambar Barang</label>
                    <input type="file" name="picture" class="mt-4" accept="image/*,.pdf">
                    <button class="mt-10 bg-[#C69B7B] py-4 text-center font-bold text-2xl text-white rounded-2xl hover:bg-[#b48f72]">
                        Save Barang
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection