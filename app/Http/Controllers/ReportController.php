<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::where('user_id', Auth::id())->latest()->get();
        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('reports.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov|max:20480',
        ]);

        $path = null;
        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('reports', 'public');
        }

        Report::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'location' => $request->location,
            'description' => $request->description,
            'media_path' => $path,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
