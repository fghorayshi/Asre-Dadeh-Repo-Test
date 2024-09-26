<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('blogs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'blog_category_id' => 1,
                'title' => 'Modern Methods For Improving Drupal’s Larges awt Contentful Paint Core Web Vital',
                'slug' => 'modern-methods-for-improving-drupal-s-larges-awt-contentful-paint-core-web-vital',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'blog_category_id' => 1,
                'title' => 'Marketing your area business downturn now a days',
                'slug' => 'marketing-your-area-business-downturn-now-a-days',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'blog_category_id' => 1,
                'title' => 'Improving The Double Diamond Design Process',
                'slug' => 'improving-the-double-diamond-design-process',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'blog_category_id' => 1,
                'title' => 'Revealing Images With CSS Mask Animations',
                'slug' => 'revealing-images-with-css-mask-animations',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'status' => 1,
                'created_at' => '2024-02-29 12:13:56',
                'updated_at' => '2024-03-11 13:25:32',
            ),
                        
        ));
    }
}
