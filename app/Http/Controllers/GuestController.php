<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Slider;
use App\Models\Video;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        $gallery = Picture::where('imageable_type', 'gallery')->latest()->take(6)->get();

        $sliders = Slider::with(['pictures' => function($query) {
            $query->orderBy('urutan', 'asc');
        }])->where('is_active', 1)->get();

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
                    'question' => $question->question_text,
                    'score' => $averageScore,
                    'total_responses' => $totalResponses
                ];
            });

        return view('home', compact('sliders', 'gallery', 'surveyResults'));
    }

    public function about()
    {
        return view('about');
    }

    public function layanan()
    {
        return view('layanan');
    }

    public function fasilitas()
    {
        return view('fasilitas');
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

        $videos = Video::latest()->get();

        $tags = Tag::has('posts')->get();
        return view('informasi', compact('posts', 'tags', 'videos'));
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
        $videos = Video::latest()->get();

        $tags = Tag::has('posts')->get();
        return view('berita', compact('posts', 'tags', 'videos'));
    }

    public function dokumen()
    {
        return view('dokumen');
    }

    public function faq()
    {
        return view('faq');
    }
}