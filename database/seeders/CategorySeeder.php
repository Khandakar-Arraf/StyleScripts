<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Create some sample categories
        $categories = [
            [
                'title' => 'Student',
                'description' => 'Category for Students',
                'image' => 'student.jpg',
                'order' => 1,
            ],
            [
                'title' => 'Teaching',
                'description' => 'Category for Teaching',
                'image' => 'teaching.jpg',
                'order' => 2,
            ],
            [
                'title' => 'Unemployed',
                'description' => 'Category for Unemployed',
                'image' => 'unemployed.jpg',
                'order' => 3,
            ],
            [
                'title' => 'Fashion Designer',
                'description' => 'Category for Fashion Designers',
                'image' => 'fashion.jpg',
                'order' => 4,
            ],

        ];

        // Insert the categories into the database
        Category::insert($categories);
    }
}
