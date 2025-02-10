<?php

namespace App\Http\Controllers;

use App\Models\SurveyResponse;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;



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

    public function adminShow () 
    {
        $surveyResponses = SurveyResponse::with('answers.option', 'answers.question')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.survey.index', compact('surveyResponses'));
    }

    private $questionMapping = [
        'u1' => 1, 
        'u2' => 2, 
        'u3' => 3,
        'u4' => 4,
        'u5' => 5,
        'u6' => 6,
        'u7' => 7,
        'u8' => 8,
        'u9' => 9
    ];

    private function getMutuPelayanan($nilai)
    {
        if ($nilai >= 88.31 && $nilai <= 100.00) {
            return 'A (Sangat Baik)';
        } elseif ($nilai >= 76.61 && $nilai <= 88.30) {
            return 'B (Baik)';
        } elseif ($nilai >= 65.00 && $nilai <= 76.60) {
            return 'C (Kurang Baik)';
        } else {
            return 'D (Tidak Baik)';
        }
    }

    public function export(Request $request)
    {
        $request->validate([
            'export_type' => 'required|in:monthly,yearly,custom',
            'month' => 'required_if:export_type,monthly',
            'year' => 'required_if:export_type,yearly',
            'start_date' => 'required_if:export_type,custom',
            'end_date' => 'required_if:export_type,custom',
        ]);
    
        $query = SurveyResponse::with(['answers.question', 'answers.option']);
    
        switch ($request->export_type) {
            case 'monthly':
                $month = $request->month;
                $year = $request->monthly_year;
                $query->whereYear('created_at', $year)
                      ->whereMonth('created_at', $month);
                
                $monthNames = [
                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                    '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                    '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
                    '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                ];
                
                $period = $monthNames[$month] . ' ' . $year;
                break;

            case 'yearly':
                $query->whereYear('created_at', $request->year);
                $period = $request->year;
                break;

            case 'custom':
                $query->whereBetween('created_at', [
                    Carbon::parse($request->start_date)->startOfDay(),
                    Carbon::parse($request->end_date)->endOfDay()
                ]);
                $period = Carbon::parse($request->start_date)->format('d/m/Y') . ' - ' . 
                        Carbon::parse($request->end_date)->format('d/m/Y');
                break;
        }

        $surveys = $query->orderBy('created_at', 'asc')->get();

        $unsurTotals = [
            'u1' => 0, 'u2' => 0, 'u3' => 0, 'u4' => 0, 'u5' => 0,
            'u6' => 0, 'u7' => 0, 'u8' => 0, 'u9' => 0
        ];
        
        foreach ($surveys as $survey) {
            foreach ($survey->answers as $answer) {
                $questionId = $answer->question_id;
                $unsurKey = array_search($questionId, $this->questionMapping);
                if ($unsurKey) {
                    $unsurTotals[$unsurKey] += $answer->option->option_value;
                }
            }
        }

        $surveys = $surveys->map(function ($survey) {
            foreach ($this->questionMapping as $unsur => $questionId) {
                $answer = $survey->answers->where('question_id', $questionId)->first();
                $survey->{$unsur} = $answer ? $answer->option->option_value : 0;
            }
            
            $survey->nilai_akhir = round(collect([
                $survey->u1, $survey->u2, $survey->u3, $survey->u4, $survey->u5,
                $survey->u6, $survey->u7, $survey->u8, $survey->u9
            ])->average(), 2);
            
            return $survey;
        });

        $totalResponden = $surveys->count();
        $nrrPerUnsur = [];
        $nrrTertimbang = [];
        
        foreach ($unsurTotals as $unsur => $total) {
            $nrrPerUnsur[$unsur] = $totalResponden > 0 ? $total / $totalResponden : 0;
            $nrrTertimbang[$unsur] = $nrrPerUnsur[$unsur] * 0.111; 
        }

        $totalNRRTertimbang = array_sum($nrrTertimbang);
        $ukmUnit = $totalNRRTertimbang * 25;

        $mutuPelayanan = $this->getMutuPelayanan($ukmUnit);

        $pdf = PDF::loadView('admin.survey.exports.pdf', [
            'surveys' => $surveys,
            'period' => $period,
            'totalU1' => $unsurTotals['u1'],
            'totalU2' => $unsurTotals['u2'],
            'totalU3' => $unsurTotals['u3'],
            'totalU4' => $unsurTotals['u4'],
            'totalU5' => $unsurTotals['u5'],
            'totalU6' => $unsurTotals['u6'],
            'totalU7' => $unsurTotals['u7'],
            'totalU8' => $unsurTotals['u8'],
            'totalU9' => $unsurTotals['u9'],
            'nrrU1' => $nrrPerUnsur['u1'],
            'nrrU2' => $nrrPerUnsur['u2'],
            'nrrU3' => $nrrPerUnsur['u3'],
            'nrrU4' => $nrrPerUnsur['u4'],
            'nrrU5' => $nrrPerUnsur['u5'],
            'nrrU6' => $nrrPerUnsur['u6'],
            'nrrU7' => $nrrPerUnsur['u7'],
            'nrrU8' => $nrrPerUnsur['u8'],
            'nrrU9' => $nrrPerUnsur['u9'],
            'nrrTertimbangU1' => $nrrTertimbang['u1'],
            'nrrTertimbangU2' => $nrrTertimbang['u2'],
            'nrrTertimbangU3' => $nrrTertimbang['u3'],
            'nrrTertimbangU4' => $nrrTertimbang['u4'],
            'nrrTertimbangU5' => $nrrTertimbang['u5'],
            'nrrTertimbangU6' => $nrrTertimbang['u6'],
            'nrrTertimbangU7' => $nrrTertimbang['u7'],
            'nrrTertimbangU8' => $nrrTertimbang['u8'],
            'nrrTertimbangU9' => $nrrTertimbang['u9'],
            'totalNRRTertimbang' => $totalNRRTertimbang,
            'ukmUnit' => $ukmUnit,
            'mutuPelayanan' => $mutuPelayanan
        ]);

        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('Laporan-IKM-Periode' . str_replace(['/', ' '], '-', $period) . '.pdf');
    }
}