<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyOptionSeeder extends Seeder
{
    public function run(): void
    {
        $optionsData = [
            // Question 1 options
            [
                'question_id' => 1,
                'options' => [
                    ['option_text' => 'Sangat Sesuai', 'option_value' => 4, 'order' => 1],
                    ['option_text' => 'Sesuai', 'option_value' => 3, 'order' => 2],
                    ['option_text' => 'Kurang Sesuai', 'option_value' => 2, 'order' => 3],
                    ['option_text' => 'Tidak Sesuai', 'option_value' => 1, 'order' => 4],
                ]
            ],
            // Question 2 options
            [
                'question_id' => 2,
                'options' => [
                    ['option_text' => 'Sangat Mudah', 'option_value' => 4, 'order' => 1],
                    ['option_text' => 'Mudah', 'option_value' => 3, 'order' => 2],
                    ['option_text' => 'Kurang Mudah', 'option_value' => 2, 'order' => 3],
                    ['option_text' => 'Tidak Mudah', 'option_value' => 1, 'order' => 4],
                ]
            ],
            // Question 3 options
            [
                'question_id' => 3,
                'options' => [
                    ['option_text' => 'Sangat Cepat', 'option_value' => 4, 'order' => 1],
                    ['option_text' => 'Cepat', 'option_value' => 3, 'order' => 2],
                    ['option_text' => 'Kurang Cepat', 'option_value' => 2, 'order' => 3],
                    ['option_text' => 'Tidak Cepat', 'option_value' => 1, 'order' => 4],
                ]
            ],
            // Question 4 options
            [
                'question_id' => 4,
                'options' => [
                    ['option_text' => 'Gratis', 'option_value' => 4, 'order' => 1],
                    ['option_text' => 'Murah', 'option_value' => 3, 'order' => 2],
                    ['option_text' => 'Cukup Mahal', 'option_value' => 2, 'order' => 3],
                    ['option_text' => 'Sangat Mahal', 'option_value' => 1, 'order' => 4],
                ]
            ],
            // Question 5 options
            [
                'question_id' => 5,
                'options' => [
                    ['option_text' => 'Sangat Sesuai', 'option_value' => 4, 'order' => 1],
                    ['option_text' => 'Sesuai', 'option_value' => 3, 'order' => 2],
                    ['option_text' => 'Kurang Sesuai', 'option_value' => 2, 'order' => 3],
                    ['option_text' => 'Tidak Sesuai', 'option_value' => 1, 'order' => 4],
                ]
            ],
            // Question 6 options
            [
                'question_id' => 6,
                'options' => [
                    ['option_text' => 'Sangat Baik', 'option_value' => 4, 'order' => 1],
                    ['option_text' => 'Baik', 'option_value' => 3, 'order' => 2],
                    ['option_text' => 'Kurang Baik', 'option_value' => 2, 'order' => 3],
                    ['option_text' => 'Tidak Baik', 'option_value' => 1, 'order' => 4],
                ]
            ],
            // Question 7 options
            [
                'question_id' => 7,
                'options' => [
                    ['option_text' => 'Sangat Baik', 'option_value' => 4, 'order' => 1],
                    ['option_text' => 'Baik', 'option_value' => 3, 'order' => 2],
                    ['option_text' => 'Kurang Baik', 'option_value' => 2, 'order' => 3],
                    ['option_text' => 'Tidak Baik', 'option_value' => 1, 'order' => 4],
                ]
            ],
            // Question 8 options
            [
                'question_id' => 8,
                'options' => [
                    ['option_text' => 'Sangat Cepat', 'option_value' => 4, 'order' => 1],
                    ['option_text' => 'Cepat', 'option_value' => 3, 'order' => 2],
                    ['option_text' => 'Lambat', 'option_value' => 2, 'order' => 3],
                    ['option_text' => 'Sangat Lambat', 'option_value' => 1, 'order' => 4],
                ]
            ],
            // Question 9 options
            [
                'question_id' => 9,
                'options' => [
                    ['option_text' => 'Sangat Baik', 'option_value' => 4, 'order' => 1],
                    ['option_text' => 'Baik', 'option_value' => 3, 'order' => 2],
                    ['option_text' => 'Kurang Baik', 'option_value' => 2, 'order' => 3],
                    ['option_text' => 'Tidak Baik', 'option_value' => 1, 'order' => 4],
                ]
            ],
        ];

        foreach ($optionsData as $questionOptions) {
            foreach ($questionOptions['options'] as $option) {
                $option['question_id'] = $questionOptions['question_id'];
                DB::table('survey_options')->insert($option);
            }
        }
    }
}