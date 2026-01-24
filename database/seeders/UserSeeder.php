<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => "Student $i",
                'email' => "student$i@codequest.test",
                'password' => Hash::make('password123'),
                'role' => 'student', // all students
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('users')->insert([
            ['name' => 'Instructor 1', 'email' => 'instructor1@codequest.test', 'password' => Hash::make('password123'), 'role' => 'instructor', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Admin', 'email' => 'admin@codequest.test', 'password' => Hash::make('password123'), 'role' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
