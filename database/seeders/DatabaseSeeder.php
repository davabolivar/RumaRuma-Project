<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    
        User::create([
            'name' => 'admin',
            'email' => 'admin1@admin.com',
            'phone' => '081330229959',
            'role' => 'Admin',
            'password' => Hash::make('Admin123')
        ]);

        User::create([
            'name' => 'user',
            'email' => 'anon1@anon.com',
            'phone' => '08123456789',
            'role' => 'User',
            'password' => Hash::make('anon123')
        ]);

        $this->call([
            BarangSeeder::class,
        ]);
    }
}
