<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $activeSliders = Slider::with('pictures')->where('is_active', true)->orderBy('order')->get();
        $inactiveSliders = Slider::with('pictures')->where('is_active', false)->orderBy('order')->get();
        return view('admin.sliders.index', compact('activeSliders', 'inactiveSliders'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'nullable|url',
            'order' => 'required_if:is_active,1|integer|nullable',
            'is_active' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
    
        if ($request->is_active) {
            $existingOrder = Slider::where('is_active', true)->where('order', $request->order)->exists();
            if ($existingOrder) {
                Slider::where('is_active', true)
                    ->where('order', '>=', $request->order)
                    ->increment('order');
            }
        } else {
            $request->merge(['order' => -1]);
        }
    
        $slider = Slider::create([
            'nama' => $request->nama,
            'link' => $request->link,
            'order' => $request->order,
            'is_active' => $request->is_active,
        ]);
    
        $path = $request->file('image')->store('sliders', 'public');
    
        $slider->pictures()->create([
            'nama_file' => $path,
            'mine_type' => $request->file('image')->getClientMimeType(),
        ]);
    
        return response()->json(['success' => true]);
    }
    public function nextOrder()
    {
        $nextOrder = Slider::where('is_active', true)->max('order') + 1;
        return response()->json(['nextOrder' => $nextOrder]);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
    
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
    
        $slider->update([
            'nama' => $request->nama,
            'link' => $request->link,
        ]);
    
        if ($request->hasFile('image')) {
            $oldPicture = $slider->pictures()->first();
            if ($oldPicture && Storage::disk('public')->exists($oldPicture->nama_file)) {
                Storage::disk('public')->delete($oldPicture->nama_file);
                $oldPicture->delete();
            }
    
            $path = $request->file('image')->store('sliders', 'public');
            $slider->pictures()->create([
                'nama_file' => $path,
                'mine_type' => $request->file('image')->getClientMimeType(),
            ]);
        }
    
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $isActive = $request->is_active;

        if ($isActive) {
            $lastOrder = Slider::where('is_active', true)->max('order');
            $slider->update(['is_active' => true, 'order' => $lastOrder + 1]);
        } else {
            $slider->update(['is_active' => false, 'order' => -1]);

            $activeSliders = Slider::where('is_active', true)->orderBy('order')->get();
            foreach ($activeSliders as $index => $activeSlider) {
                $activeSlider->update(['order' => $index + 1]);
            }
        }

        return response()->json(['success' => true]);
    }

    public function changeOrder(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $direction = $request->direction;

        if ($direction === 'up') {
            $previousSlider = Slider::where('order', '<', $slider->order)->where('is_active', true)->orderBy('order', 'desc')->first();
            if ($previousSlider) {
                $currentOrder = $slider->order;
                $slider->update(['order' => $previousSlider->order]);
                $previousSlider->update(['order' => $currentOrder]);
            }
        } elseif ($direction === 'down') {
            $nextSlider = Slider::where('order', '>', $slider->order)->where('is_active', true)->orderBy('order', 'asc')->first();
            if ($nextSlider) {
                $currentOrder = $slider->order;
                $slider->update(['order' => $nextSlider->order]);
                $nextSlider->update(['order' => $currentOrder]);
            }
        }

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
    
        $picture = $slider->pictures()->first();
        if ($picture && Storage::disk('public')->exists($picture->nama_file)) {
            Storage::disk('public')->delete($picture->nama_file);
            $picture->delete();
        }
    
        $slider->delete();
    
        $activeSliders = Slider::where('is_active', true)->orderBy('order')->get();
        foreach ($activeSliders as $index => $activeSlider) {
            $activeSlider->update(['order' => $index + 1]);
        }
    
        return response()->json(['success' => true]);
    }
}