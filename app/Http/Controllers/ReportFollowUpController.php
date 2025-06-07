<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportFollowUpController extends Controller
{
    // Tampilkan semua laporan
    public function index()
    {
        $reports = Report::with('facility', 'user', 'reportFollowUp')->latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    // Tampilkan form tambah laporan (oleh admin)
    public function create()
    {
        $facilities = Facility::all();
        return view('admin.reports.create', compact('facilities'));
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'user_id' => 'required|exists:users,id',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:5120',
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('reports-media', 'public');
        }

        Report::create([
            'facility_id' => $validated['facility_id'],
            'user_id' => $validated['user_id'],
            'location' => $validated['location'],
            'description' => $validated['description'],
            'media_path' => $mediaPath,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.reports.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    // Tampilkan detail laporan
    public function show(Report $report)
    {
        $report->load('facility', 'user');
        return view('admin.reports.show', compact('report'));
    }

    // Tampilkan form edit
    public function edit(Report $report)
    {
        $facilities = Facility::all();
        return view('admin.reports.edit', compact('report', 'facilities'));
    }

    // Simpan update
    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:menunggu,diproses,selesai',
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
            'status' => $validated['status'],
            'media_path' => $report->media_path,
        ]);

        return redirect()->route('admin.reports.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Hapus laporan
    public function destroy(Report $report)
    {
        if ($report->media_path) {
            Storage::disk('public')->delete($report->media_path);
        }
        $report->delete();

        return redirect()->route('admin.reports.index')->with('success', 'Laporan berhasil dihapus.');
    }

    // Update status secara khusus
    public function updateStatus(Request $request, Report $report)
    {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        $report->status = $validated['status'];
        $report->save();

        return redirect()->route('admin.reports.index')->with('success', 'Status laporan berhasil diperbarui.');
    }
}
