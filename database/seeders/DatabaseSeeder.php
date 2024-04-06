<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       
        $user =  User::factory()->create([
            'name' => 'Youssef Hihi',
            'email' => 'Youssef@example.com',
            'password' => '1234567890',
            'role' => 'admin',
        ]);

        // Insert admin record into admins table
        DB::table('admins')->insert([
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Genre::factory(10)->create();
        Author::factory(10)->create();

    }
}
