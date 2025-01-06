<?php

namespace App\Http\Controllers;

class GuestController extends Controller
{
    public function home()
    {
        return view('home');
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

    public function informasi()
    {
        return view('informasi');
    }

    public function dokumen()
    {
        return view('dokumen');
    }
}