<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Facility;
use App\Models\ReportFollowUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportFollowUpController extends Controller
{
    public function index()
    {
        $reports = Report::with('facility', 'user', 'reportFollowUp')->latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        $reports = Report::with('user', 'facility', 'reportFollowUp')->get();
        return view('admin.reports.create', compact('reports'));
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        // Validasi report_id, follow_up_staus, follow_up_description

        // Cari data report dari request()->report_id

        // Ubah filed status report jadi report->statu = 'diproses'

        // Buat data Report follow up 
        ReportFollowUp::create([
            'report_id' => request()->report_id,
            'follow_up_status' => request()->follow_up_status,
            'follow_up_description' => request()->follow_up_description
        ]);

        return redirect()->route('facilities.index')->with('success', 'Data tindak lanjut berhasil ditambahkan');
    }

    public function show(Report $report)
    {
        $report->load('facility', 'user', 'reportFollowUp');
        // bikin viewnya belum dibuat
        return view('admin.reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'follow_up_status' => 'required|in:diterima,ditolak',
            'follow_up_description' => 'required|string',
        ]);

        $reportFollowUp = $report->reportFollowUp;
        if ($reportFollowUp) {
            $reportFollowUp->update([
                'follow_up_status' => $validated['follow_up_status'],
                'follow_up_decsription' => $validated['follow_up_description'],
            ]);
        } else {
            $report->reportFollowUp()->create([
                'follow_up_status' => $validated['follow_up_status'],
                'follow_up_decsription' => $validated['follow_up_description'],
            ]);
        }

        return redirect()->route('followUp.index')->with('success', 'Data tindak lanjut berhasil diperbarui');
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
}
