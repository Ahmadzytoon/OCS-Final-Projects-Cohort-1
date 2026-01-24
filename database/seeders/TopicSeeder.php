<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('topics')->insert([
                'module_id' => rand(1, 20),
                'title' => "Topic $i",
                'content' => "Content for topic $i",
                'xp_points' => rand(1, 10),
                'order' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
