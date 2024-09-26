<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Strategic marketing',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Investment Planning',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Insights & analytics',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Business consulting',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
                        
        ));
    }
}
