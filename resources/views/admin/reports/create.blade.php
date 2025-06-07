@extends('layouts.main')

@section('title', 'Dashboard | TelU Care')

@section('content')
<div class="ml-[18%]">
    <div class="px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-6 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">Tambah Tindak Lanjut Laporan</h2>
                    <p class="text-sm text-gray-600 mt-1">Isi formulir di bawah untuk menambahkan Tindak Lanjut</p>
                </div>

                <form action="{{ route('followUp.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Laporan</label>
                        <select id="report_id" name="report_id" required
                            class="mt-1 block w-full border-0 ring-1 ring-gray-300 focus:ring-2 focus:ring-red-600 rounded-lg px-4 py-2 bg-gray-50 text-gray-800 shadow-sm transition text-sm">
                            <option value="">-- Pilih Laporan --</option>
                            @foreach ($reports as $report)
                            <option value="{{ $report->id }}" {{ old('report_id')==$report->id ? 'selected' : '' }}>
                                {{ $report->user->name }} &bull; {{ $report->facility->name }} ({{
                                $report->facility->location }})
                                @if($report->description)
                                &bull; {{ Str::limit($report->description, 40) }}
                                @endif
                            </option>
                            @endforeach
                        </select>
                        @error('report_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="follow_up_status" class="block text-sm font-medium text-gray-700 mb-1">Status Tindak
                            Lanjut</label>
                        <select id="follow_up_status" name="follow_up_status" required
                            class="mt-1 block w-full border-0 ring-1 ring-gray-300 focus:ring-2 focus:ring-red-600 rounded-lg px-4 py-2 bg-gray-50 text-gray-800 shadow-sm transition text-sm">
                            <option value="">-- Pilih Status Tindak Lanjut --</option>
                            <option value="diterima" class="bg-green-50 text-green-700">Diterima</option>
                            <option value="ditolak" class="bg-red-50 text-red-700">Ditolak</option>
                        </select>
                        @error('follow_up_status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="follow_up_decsription"
                            class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Tindak Lanjut</label>
                        <input type="text" name="follow_up_decsription" value="{{ old('follow_up_decsription') }}"
                            class="w-full rounded-lg p-2 border border-[#EFF0F6] focus:ring-1 focus:ring-[var(--color-red-main)] focus:border-[var(--color-red-main)] text-sm"
                            placeholder="Masukan alasan/deskripsi tindak lanjut laporan">
                        @error('follow_up_decsription')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('followUp.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-[var(--color-red-main)] rounded-lg hover:opacity-90">
                            Simpan Data Tindak Lanjut
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection