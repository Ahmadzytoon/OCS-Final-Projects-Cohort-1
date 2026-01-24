<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['topic', 'project', 'course'];
        for ($i = 1; $i <= 20; $i++) {
            DB::table('badges')->insert([
                'name' => "Badge $i",
                'description' => "This is the description for badge $i",
                'type' => $types[array_rand($types)],
                'threshold' => rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
