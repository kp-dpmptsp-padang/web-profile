<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('admin.employees.index', compact('employees'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'nip' => 'required|string|max:255|unique:employees,nip',
                'jabatan' => 'required|string|max:255',
                'file' => 'required|file',
            ]);

            $file = $request->file('file');
            $filePath = $file->store('documents', 'public');
            $documentName = 'DetailPegawai_' . $request->nama . '_' . time();

            $document = Document::create([
                'nama' => $documentName,
                'nama_file' => $filePath,
                'id_admin' => Auth::id(),
                'id_jenis' => null, // Set to null
                'tahun' => null, // Set to null
            ]);

            Employee::create([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'id_dokumen' => $document->id,
            ]);

            return response()->json(['success' => true]);
        } catch (ValidationException $e) {
            Log::error('Validation error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data pegawai, NIP sudah digunakan.'], 422);
        } catch (\Exception $e) {
            Log::error('Error storing employee: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menambahkan pegawai.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'nip' => 'required|string|max:255|unique:employees,nip,' . $id,
                'jabatan' => 'required|string|max:255',
                'file' => 'nullable|file',
            ]);

            $employee = Employee::findOrFail($id);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filePath = $file->store('documents', 'public');
                $documentName = 'DetailPegawai_' . $request->nama . '_' . time();

                if ($employee->document) {
                    // Delete the old file from storage
                    if ($employee->document->nama_file && Storage::exists($employee->document->nama_file)) {
                        Storage::delete($employee->document->nama_file);
                    }

                    $employee->document->update([
                        'nama' => $documentName,
                        'nama_file' => $filePath,
                    ]);
                } else {
                    $document = Document::create([
                        'nama' => $documentName,
                        'nama_file' => $filePath,
                        'id_admin' => Auth::id(),
                        'id_jenis' => null, // Set to null
                        'tahun' => null, // Set to null
                    ]);

                    $employee->id_dokumen = $document->id;
                }
            }

            $employee->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
            ]);

            return response()->json(['success' => true]);
        } catch (ValidationException $e) {
            Log::error('Validation error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal memperbarui data pegawai, NIP sudah digunakan.'], 422);
        } catch (\Exception $e) {
            Log::error('Error updating employee: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat memperbarui pegawai.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);

            if ($employee->document) {
                // Delete the file from storage
                if ($employee->document->nama_file && Storage::exists($employee->document->nama_file)) {
                    Storage::delete($employee->document->nama_file);
                }

                $employee->document->delete();
            }

            $employee->delete();

            return response()->json(['success' => true, 'message' => 'Pegawai berhasil dihapus.']);
        } catch (\Exception $e) {
            Log::error('Error deleting employee: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menghapus pegawai.'], 500);
        }
    }
}