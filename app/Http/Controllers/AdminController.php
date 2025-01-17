<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionAndAnswer;
use App\Models\Document;
use App\Models\Post;
use App\Models\User;
use App\Models\Slider;
use App\Models\Picture;
use App\Models\Video;
use App\Models\Inovation;
use App\Models\Facility;
use App\Models\Employee;
use App\Models\SurveyResponse;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBerita = Post::where('jenis', 'berita')->count();
        $totalInformasi = Post::where('jenis', 'informasi')->count();
        $totalSliders = Slider::count();
        $totalGalleries = Picture::where('imageable_type', 'gallery')->count();
        $totalVideos = Video::count();
        $totalUnansweredQuestions = QuestionAndAnswer::where('status', 'belum-terjawab')->count();
        $totalAnsweredQuestions = QuestionAndAnswer::where('status', 'terjawab')->count();
        $totalInovations = Inovation::count();
        $totalDocuments = Document::count();
        $totalFacilities = Facility::count();
        $totalEmployees = Employee::count();
        $suggestions = SurveyResponse::whereNotNull('saran')
        ->where('saran', '!=', '')
        ->latest()
        ->select('saran', 'created_at')
        ->get();

        return view('admin.dashboard', compact('totalBerita', 'totalInformasi', 'totalSliders', 'totalGalleries', 'totalVideos', 'totalUnansweredQuestions', 'totalAnsweredQuestions', 'totalInovations', 'totalDocuments', 'totalFacilities', 'totalEmployees', 'suggestions'));
    }
}