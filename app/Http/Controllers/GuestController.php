<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Slider;
use App\Models\Video;
use App\Models\QuestionAndAnswer;
use App\Models\Facility;
use App\Models\SurveyQuestion;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Employee;
use App\Models\Inovation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GuestController extends Controller
{
    public function home()
    {
        $gallery = Picture::where('imageable_type', 'gallery')->latest()->take(6)->get();

        $sliders = Slider::with(['pictures' => function($query) {
            $query->orderBy('urutan', 'asc');
        }])->where('is_active', 1)->get();

        $innovations = Inovation::where('is_published', 1)->get();
        $latestNews = Post::where('jenis', 'berita')->latest()->take(3)->get();

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

        return view('home', compact('sliders', 'gallery', 'latestNews', 'surveyResults', 'overallPercentage', 'overallScore', 'keteranganScore', 'innovations'));
    }

    public function about()
    {
        $employees = Employee::all();
        return view('about', compact('employees'));
    }

    public function layanan()
    {
        return view('layanan');
    }

    public function fasilitas()
    {
        $facilities = Facility::with('pictures')->get();
        return view('fasilitas', compact('facilities'));
    }

    public function informasi(Request $request)
    {
        $query = Post::where('jenis', 'informasi')
            ->with(['penulis', 'tags', 'pictures']);

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('konten', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('filter') && $request->filter != '') {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tag', $request->filter);
            });
        }

        $posts = $query->latest()->paginate(9);

        $tags = Tag::has('posts')->get();
        return view('informasi', compact('posts', 'tags'));
    }

    public function detailInfo($slug)
    {
        $post = Post::where('slug', $slug)
            ->with(['penulis', 'tags', 'pictures'])
            ->firstOrFail();

        $recentPosts = Post::where('id', '!=', $post->id) 
            ->latest()
            ->take(5)
            ->get();

        return view('detailinfo', compact('post', 'recentPosts'));
    }

    public function berita(Request $request)
    {
        $query = Post::where('jenis', 'berita')
            ->with(['penulis', 'tags', 'pictures']);

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('konten', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('filter') && $request->filter != '') {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tag', $request->filter);
            });
        }

        $posts = $query->latest()->paginate(9);

        $tags = Tag::has('posts')->get();
        return view('berita', compact('posts', 'tags'));
    }

    public function dokumen(Request $request)
    {
        $query = Document::with(['admin', 'jenis'])
                         ->excludeEmployeeAndStandarPelayananDocuments();
        
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('filter') && $request->filter != '') {
            $query->where('id_jenis', $request->filter);
        }
        
        if ($request->has('tahun') && $request->tahun != '') {
            $query->where('tahun', $request->tahun);
        }

        $documents = $query->latest()->paginate(10);
        $documentTypes = DocumentType::where('jenis_dokumen', '!=', 'standar-pelayanan')->get();
        $years = Document::select('tahun')
                        ->distinct()
                        ->orderBy('tahun', 'desc')
                        ->pluck('tahun');

        return view('dokumen', compact('documents', 'documentTypes', 'years'));
    }

    public function faq()
    {
        return view('faq');
    }

    public function storeQuestion(Request $request)
    {
        try {
            $data = $request->validate([
                'nama_penanya' => 'required|string|max:255',
                'email_penanya' => 'required|email|max:255',
                'pertanyaan' => 'required|string|max:1000',
            ], [
                'nama_penanya.required' => 'Nama wajib diisi.',
                'nama_penanya.string' => 'Nama harus berupa teks.',
                'nama_penanya.max' => 'Nama tidak boleh lebih dari 255 karakter.',
                'email_penanya.required' => 'Email wajib diisi.',
                'email_penanya.email' => 'Email harus berupa email yang valid.',
                'email_penanya.max' => 'Email tidak boleh lebih dari 255 karakter.',
                'pertanyaan.required' => 'Pertanyaan wajib diisi.',
                'pertanyaan.string' => 'Pertanyaan harus berupa teks.',
                'pertanyaan.max' => 'Pertanyaan tidak boleh lebih dari 1000 karakter.',
            ]);

            QuestionAndAnswer::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Pertanyaan berhasil dikirim',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan. Silakan coba lagi. ',
            ], 500);
        }
    }

    public function video(Request $request)
    {
        $query = Video::latest();
        
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('judul', 'like', '%' . $searchTerm . '%')
                  ->orWhere('deskripsi', 'like', '%' . $searchTerm . '%');
            });
        }
        
        $videos = $query->latest()->paginate(9);
        
        return view('video', compact('videos'));
    }

    public function galeri()
    {
        $pictures = Picture::where('imageable_type', 'gallery')->latest()->paginate(9);
        return view('galeri', compact('pictures'));
    }
}