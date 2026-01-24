<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usedPairs = [];
        for ($i = 0; $i < 30; $i++) {
            do {
                $userId = rand(1, 20);
                $courseId = rand(1, 20);
                $pair = "$userId-$courseId";
            } while (in_array($pair, $usedPairs));
            $usedPairs[] = $pair;

            DB::table('enrollments')->insert([
                'user_id' => $userId,
                'course_id' => $courseId,
                'progress_percentage' => rand(0, 100),
                'completed_at' => rand(0, 1) ? now() : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
