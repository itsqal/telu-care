@extends('layouts.main')

@section('title', 'Tambah Laporan Kerusakan')

@section('content')
<div class="ml-64 px-8 py-10"> {{-- Hindari nabrak sidebar --}}
    <h1 class="text-2xl font-bold text-red-700 flex items-center gap-2 mb-8">
        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Tambah Laporan Kerusakan
    </h1>

    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        {{-- Pilih Fasilitas --}}
        <div>
            <label for="facility_id" class="block text-sm font-medium text-gray-700">Pilih Fasilitas <span class="text-red-600">*</span></label>
            <select id="facility_id" name="facility_id" required
                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Fasilitas --</option>
                @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}" {{ old('facility_id') == $facility->id ? 'selected' : '' }}>
                        {{ $facility->name }} ({{ $facility->location }})
                    </option>
                @endforeach
            </select>
            @error('facility_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Lokasi --}}
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Lokasi Kerusakan <span class="text-red-600">*</span></label>
            <input type="text" id="location" name="location" value="{{ old('location') }}" required
                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('location')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="col-span-1 md:col-span-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Kerusakan <span class="text-red-600">*</span></label>
            <textarea id="description" name="description" rows="4" required
                placeholder="Contoh: AC tidak dingin, suara bising dari mesin, dll."
                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Upload Media --}}
        <div class="col-span-1 md:col-span-2">
            <label for="media" class="block text-sm font-medium text-gray-700">Unggah Foto/Video (Opsional)</label>
            <input type="file" id="media" name="media" accept="image/*,video/*"
                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('media')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="col-span-1 md:col-span-2 flex justify-end gap-4">
            <a href="{{ route('reports.index') }}"
               class="text-gray-600 hover:text-red-600 font-medium transition duration-200">Batal</a>
            <button type="submit"
                class="bg-red-700 text-white px-6 py-2 rounded-md hover:bg-red-800 transition duration-200">
                Kirim Laporan
            </button>
        </div>
    </form>
</div>
@endsection
