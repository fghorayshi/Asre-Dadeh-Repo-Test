<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'blog_id' => 1,
                'is_read' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'blog_id' => 1,
                'is_read' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'blog_id' => 1,
                'is_read' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ), 
        ));
    }
}
