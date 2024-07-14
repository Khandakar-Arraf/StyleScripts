<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $university = ['Harvard','MIT','Greenwich','University of Sussex','Westminster','Troy University'];

        for ($i = 12; $i <= 51; $i++) {
            DB::table('customer_information')->insert([
                'user_id' => $i,
                'image' => 'customer.png',
                'file' => '1684483679_file.jpg',
                'birthday' => $faker->date(),
                'address' => $faker->address(),
                'current_class' => $faker->randomElement(['Hsc', 'SSC']),
                'current_school' => array_rand($university),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
