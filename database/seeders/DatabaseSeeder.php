<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DocumentTypeSeeder::class,
            EmployeeSeeder::class,
            SurveyQuestionSeeder::class,
            SurveyOptionSeeder::class,
            SurveyResponseSeeder::class,
            SurveyAnswerSeeder::class,
        ]);
    }
}