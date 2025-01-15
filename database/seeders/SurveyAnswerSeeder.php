<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyAnswerSeeder extends Seeder
{
    public function run(): void
    {
        // Get all questions and their options
        $questions = DB::table('survey_questions')->get();
        $questionOptions = [];
        foreach ($questions as $question) {
            $questionOptions[$question->id] = DB::table('survey_options')
                ->where('question_id', $question->id)
                ->get()
                ->pluck('id')
                ->toArray();
        }

        // Generate answers for each response
        for ($response_id = 1; $response_id <= 10; $response_id++) {
            foreach ($questions as $question) {
                $options = $questionOptions[$question->id];
                
                // Randomly select an option, but with higher probability for positive responses
                $weights = [0.4, 0.3, 0.2, 0.1]; // Weights for options (higher to lower ratings)
                $rand = mt_rand(1, 100) / 100;
                $cumulative = 0;
                $selected_index = 0;
                
                foreach ($weights as $index => $weight) {
                    $cumulative += $weight;
                    if ($rand <= $cumulative) {
                        $selected_index = $index;
                        break;
                    }
                }

                DB::table('survey_answers')->insert([
                    'response_id' => $response_id,
                    'question_id' => $question->id,
                    'option_id' => $options[$selected_index]
                ]);
            }
        }
    }
}