@extends('layouts.main')

@section('title', 'Buat Laporan')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Buat Laporan Kerusakan</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="category_id" class="block font-medium text-gray-700">Kategori Fasilitas</label>
            <select name="category_id" id="category_id" class="w-full mt-1 border-gray-300 rounded">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="location" class="block font-medium text-gray-700">Lokasi</label>
            <input type="text" name="location" id="location" class="w-full mt-1 border-gray-300 rounded" value="{{ old('location') }}" required>
        </div>

        <div>
            <label for="description" class="block font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="w-full mt-1 border-gray-300 rounded" required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="media" class="block font-medium text-gray-700">Upload Bukti (Opsional)</label>
            <input type="file" name="media" id="media" class="w-full mt-1 text-sm">
            <p class="text-xs text-gray-500">Jenis file yang didukung: JPG, PNG, MP4, MOV. Maksimal 20MB.</p>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-[var(--color-red-main)] text-white px-4 py-2 rounded hover:bg-[var(--color-dark-red)]">
                Kirim Laporan
            </button>
        </div>
    </form>
</div>
@endsection