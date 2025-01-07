<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // $beritas = Berita::all();
        // return view('admin.berita.index', compact('beritas'));
        return view('admin.berita.index');
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.berita.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Berita::create($request->all());
        return redirect()->route('beritas.index')->with('success', 'Berita created successfully.');
    }

    // Display the specified resource.
    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    // Show the form for editing the specified resource.
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $berita->update($request->all());
        return redirect()->route('beritas.index')->with('success', 'Berita updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('beritas.index')->with('success', 'Berita deleted successfully.');
    }
}
