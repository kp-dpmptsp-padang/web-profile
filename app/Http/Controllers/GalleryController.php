<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Picture;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{
    public function index()
    {
        $pictures = Picture::where('imageable_type', 'gallery')->get();
        return view('admin.galleries.index', compact('pictures'));
    }

    public function store(Request $request)
    {
        Log::info('Store method called');
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'caption' => 'nullable|string|max:255',
        ]);

        try {
            Log::info('Validation passed');
            $file = $request->file('image');
            $path = $file->store('galleries', 'public');
            $mimeType = $file->getClientMimeType();
            Log::info('Image stored at path: ' . $path . ' with MIME type: ' . $mimeType);

            Picture::create([
                'nama_file' => $path,
                'caption' => $request->caption,
                'imageable_type' => 'gallery',
                'imageable_id' => 0, 
                'mine_type' => $mimeType,
            ]);

            Log::info('Image successfully stored in database');
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error storing image: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menyimpan gambar. Error: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $picture = Picture::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'caption' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if (Storage::disk('public')->exists($picture->nama_file)) {
                Storage::disk('public')->delete($picture->nama_file);
            }

            // Store new image
            $path = $request->file('image')->store('galleries', 'public');
            $picture->update(['nama_file' => $path]);
        }

        $picture->update(['caption' => $request->caption]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $picture = Picture::findOrFail($id);

        // Delete image
        if (Storage::disk('public')->exists($picture->nama_file)) {
            Storage::disk('public')->delete($picture->nama_file);
        }

        $picture->delete();

        return response()->json(['success' => true]);
    }
}