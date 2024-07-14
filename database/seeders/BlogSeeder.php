<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        // Create some sample blog entries
        $blogs = [
            [
                'title' => '10 Fashion Tips for a Stylish Wardrobe',
                'subtitle' => 'Learn how to elevate your fashion game',
                'description' => 'Discover the top fashion tips and tricks to level up your wardrobe and style. Whether you are dressing for a special occasion or your everyday look, these tips will help you look and feel your best.',
                'status' => 1,
                'image' => '1693737512.jpg',
                'created_at' => '2023-09-03 16:37:32',
                'updated_at' => '2023-09-03 16:38:32',
            ],
            [
                'title' => 'The Art of Accessorizing',
                'subtitle' => 'Complete your look with the perfect accessories',
                'description' => 'Unlock the secrets of accessorizing and take your fashion game to the next level. Learn how to choose and style accessories that complement your outfits and express your unique style.',
                'status' => 1,
                'image' => '1693737490.png',
                'created_at' => '2023-09-03 16:37:32',
                'updated_at' => '2023-09-03 16:38:10',
            ],

        ];

        // Insert the blog entries into the database
        Blog::insert($blogs);
    }
}
