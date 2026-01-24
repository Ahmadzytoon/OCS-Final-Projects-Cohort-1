<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('questions')->insert([
                'topic_id' => rand(1, 20),
                'question_text' => "Question $i text?",
                'type' => 'multiple_choice',
                'explanation' => "Explanation for question $i",
                'order' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $questionId = DB::getPdo()->lastInsertId();
            for ($j = 1; $j <= 4; $j++) {
                DB::table('question_options')->insert([
                    'question_id' => $questionId,
                    'option_text' => "Option $j for question $i",
                    'is_correct' => $j === 1 ? 1 : 0, 
                    'order' => $j,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
