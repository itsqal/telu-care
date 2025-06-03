@extends('layouts.main')

@section('title', 'Edit Laporan Kerusakan')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-xl font-semibold text-red-700 mb-6">Edit Laporan Kerusakan</h1>

    <form action="{{ route('reports.update', $report->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="facility_id" class="block text-sm font-medium text-gray-700">Pilih Fasilitas</label>
            <select id="facility_id" name="facility_id" required
                class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-red-600 focus:border-red-600">
                <option value="">-- Pilih Fasilitas --</option>
                @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}" {{ old('facility_id', $report->facility_id) == $facility->id ? 'selected' : '' }}>
                        {{ $facility->name }} ({{ $facility->location }})
                    </option>
                @endforeach
            </select>
            @error('facility_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Lokasi Kerusakan</label>
            <input type="text" id="location" name="location" value="{{ old('location', $report->location) }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-red-600 focus:border-red-600">
            @error('location')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Kerusakan</label>
            <textarea id="description" name="description" rows="4" required
                class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-red-600 focus:border-red-600">{{ old('description', $report->description) }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="media" class="block text-sm font-medium text-gray-700">Unggah Foto/Video (Opsional)</label>
            <input type="file" id="media" name="media" accept="image/*,video/*"
                class="mt-1 block w-full text-gray-700">
            @error('media')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if($report->media_path)
            <p class="mt-2 text-sm text-gray-600">Media saat ini: 
                <a href="{{ asset('storage/' . $report->media_path) }}" target="_blank" class="text-red-700 hover:underline">
                    Lihat file
                </a>
            </p>
            @endif
        </div>

        <div class="flex justify-end">
            <a href="{{ route('reports.index') }}" class="mr-4 text-gray-500 hover:underline">Batal</a>
            <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded hover:bg-red-800 transition">
                Update Laporan
            </button>
        </div>
    </form>
</div>
@endsection
