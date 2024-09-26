<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name'              => "Fatemeh Ghorayshi",
            'email'             => 'admin@example.com',
            'user_type'         => 'admin',
            'email_verified_at' => now(),
            'mobile'            => "09117754416",
            'password'          => Hash::make('11111111'),
        ]);

        User::create([
            'name'              => "Fatemeh Ghorayshi",
            'email'             => 'user@example.com',
            'user_type'         => 'user',
            'email_verified_at' => now(),
            'mobile'            => "09117754417",
            'password'          => Hash::make('11111111'),
        ]);
    }
}
