<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategoriesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('blog_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Business Solution',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Marketing Planning',
                'status' => 1,
                'created_at' => '2024-05-21 09:29:46',
                'updated_at' => '2024-05-23 12:16:28',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'SEO Consulting',
                'status' => 1,
                'created_at' => '2024-05-21 09:30:58',
                'updated_at' => '2024-05-21 09:30:58',
            ),
        ));
    }
}
