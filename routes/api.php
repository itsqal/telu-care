<?php

use App\Models\Facility;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ReportFollowUp;

Route::get('/facilities', function () {
    $facilities = Facility::all();

    return response()->json($facilities);
});

Route::get('/reports', function () {
    $reports = Report::all();

    return response()->json($reports);
});

Route::get('/followup', function () {
    $followups = ReportFollowUp::all();

    return response()->json($followups);
});