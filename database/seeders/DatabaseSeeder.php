<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
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
            'avatar' => 'https://picsum.photos/500/200', // Example image URL
            'jenis_kelamin' => 'laki - laki',
            'tanggal_lahir' => Carbon::now(),
            'kelas' => 'X',
            'nis' => '##########', // Example 10-digit number
            'nik' => '############', // Example 13-digit number
            'alamat' => 'address'
        ]);

       
        Category::factory()->count(10)->create();
        Book::factory()->count(10)->create();
        Transaction::factory()->count(10)->create();
        Video::factory()->count(5)->create();
    }
}
