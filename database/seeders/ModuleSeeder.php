<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('modules')->insert([
                'course_id' => rand(1, 20),
                'title' => "Module $i",
                'description' => "Module $i description",
                'order' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
