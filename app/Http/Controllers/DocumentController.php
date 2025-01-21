<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request) {
        $query = Document::excludeEmployeeAndStandarPelayananDocuments();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        if ($request->has('document_type') && $request->document_type != '') {
            $query->where('id_jenis', $request->document_type);
        }

        if ($request->has('year') && $request->year != '') {
            $query->where('tahun', $request->year);
        }

        $documents = $query->latest()->paginate(10);
        $documentTypes = DocumentType::all();

        return view('admin.documents.index', compact('documents', 'documentTypes'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'file' => 'required|file',
            'document_type_id' => 'required|exists:document_types,id',
            'tahun' => 'required|integer',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('documents', 'public');

        Document::create([
            'nama' => $request->nama_dokumen,
            'nama_file' => $filePath,
            'id_admin' => Auth::id(),
            'id_jenis' => $request->document_type_id,
            'tahun' => $request->tahun,
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'document_type_id' => 'required|exists:document_types,id',
            'tahun' => 'required|integer',
        ]);

        $document = Document::findOrFail($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('documents');

            // Delete the old file from storage
            if ($document->nama_file && Storage::exists($document->nama_file)) {
                Storage::delete($document->nama_file);
            }

            $document->nama_file = $filePath;
        }

        $document->update([
            'nama' => $request->nama_dokumen,
            'id_jenis' => $request->document_type_id,
            'tahun' => $request->tahun,
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        try {
            $document = Document::findOrFail($id);
    
            // Log the document details
            Log::info('Deleting document: ', [
                'id' => $document->id, 
                'file' => $document->nama_file
            ]);
    
            // Delete the file from storage
            if ($document->nama_file && Storage::exists($document->nama_file)) {
                try {
                    Storage::delete($document->nama_file);
                } catch (\Exception $e) {
                    Log::error('Failed to delete file from storage: ' . $e->getMessage());
                    return response()->json([
                        'success' => false, 
                        'message' => 'Failed to delete file from storage'
                    ], 500);
                }
            }
    
            // Delete the database record
            $document->delete();
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Failed to delete document: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Failed to delete document: ' . $e->getMessage()
            ], 500);
        }
    }

    public function standarPelayanan()
    {
        $documentType = DocumentType::where('jenis_dokumen', 'standar-pelayanan')->firstOrFail();
        $documents = Document::where('id_jenis', $documentType->id)->latest()->paginate(10);

        return view('standar-pelayanan', compact('documents'));
    }
}