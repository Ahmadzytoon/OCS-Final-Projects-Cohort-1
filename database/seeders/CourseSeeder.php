<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('courses')->insert([
                'category_id' => rand(1, 20),
                'instructor_id' => rand(21, 22), // instructor users from UsersSeeder
                'title' => "Course $i",
                'short_description' => "Short description for course $i",
                'full_description' => "Full description for course $i",
                'difficulty' => ['beginner', 'intermediate', 'advanced'][array_rand(['beginner', 'intermediate', 'advanced'])],
                'pricing' => ['free', 'paid'][array_rand(['free', 'paid'])],
                'price' => rand(0, 100),
                'language' => 'English',
                'is_private' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
