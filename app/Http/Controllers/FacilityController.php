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
}
