@extends('layouts.main-user')

@section('title', 'Detail Laporan Kerusakan')

@section('content')
<div class="w-full max-w-5xl mx-auto bg-white/90 shadow-xl rounded-2xl p-8 md:p-12 mt-6">
    <h1 class="text-2xl md:text-3xl font-bold text-red-700 mb-8 flex items-center gap-2">
        📝 Detail Laporan Kerusakan
    </h1>

    <div class="grid md:grid-cols-2 gap-8">
        {{-- Kiri: Informasi --}}
        <div class="space-y-8">

            {{-- Fasilitas --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-1 flex items-center gap-2">
                    🛠️ <span class="uppercase tracking-wide">Fasilitas</span>
                </h3>
                <p class="text-base text-gray-900 pl-6">
                    {{ $report->facility->name ?? '-' }}
                    <span class="text-sm text-gray-500">({{ $report->facility->location ?? '-' }})</span>
                </p>
            </div>

            {{-- Lokasi --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-1 flex items-center gap-2">
                    📍 <span class="uppercase tracking-wide">Lokasi Kerusakan</span>
                </h3>
                <p class="text-base text-gray-900 pl-6">{{ $report->location }}</p>
            </div>

            {{-- Deskripsi --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-1 flex items-center gap-2">
                    📝 <span class="uppercase tracking-wide">Deskripsi</span>
                </h3>
                <p class="text-base text-gray-900 pl-6 leading-relaxed">{{ $report->description }}</p>
            </div>

            {{-- Status --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-1 flex items-center gap-2">
                    📌 <span class="uppercase tracking-wide">Status</span>
                </h3>
                @php
                    $statusClasses = [
                        'menunggu' => 'bg-yellow-100 text-yellow-800',
                        'diproses' => 'bg-blue-100 text-blue-800',
                        'selesai' => 'bg-green-100 text-green-800',
                        'ditolak' => 'bg-red-100 text-red-800',
                    ];
                    $statusIcon = [
                        'menunggu' => '⏳',
                        'diproses' => '🔧',
                        'selesai' => '✅',
                        'ditolak' => '❌',
                    ];
                @endphp
                <div class="pl-6 mt-1">
                    <span class="inline-flex items-center gap-2 px-4 py-1 rounded-full text-sm font-semibold shadow-sm {{ $statusClasses[$report->status] ?? 'bg-gray-100 text-gray-800' }}">
                        {{ $statusIcon[$report->status] ?? '📄' }} {{ ucfirst($report->status) }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Kanan: Media --}}
        @if($report->media_path)
        <div class="flex flex-col items-center">
            <h3 class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                <span class="uppercase tracking-wide">Media Bukti</span>
            </h3>
            @php
                $ext = pathinfo($report->media_path, PATHINFO_EXTENSION);
                $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            @endphp

            @if($isImage)
                <a href="{{ asset('storage/' . $report->media_path) }}" target="_blank">
                    <img src="{{ asset('storage/' . $report->media_path) }}"
                        alt="Media Bukti"
                        class="rounded-lg shadow-md max-w-xs w-full object-cover border border-gray-200 hover:shadow-xl hover:scale-105 transition cursor-zoom-in">
                </a>
            @else
                <video controls class="rounded-lg shadow-md max-w-xs w-full">
                    <source src="{{ asset('storage/' . $report->media_path) }}" type="video/{{ $ext }}">
                    Browser Anda tidak mendukung video.
                </video>
            @endif
        </div>
        @endif
    </div>

    {{-- Tombol Kembali --}}
    <div class="mt-10 text-right">
        <a href="{{ route('reports.index') }}"
            class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg shadow-md transition-all duration-200">
            ⬅️ Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
