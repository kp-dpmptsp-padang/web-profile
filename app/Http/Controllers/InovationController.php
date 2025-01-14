<?php

namespace App\Http\Controllers;

use App\Models\Inovation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class InovationController extends Controller
{
    public function index() {
        $publishedInovations = Inovation::with('pictures')->where('is_published', true)->get();
        $unpublishedInovations = Inovation::with('pictures')->where('is_published', false)->get();
        return view('admin.inovations.index', compact('publishedInovations', 'unpublishedInovations'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:150',
            'url' => 'nullable|url',
            'is_published' => 'required|boolean',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $inovation = Inovation::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url,
            'is_published' => $request->is_published,
        ]);
    
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $inovation->pictures()->create([
                'nama_file' => $logoPath,
                'mine_type' => $request->file('logo')->getClientMimeType(),
            ]);
        }
    
        return response()->json(['success' => true]);
    }
    public function update(Request $request, $id)
    {
        $inovation = Inovation::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:150',
            'url' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $inovation->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url,
            'is_published' => $request->is_published,
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($inovation->pictures()->exists()) {
                Storage::disk('public')->delete($inovation->pictures()->first()->nama_file);
                $inovation->pictures()->delete();
            }

            // Store new logo
            $path = $request->file('logo')->store('logos', 'public');
            $inovation->pictures()->create([
                'nama_file' => $path,
                'mine_type' => $request->file('logo')->getClientMimeType(),
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $inovation = Inovation::findOrFail($id);

        Log::info('Deleting innovation: ' . $inovation->id);

        // Delete logo if exists
        if ($inovation->pictures()->exists()) {
            Storage::disk('public')->delete($inovation->pictures()->first()->nama_file);
            $inovation->pictures()->delete();
        }

        $inovation->delete();

        Log::info('Innovation deleted: ' . $inovation->id);

        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request, $id)
    {
        $inovation = Inovation::findOrFail($id);
        $inovation->is_published = $request->is_published;
        $inovation->save();

        return response()->json(['success' => true]);
    }
}