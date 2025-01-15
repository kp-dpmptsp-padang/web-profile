<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'question_text' => 'Bagaimana pendapat anda tentang kesesuain persyaratan pelayanan dengan jenis pelayanannya?',
                'question_type' => 'radio',
                'alias' => 'Kesesuaian Persyaratan',
                'order' => 1,
                'is_active' => 1,
            ],
            [
                'question_text' => 'Bagaimana pemahaman Anda tentang kemudahan Sistem, Mekanisme, dan Prosedur layanan?',
                'question_type' => 'radio',
                'alias' => 'Kemudahan Prosedur',
                'order' => 2,
                'is_active' => 1,
            ],
            [
                'question_text' => 'Bagaimana pendapat Anda tentang kecepatan waktu proses layanan?',
                'question_type' => 'radio',
                'alias' => 'Kecepatan Layanan',
                'order' => 3,
                'is_active' => 1,
            ],
            [
                'question_text' => 'Bagaimana pendapat Anda tentang kewajaran biaya/tarif dalam pelayanan?',
                'question_type' => 'radio',
                'alias' => 'Kewajaran Tarif',
                'order' => 4,
                'is_active' => 1,
            ],
            [
                'question_text' => 'Bagaimana pendapat Anda tentang kesesuaian antara layanan yang tersedia dengan yang dibutuhkan?',
                'question_type' => 'radio',
                'alias' => 'Kesesuaian Layanan',
                'order' => 5,
                'is_active' => 1,
            ],
            [
                'question_text' => 'Bagaimana pendapat Anda tentang kompetensi petugas layanan?',
                'question_type' => 'radio',
                'alias' => 'Kompetensi Petugas',
                'order' => 6,
                'is_active' => 1,
            ],
            [
                'question_text' => 'Bagaimana pendapat Anda tentang sikap petugas (Ramah & Empati) dalam merespon pertanyaan yang diajukan?',
                'question_type' => 'radio',
                'alias' => 'Sikap Petugas',
                'order' => 7,
                'is_active' => 1,
            ],
            [
                'question_text' => 'Bagaimana pendapat Anda tentang penanganan dan Tindaklanjut pengaduan / Saran / Masukan yang Anda Ajukan?',
                'question_type' => 'radio',
                'alias' => 'Penanganan Pengaduan',
                'order' => 8,
                'is_active' => 1,
            ],
            [
                'question_text' => 'Bagaimana pendapat Anda tentang Sarana dan prasarana pelayanan?',
                'question_type' => 'radio',
                'alias' => 'Sarana dan Prasarana',
                'order' => 9,
                'is_active' => 1,
            ],
        ];

        DB::table('survey_questions')->insert($questions);
    }
}