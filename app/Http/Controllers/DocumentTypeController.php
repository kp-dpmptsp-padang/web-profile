<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $documentTypes = DocumentType::with('documents')->get();
        return view('admin.documents.types.index', compact('documentTypes'));
    }

    public function store(Request $request) {
        $request->validate([
            'jenis_dokumen' => 'required|string|max:255|unique:document_types,jenis_dokumen',
        ], [
            'jenis_dokumen.unique' => 'Jenis dokumen sudah ada. Silakan masukkan nama yang berbeda.',
        ]);

        DocumentType::create($request->all());

        return redirect()->route('documentType.index')->with('success', 'Jenis dokumen berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'jenis_dokumen' => 'required|string|max:255|unique:document_types,jenis_dokumen,' . $id,
        ], [
            'jenis_dokumen.unique' => 'Jenis dokumen sudah ada. Silakan masukkan nama yang berbeda.',
        ]);

        $documentType = DocumentType::findOrFail($id);
        $documentType->update($request->all());

        return redirect()->route('documentType.index')->with('success', 'Jenis dokumen berhasil diperbarui.');
    }

    public function destroy($id) {
        $documentType = DocumentType::findOrFail($id);

        try {
            $documentType->delete();
            return redirect()->route('documentType.index')->with('success', 'Jenis dokumen berhasil dihapus.');
        } catch (QueryException $e) {
            return redirect()->route('documentType.index')->with('error', 'Jenis dokumen tidak dapat dihapus karena masih terkait dengan dokumen lain.');
        }
    }
}