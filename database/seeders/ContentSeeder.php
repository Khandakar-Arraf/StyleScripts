<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            'website_name' => 'StyleScript', // Updated website name
            'website_description' => 'Your Ultimate Fashion Destination',
            'website_logo' => '1693727758.png',
            'website_favicon' => '1693727758.png',
            'website_email' => 'info@stylescript.com', // Updated email
            'website_phone' => '1234567890',
            'website_address' => '123 Fashion Street, City Name',
            'about_content' => 'StyleScript is your premier online fashion destination. We bring together designers, customers, and instructors in a vibrant fashion community. Our platform allows you to explore the latest fashion trends, purchase unique designer products, and even customize your own fashion pieces. Whether you\'re a designer looking to showcase your creations, a customer searching for the perfect outfit, or an instructor sharing your fashion expertise, StyleScript has something for everyone.', // Updated about content
            'about_image' => 'fashion_about.jpg', // Updated about image
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
