<?php

use App\Models\Facility;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/facilities', function () {
    $facilities = Facility::all();

    return response()->json($facilities);
});

Route::get('/reports', function () {
    $reports = Report::all();

    return response()->json($reports);
});