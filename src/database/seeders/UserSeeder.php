<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::firstOrCreate([
            "email" => "guest@yahoo.com",
        ], [
            "name" => "Guest",
            "password" => Hash::make("password")
        ]);
    }
}
