<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'name' => 'ELMATADORE',
            'category' => 'Kursi',
            'price' => 12999000,
            'stock' => 100,
            'description' => 'sofa set, light brown, 285x200 cm',
            'image' => 'Kursi/pict1.png'
        ]);

        Barang::create([
            'name' => 'REXWEE',
            'category' => 'Kursi',
            'price' => 10999000,
            'stock' => 100,
            'description' => 'Kursi Kecil, White',
            'image' => 'Kursi/pict2.png'
        ]);

        Barang::create([
            'name' => 'TINWY',
            'category' => 'Kursi',
            'price' => 9999000,
            'stock' => 100,
            'description' => 'Kursi Kecil, Brown',
            'image' => 'Kursi/pict3.png'
        ]);

        Barang::create([
            'name' => 'KURS',
            'category' => 'Kursi',
            'price' => 11999000,
            'stock' => 100,
            'description' => 'Kursi Kecil, Black',
            'image' => 'Kursi/pict9.png'
        ]);

        Barang::create([
            'name' => 'TABEL',
            'category' => 'Meja',
            'price' => 12999000,
            'stock' => 100,
            'description' => 'Meja Kecil, Brown',
            'image' => 'Meja/pict5.png'
        ]);

        Barang::create([
            'name' => 'DEKSO',
            'category' => 'Meja',
            'price' => 14999000,
            'stock' => 100,
            'description' => 'Meja Rias, Brown',
            'image' => 'Meja/pict6.png'
        ]);

        Barang::create([
            'name' => 'LAMPON',
            'category' => 'Lampu',
            'price' => 899000,
            'stock' => 100,
            'description' => 'Lampu, Bronze',
            'image' => 'Lampu/pict7.png'
        ]);
    }
}
