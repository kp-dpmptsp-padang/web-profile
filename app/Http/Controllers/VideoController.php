<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index() {
        $videos = Video::latest()->paginate(8);
        return view('admin.videos.index', compact('videos'));
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url' => 'required|url',
            'tanggal_publikasi' => 'required|date',
        ]);

        Video::create([
            'id_admin' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url,
            'tanggal_publikasi' => $request->tanggal_publikasi,
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'url' => 'required|url',
            'tanggal_publikasi' => 'required|date',
        ]);

        $video = Video::findOrFail($id);
        $video->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url,
            'tanggal_publikasi' => $request->tanggal_publikasi,
    ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id) {
        $video = Video::findOrFail($id);
        $video->delete();

        return response()->json(['success' => true]);
    }
}