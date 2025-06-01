@extends('layouts.main')

@section('title', 'Dashboard | TelU Care')

@section('content')
<div class="ml-[18%]">
    <div class="px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-6 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">Edit Fasilitas</h2>
                    <p class="text-sm text-gray-600 mt-1">Ubah informasi fasilitas di bawah</p>
                </div>

                <form action="{{ route('facilities.update', $facility->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Fasilitas</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $facility->name) }}"
                            class="w-full rounded-lg p-2 border border-[#EFF0F6] focus:ring-1 focus:ring-[var(--color-red-main)] focus:border-[var(--color-red-main)] text-sm @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama fasilitas">
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Gedung /
                            Lokasi</label>
                        <input type="text" name="location" id="location"
                            value="{{ old('location', $facility->location) }}"
                            class="w-full rounded-lg p-2 border border-[#EFF0F6] focus:ring-1 focus:ring-[var(--color-red-main)] focus:border-[var(--color-red-main)] text-sm @error('location') border-red-500 @enderror"
                            placeholder="Masukkan lokasi atau gedung">
                        @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="floor" class="block text-sm font-medium text-gray-700 mb-1">Lantai</label>
                        <input type="number" name="floor" id="floor"
                            value="{{ old('floor', $facility->floor) }}"
                            class="w-full rounded-lg p-2 border border-[#EFF0F6] focus:ring-1 focus:ring-[var(--color-red-main)] focus:border-[var(--color-red-main)] text-sm @error('floor') border-red-500 @enderror"
                            placeholder="Masukkan nomor lantai">
                        @error('floor')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="room_number" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                            Ruangan</label>
                        <input type="text" name="room_number" id="room_number"
                            value="{{ old('room_number', $facility->room_number) }}"
                            class="w-full rounded-lg p-2 border border-[#EFF0F6] focus:ring-1 focus:ring-[var(--color-red-main)] focus:border-[var(--color-red-main)] text-sm @error('room_number') border-red-500 @enderror"
                            placeholder="Masukkan nomor ruangan">
                        @error('room_number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" id="description" rows="2"
                            class="w-full rounded-lg p-2 border border-[#EFF0F6] focus:ring-1 focus:ring-[var(--color-red-main)] focus:border-[var(--color-red-main)] text-sm @error('description') border-red-500 @enderror"
                            placeholder="Masukkan deskripsi fasilitas">{{ old('description', $facility->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('facilities.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-[var(--color-red-main)] rounded-lg hover:opacity-90">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection