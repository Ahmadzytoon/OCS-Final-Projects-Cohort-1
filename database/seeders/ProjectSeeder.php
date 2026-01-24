<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('projects')->insert([
                'course_id' => rand(1, 20),
                'title' => "Project $i",
                'description' => "Project $i description",
                'instructions' => "Instructions for project $i",
                'difficulty' => ['beginner', 'intermediate', 'advanced'][array_rand(['beginner', 'intermediate', 'advanced'])],
                'xp_points' => rand(50, 200),
                'estimated_hours' => rand(1, 20),
                'order' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
