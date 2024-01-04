<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// import Facades DB
use Illuminate\Support\Facades\DB;
// import Hash untuk enskripsi
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // kode ini untuk input data ke tabel user
        DB::table("users")->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=> Hash::make('admin123'),
            'role'=> 'admin',
            'avatar'=> 'default_avatar.jpg',
        ]);
        DB::table("users")->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password'=> Hash::make('user123'),
            'role'=> 'user',
            'avatar'=> 'default_avatar.jpg',
        ]);
    }
}
