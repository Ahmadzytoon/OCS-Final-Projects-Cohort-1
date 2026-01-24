<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([


            [
                'name' => 'Ahmad',
                'email' => 'ahmad@gmail.com',
                'password' => '$2y$12$qA81UYAWqqWhFRfULVn.GeRGGZXQHrfwH02/ul9ir82aFlN4clnIS',
                'phone'=>'0780632320',
                'role' => 'admin',
                'created_at' =>'2026-01-21 17:23:28'
            ],
             [
                'name' => 'Mohammad',
                'email' => 'moh@gmail.com',
                'password' => '$2y$12$qA81UYAWqqWhFRfULVn.GeRGGZXQHrfwH02/ul9ir82aFlN4clnIS',
                'phone'=>'0780675820',
                'role' => 'admin',
                'created_at' =>'2026-01-21 17:23:28'
            ],
             [
                'name' => 'Qasem',
                'email' => 'qasem@gmail.com',
                'password' => '$2y$12$qA81UYAWqqWhFRfULVn.GeRGGZXQHrfwH02/ul9ir82aFlN4clnIS',
                'phone'=>'0780952320',
                'role' => 'admin',
                'created_at' =>'2026-01-21 17:23:28'
            ],
            [
                'name' => 'Adnan',
                'email' => 'adnan@gmail.com',
                'password' => '$2y$12$qA81UYAWqqWhFRfULVn.GeRGGZXQHrfwH02/ul9ir82aFlN4clnIS',
                'phone'=>'0780952320',
                'role' => 'owner',
                'created_at' =>'2026-01-21 17:27:28'
            ],
            [
                'name' => 'Ali',
                'email' => 'ali@gmail.com',
                'password' => '$2y$12$qA81UYAWqqWhFRfULVn.GeRGGZXQHrfwH02/ul9ir82aFlN4clnIS',
                'phone'=>'0780952320',
                'role' => 'student',
                'created_at' =>'2026-01-21 17:35:28'
            ]


            
        ]);

    }
}
