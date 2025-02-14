<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $serviceTypes = ServiceType::all();
        return view('admin.testimonies.service-types.index', compact('serviceTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:service_types,name',
        ], [
            'name.required' => 'Nama jenis layanan wajib diisi.',
            'name.string' => 'Nama jenis layanan harus berupa teks.',
            'name.max' => 'Nama jenis layanan tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama jenis layanan sudah digunakan.',
        ]);

        ServiceType::create([
            'name' => $request->name, 
        ]);

        return redirect()->route('serviceType.index')->with('success', 'Berhasil Menambahkan Jenis Layanan.');
    }

    public function update(Request $request, $id)
    {
        $serviceType = ServiceType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:service_types,name,' . $serviceType->id,
        ], [
            'name.required' => 'Nama jenis layanan wajib diisi.',
            'name.string' => 'Nama jenis layanan harus berupa teks.',
            'name.max' => 'Nama jenis layanan tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama jenis layanan sudah digunakan.',
        ]);

        $serviceType->update([
            'name' => $request->name,
        ]);

        return redirect()->route('serviceType.index')->with('success', 'Berhasil Mengupdate Jenis Layanan.');
    }

    public function destroy($id)
    {
        $serviceType = ServiceType::findOrFail($id);
        $serviceType->delete();

        return redirect()->route('serviceType.index')->with('success', 'Berhasil Menghapus Jenis Layanan.');
    }
}