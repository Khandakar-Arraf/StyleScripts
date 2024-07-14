<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            [
                'title' => 'Fashion Design',
                'description' => 'Learn the art of fashion design and create your own clothing.',
                'image' => '1693738539.webp',
                'category_id' => 1,
                'order' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Textile Design',
                'description' => 'Explore the world of textile design and patterns.',
                'image' => '1693738512.jpg',
                'category_id' => 1,
                'order' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fashion Marketing',
                'description' => 'Understand the marketing strategies in the fashion industry.',
                'image' => '1693738371.webp',
                'category_id' => 1,
                'order' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more subjects as needed
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
