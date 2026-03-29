<?php

namespace Database\Seeders;

use App\Http\Enums\UserType;
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
            "email" => "user@example.com",
        ], [
            "name" => UserType::CUSTOMER->value,
            "password" => Hash::make("password")
        ]);
    }
}
