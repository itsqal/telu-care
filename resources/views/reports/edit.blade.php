@extends('layouts.main-user')

@section('title', 'Edit Laporan Kerusakan')

@section('content')
<div class="w-full max-w-3xl mx-auto bg-white/90 shadow-xl rounded-2xl p-8 md:p-10 mt-6">
    <h1 class="text-2xl font-bold text-red-700 mb-6">✏️ Edit Laporan Kerusakan</h1>

    <form action="{{ route('reports.update', $report->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Fasilitas --}}
        <div>
            <label for="facility_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Fasilitas</label>
            <select id="facility_id" name="facility_id" required
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 shadow-sm focus:border-red-600 focus:ring-1 focus:ring-red-500 transition">
                <option value="">-- Pilih Fasilitas --</option>
                @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}" {{ old('facility_id', $report->facility_id) == $facility->id ? 'selected' : '' }}>
                        {{ $facility->name }} ({{ $facility->location }})
                    </option>
                @endforeach
            </select>
            @error('facility_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Lokasi --}}
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kerusakan</label>
            <input type="text" id="location" name="location" value="{{ old('location', $report->location) }}" required
                class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:border-red-600 focus:ring-1 focus:ring-red-500 transition" />
            @error('location')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Kerusakan</label>
            <textarea id="description" name="description" rows="4" required
                class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:border-red-600 focus:ring-1 focus:ring-red-500 transition resize-none">{{ old('description', $report->description) }}</textarea>
            @error('description')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Media --}}
        <div>
            <label for="media" class="block text-sm font-medium text-gray-700 mb-1">Unggah Foto/Video (Opsional)</label>
            <input type="file" id="media" name="media" accept="image/*,video/*"
                class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-lg file:bg-red-100 file:text-red-700 hover:file:bg-red-200 transition" />
            @error('media')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror

            {{-- Preview Gambar jika ada --}}
            @if($report->media_path)
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Media saat ini:</p>
                    @php
                        $ext = pathinfo($report->media_path, PATHINFO_EXTENSION);
                        $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                    @endphp

                    @if($isImage)
                        <img src="{{ asset('storage/' . $report->media_path) }}" alt="Media" class="w-full max-w-xs rounded-lg shadow-md">
                    @else
                        <a href="{{ asset('storage/' . $report->media_path) }}" target="_blank" class="text-red-600 hover:underline">Lihat File</a>
                    @endif
                </div>
            @endif
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end items-center gap-4 pt-4">
            <a href="{{ route('reports.index') }}" class="text-sm text-gray-500 hover:text-gray-700 underline">Batal</a>
            <button type="submit"
                class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg shadow-md transition-all duration-200">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
