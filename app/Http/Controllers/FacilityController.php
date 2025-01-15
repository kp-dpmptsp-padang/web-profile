<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index() {
        $facilities = Facility::with('pictures')->latest()->paginate(10);
        return view('admin.facilities.index', compact('facilities'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $facility = Facility::create($request->only('nama', 'deskripsi'));

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('facilities', 'public');
            $facility->pictures()->create([
                'nama_file' => $path,
                'mine_type' => $request->file('image')->getClientMimeType(),
            ]);
        }

        return redirect()->route('facility.index');
    }

    public function update(Request $request, $id) {
        $facility = Facility::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $facility->update($request->only('nama', 'deskripsi'));

        if ($request->hasFile('image')) {
            // Delete the old images
            foreach ($facility->pictures as $picture) {
                Storage::disk('public')->delete($picture->nama_file);
                $picture->delete();
            }

            // Store the new image
            $path = $request->file('image')->store('facilities', 'public');
            $facility->pictures()->create([
                'nama_file' => $path,
                'mine_type' => $request->file('image')->getClientMimeType(),
            ]);
        }

        return redirect()->route('facility.index');
    }

    public function destroy($id) {
        
        $facility = Facility::findOrFail($id);
        
        foreach ($facility->pictures as $picture) {
            Storage::disk('public')->delete($picture->nama_file);
            $picture->delete();
        }
        $facility->delete();

        return redirect()->route('facility.index');
    }
}