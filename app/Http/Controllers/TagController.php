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
        ], [
            'tag.required' => 'Nama tag wajib diisi.',
            'tag.string' => 'Nama tag harus berupa teks.',
            'tag.max' => 'Nama tag tidak boleh lebih dari 255 karakter.',
            'tag.unique' => 'Nama tag sudah digunakan.',
        ]);

        Tag::create([
            'tag' => $request->tag,
        ]);

        return redirect()->route('tags.index')->with('success', 'Berhasil Menambahkan Tag.');
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $request->validate([
            'tag' => 'required|string|max:255|unique:tags,tag,' . $tag->id,
        ], [
            'tag.required' => 'Nama tag wajib diisi.',
            'tag.string' => 'Nama tag harus berupa teks.',
            'tag.max' => 'Nama tag tidak boleh lebih dari 255 karakter.',
            'tag.unique' => 'Nama tag sudah digunakan.',
        ]);

        $tag->update([
            'tag' => $request->tag,
        ]);

        return redirect()->route('tags.index')->with('success', 'Berhasil Mengupdate Tag.');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Berhasil Menghapus Tag.');
    }
}