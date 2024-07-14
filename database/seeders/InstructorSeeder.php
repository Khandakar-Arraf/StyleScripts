<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    public function run()
    {
        for ($i = 2; $i <= 11; $i++) {
            DB::table('instructor_information')->insert([
                'user_id' => $i,
                'image' => 'instructor.png',
                'file' => '1684483797_file.jpg',
                'birthday' => '1993-05-19',
                'address' => 'RSRM Building, 3no. road, Kunjochaya R/A, E-4 fl...',
                'profession' => 'Instructor',
                'subject' => rand(1, 3), // Generate random subject ID from 1 to 7
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
