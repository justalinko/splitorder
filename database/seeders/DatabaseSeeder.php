<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'administrator',
            'email' => 'admin@admin.com',
            'level' => 'admin',
            'phone' => '123456789',
            'address' => 'admin address',
            'password' => bcrypt('admin'),
            'community_id' => 1,
            'max_production' => 1000
        ]);
        for($i=1;$i<=5;$i++){
        \App\Models\User::factory()->create([
            'name' => 'anggota'.$i,
            'email' => 'anggota'.$i.'@anggota.com',
            'level' => 'user',
            'phone' => '123456789',
            'address' => 'anggota address',
            'password' => bcrypt('anggota'),
            'community_id' => 1,
            'max_production' => 1000
        ]);
        }

        \App\Models\Community::factory()->create([
            'user_id' => 2,
            'name' => 'Komunitas Genteng Mantili',
            'address' => 'Jl. Genteng Mantili',
            'profile' => 'Komunitas Genteng Mantili'

        ]);
        \App\Models\Product::factory(20)->create();
        \App\Models\Order::factory(100)->create();
        \App\Models\Post::factory(20)->create();
    }
}
