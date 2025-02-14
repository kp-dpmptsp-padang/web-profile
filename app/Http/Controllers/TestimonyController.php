<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::with('serviceType')->latest()->paginate(10);
        $serviceTypes = ServiceType::all();
        return view('admin.testimonies.index', compact('testimonies', 'serviceTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_type_id' => 'required|exists:service_types,id',
            'date' => 'required|date',
            'queue_number' => 'required|string|max:255',
            'testimony' => 'required|string',
        ]);

        Testimony::create([
            'service_type_id' => $request->service_type_id,
            'date' => $request->date,
            'queue_number' => $request->queue_number,
            'testimony' => $request->testimony,
        ]);

        return redirect()->route('testimony.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $testimony = Testimony::findOrFail($id);

        $request->validate([
            'service_type_id' => 'required|exists:service_types,id',
            'date' => 'required|date',
            'queue_number' => 'required|string|max:255',
            'testimony' => 'required|string',
        ]);

        $testimony->update([
            'service_type_id' => $request->service_type_id,
            'date' => $request->date,
            'queue_number' => $request->queue_number,
            'testimony' => $request->testimony,
        ]);

        return redirect()->route('testimony.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimony = Testimony::findOrFail($id);
        $testimony->delete();

        return redirect()->route('testimony.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}