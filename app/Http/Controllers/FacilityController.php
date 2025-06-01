<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index () 
    {
        $facilities = Facility::latest()->paginate(10);
        return view('facility.index', compact('facilities'));
    }

    public function create()
    {
        return view('facility.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'floor' => 'integer|nullable',
            'room_number' => 'string|max:50|nullable',
            'description' => 'string|nullable'
        ]);

        Facility::create($validated);

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $facility = Facility::findOrFail($id);

        return view('facility.edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'floor' => 'integer|nullable',
            'room_number' => 'string|max:50|nullable',
            'description' => 'string|nullable'
        ]);

        $facility->update($validated);

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil diperbarui');
    }
}