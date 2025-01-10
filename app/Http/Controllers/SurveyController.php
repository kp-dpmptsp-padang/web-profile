<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SurveyController extends Controller 
{
    public function index()
    {
        return view('survey');
    }

    public function storeSurvey(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'umur' => 'required|numeric',
            'pekerjaan' => 'required',
            'saran' => 'required',
        ]);

        return redirect()->route('survey')->with('success', 'Terima kasih atas partisipasi Anda!');
    }

    public function thanks()
    {
        return view('survey-thanks');
    }
}