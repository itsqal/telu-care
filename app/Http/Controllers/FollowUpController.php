<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function index()
    {
        $followUps = FollowUp::with('report')->get();
        return view('follow_ups.index', compact('followUps'));
    }

    public function create()
    {
        $reports = Report::all(); // ambil semua laporan
        return view('follow_ups.create', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_id' => 'required|exists:reports,id',
            'response' => 'required',
            'status' => 'required|in:Diproses,Selesai',
        ]);

        FollowUp::create($request->all());
        return redirect()->route('follow_ups.index')->with('success', 'Tindak lanjut berhasil ditambahkan.');
    }

    public function edit(FollowUp $followUp)
    {
        $reports = Report::all();
        return view('follow_ups.edit', compact('followUp', 'reports'));
    }

    public function update(Request $request, FollowUp $followUp)
    {
        $request->validate([
            'report_id' => 'required|exists:reports,id',
            'response' => 'required',
            'status' => 'required|in:Diproses,Selesai',
        ]);

        $followUp->update($request->all());
        return redirect()->route('follow_ups.index')->with('success', 'Tindak lanjut berhasil diperbarui.');
    }

    public function destroy(FollowUp $followUp)
    {
        $followUp->delete();
        return redirect()->route('follow_ups.index')->with('success', 'Tindak lanjut berhasil dihapus.');
    }
}
