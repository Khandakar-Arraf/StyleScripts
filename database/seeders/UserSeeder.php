<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        //  Create Super Admin
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'phone' => '0123456789',
            'password' => Hash::make('password'),
            'role' => 0,
            'allow' => 1,
            'complete' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //  Create Teachers
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => 'INSTRUCTOR ' . $i,
                'email' => 'instructor' . $i . '@email.com',
                'phone' => '01567841' . $i,
                'password' => Hash::make('password'),
                'role' => 2,
                'allow' => 1,
                'complete' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        //  Create Students (40 students)
        for ($i = 1; $i <= 40; $i++) {
            DB::table('users')->insert([
                'name' => 'Customer ' . $i,
                'email' => 'customer' . $i . '@email.com',
                'phone' => '01567875' . $i,
                'password' => Hash::make('password'),
                'role' => 1,
                'allow' => 1,
                'complete' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
