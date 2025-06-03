<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    // Menampilkan daftar laporan user (atau admin lihat semua)
    public function index()
    {
        $user = Auth::user();

        // Tampilkan laporan yang dibuat user ini saja
        $reports = Report::with('facility')
            ->where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        return view('reports.index', compact('reports'));
    }

    // Menampilkan form tambah laporan
    public function create()
    {
        $facilities = Facility::all();
        return view('reports.create', compact('facilities'));
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:5120', // max 5MB
        ]);

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('reports-media', 'public');
        }

        Report::create([
            'facility_id' => $validated['facility_id'],
            'user_id' => $user->id,
            'location' => $validated['location'],
            'description' => $validated['description'],
            'media_path' => $mediaPath,
            'status' => 'menunggu',
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dibuat.');
    }

    // Menampilkan detail laporan
    public function show(Report $report)
    {
        
        $report->load('facility', 'user');
        return view('reports.show', compact('report'));
    }

    // Form edit laporan (misal user ingin update)
    public function edit(Report $report)
    {
        
        $facilities = Facility::all();
        return view('reports.edit', compact('report', 'facilities'));
    }

    // Update laporan
    public function update(Request $request, Report $report)
    {
        

        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:5120',
        ]);

        if ($request->hasFile('media')) {
            if ($report->media_path) {
                Storage::disk('public')->delete($report->media_path);
            }
            $report->media_path = $request->file('media')->store('reports-media', 'public');
        }

        $report->update([
            'facility_id' => $validated['facility_id'],
            'location' => $validated['location'],
            'description' => $validated['description'],
            'media_path' => $report->media_path,
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Hapus laporan
    public function destroy(Report $report)
    {


        if ($report->media_path) {
            Storage::disk('public')->delete($report->media_path);
        }

        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
