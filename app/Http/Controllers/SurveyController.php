<?php

namespace App\Http\Controllers;

use App\Models\SurveyResponse;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SurveyController extends Controller
{
    public function home()
    {  
        $demografiUmur = SurveyResponse::select(
            DB::raw("CASE
                WHEN umur BETWEEN 18 AND 25 THEN '18-25'
                WHEN umur BETWEEN 26 AND 35 THEN '26-35'
                WHEN umur BETWEEN 36 AND 45 THEN '36-45'
                WHEN umur BETWEEN 46 AND 55 THEN '46-55'
                ELSE '55+'
            END as kelompok_umur"),
            DB::raw('count(*) as total')
        )
        ->groupBy('kelompok_umur')
        ->get();

        $layananData = SurveyResponse::select('layanan', DB::raw('count(*) as total'))
            ->groupBy('layanan')
            ->get();

        $pendidikanData = SurveyResponse::select('pendidikan', DB::raw('count(*) as total'))
            ->groupBy('pendidikan')
            ->get();

        $surveyResults = SurveyQuestion::with(['options', 'answers'])
            ->where('is_active', 1)
            ->get()
            ->map(function($question) {
                $totalScore = 0;
                $totalResponses = 0;
                
                foreach($question->answers as $answer) {
                    $option = $answer->option;
                    if ($option) {
                        $totalScore += $option->option_value;
                        $totalResponses++;
                    }
                }
                
                $averageScore = $totalResponses > 0 ? round(($totalScore / $totalResponses), 2) : 0;
                
                return [
                    'question' => $question->alias,
                    'score' => $averageScore,
                    'total_responses' => $totalResponses
                ];
            });
    
            $overallScore = $surveyResults->avg('score');
            $overallPercentage = round(($overallScore / 4) * 100, 1);
            $keteranganScore = '';
            if ($overallPercentage >= 80) {
                $keteranganScore = 'Sangat Baik';
            } elseif ($overallPercentage >= 70) {
                $keteranganScore = 'Baik';
            } elseif ($overallPercentage >= 60) {
                $keteranganScore = 'Cukup';
            } elseif ($overallPercentage >= 50) {
                $keteranganScore = 'Kurang';
            } else {
                $keteranganScore = 'Sangat Kurang';
            }    

        return view('survey-home', compact(
            'demografiUmur',
            'layananData',
            'pendidikanData',
            'overallScore',
            'overallPercentage',
            'keteranganScore'
        ));
    }

    public function index()
    {
        $questions = SurveyQuestion::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('survey', compact('questions'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $validationRules = [
                'noHp' => 'required|regex:/^[0-9+]{10,14}$/',
                'name' => 'nullable|string|max:255',
                'alamat' => 'nullable|string|max:500',
                'usia' => 'required|numeric|min:1|max:120',
                'jk' => 'required|in:L,P',
                'pendidikan' => 'required|string|in:SD/MI,SMP/MTs,SMA/SMK/MA,D1,D2,D3,D4,S1,S2,S3',
                'job' => 'required|string|in:PNS,TNI/POLRI,Swasta,Wiraswasta,Pelajar,Lainnya',
                'layanan' => 'required|string',
                'kritik' => 'nullable|string|max:1000',
            ];

            $customMessages = [
                'noHp.required' => 'Nomor HP wajib diisi.',
                'noHp.regex' => 'Format nomor HP tidak valid.',
                'usia.required' => 'Usia wajib diisi.',
                'usia.numeric' => 'Usia harus berupa angka.',
                'usia.min' => 'Usia minimal adalah 1 tahun.',
                'usia.max' => 'Usia maksimal adalah 120 tahun.',
                'jk.required' => 'Jenis kelamin wajib diisi.',
                'jk.in' => 'Jenis kelamin harus Laki-Laki atau Perempuan.',
                'pendidikan.required' => 'Pendidikan wajib diisi.',
                'pendidikan.string' => 'Pendidikan harus berupa teks.',
                'pendidikan.in' => 'Pendidikan tidak valid.',
                'job.required' => 'Pekerjaan wajib diisi.',
                'job.string' => 'Pekerjaan harus berupa teks.',
                'job.in' => 'Pekerjaan tidak valid.',
                'layanan.required' => 'Layanan wajib diisi.',
            ];

            $validatedData = $request->validate($validationRules, $customMessages);

            $activeQuestions = SurveyQuestion::where('is_active', true)
                ->orderBy('order')
                ->get();

            $unansweredQuestions = collect($activeQuestions)->filter(function ($question) use ($request) {
                return !$request->has($question->id . '_rating') || 
                    empty($request->input($question->id . '_rating'));
            });

            if ($unansweredQuestions->isNotEmpty()) {
                throw ValidationException::withMessages([
                    'survey_answers' => ['Mohon jawab semua pertanyaan survey yang tersedia']
                ]);
            }

            $surveyResponse = SurveyResponse::create([
                'noHp' => $validatedData['noHp'],
                'nama' => $validatedData['name'],
                'alamat' => $validatedData['alamat'],
                'umur' => $validatedData['usia'],
                'jk' => $validatedData['jk'],
                'pendidikan' => $validatedData['pendidikan'],
                'pekerjaan' => $validatedData['job'],
                'layanan' => $validatedData['layanan'],
                'saran' => $validatedData['kritik'],
            ]);

            foreach ($activeQuestions as $question) {
                $answerValue = $request->input($question->id . '_rating');
                
                SurveyAnswer::create([
                    'response_id' => $surveyResponse->id,
                    'question_id' => $question->id,
                    'option_id' => $this->getOptionId($question->id, $answerValue)
                ]);
            }

            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Terima kasih atas partisipasi Anda!'
            ]);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Survey submission error: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan. Silakan coba lagi.'
            ], 500);
        }
    }

    private function getOptionId($questionId, $value)
    {
        return DB::table('survey_options')
            ->where('question_id', $questionId)
            ->where('option_value', $value)
            ->value('id');
    }
}