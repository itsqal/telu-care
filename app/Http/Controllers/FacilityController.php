<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use BaconQrCode\Renderer\GDLibRenderer;
use BaconQrCode\Writer;

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

    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();

        return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil dihapus');
    }

    public function downloadQRCode($id)
    {
        $facility = Facility::findOrFail($id);
        
        $url = route('scan.qr'); 

        $renderer = new GDLibRenderer(500);

        $writer = new Writer($renderer);
        $qrImage = $writer->writeString($url);
    
        return response()->stream(function () use ($qrImage) {
            echo $qrImage;
        }, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="qr-code-' . $facility->name . '.png"',
        ]);
    }
}