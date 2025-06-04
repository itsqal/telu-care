@extends('layouts.main-user')

@section('title', 'Detail Laporan Kerusakan')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold text-red-700 mb-6">Detail Laporan Kerusakan</h1>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Fasilitas</h2>
        <p>{{ $report->facility->name ?? '-' }} ({{ $report->facility->location ?? '-' }})</p>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Lokasi Kerusakan</h2>
        <p>{{ $report->location }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Deskripsi</h2>
        <p>{{ $report->description }}</p>
    </div>

    @if($report->media_path)
    <div class="mb-4">
        <h2 class="text-lg font-semibold">Media Bukti</h2>
        @php
            $ext = pathinfo($report->media_path, PATHINFO_EXTENSION);
        @endphp

        @if(in_array(strtolower($ext), ['mp4', 'webm', 'ogg']))
            <video controls class="max-w-full rounded">
                <source src="{{ asset('storage/' . $report->media_path) }}" type="video/{{ $ext }}">
                Browser Anda tidak mendukung video.
            </video>
        @else
            <img src="{{ asset('storage/' . $report->media_path) }}" alt="Media Bukti" class="max-w-full rounded">
        @endif
    </div>
    @endif

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Status</h2>
        <p class="capitalize">{{ $report->status }}</p>
    </div>

    <a href="{{ route('reports.index') }}" class="inline-block mt-4 bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 transition">
        Kembali ke Daftar Laporan
    </a>
</div>
@endsection
