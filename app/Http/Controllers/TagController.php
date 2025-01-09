<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required|string|max:255|unique:tags,tag',
        ]);

        Tag::create([
            'tag' => $request->tag,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $request->validate([
            'tag' => 'required|string|max:255|unique:tags,tag,' . $tag->id,
        ]);

        $tag->update([
            'tag' => $request->tag,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}   