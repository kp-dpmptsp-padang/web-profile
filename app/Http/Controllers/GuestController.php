<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

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

    public function dokumen()
    {
        return view('dokumen');
    }
}