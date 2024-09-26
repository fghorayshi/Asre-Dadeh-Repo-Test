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
        $this->call([
            OAuthClientsSeeder::class,
            UsersSeeder::class,
            BlogCategoriesTableseeder::class,
            BlogTableseeder::class,
            ServiceTableseeder::class,
            CommentTableseeder::class,
        ]);
    }
}
