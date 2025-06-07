@extends('layouts.main-user')

@section('title', 'Daftar Laporan Kerusakan')

@section('content')
<div class="w-full max-w-6xl mx-auto bg-white/90 shadow-xl rounded-2xl p-8 md:p-12 mt-6">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
        <h1 class="text-2xl md:text-3xl font-bold text-red-700 tracking-tight">Daftar Laporan Kerusakan</h1>
        <a href="{{ route('reports.create') }}"
            class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Laporan
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 rounded-lg bg-green-50 p-4 text-green-700 border border-green-200 shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-gray-100 shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 text-sm bg-white rounded-xl overflow-hidden">
            <thead class="bg-gradient-to-r from-red-600 to-red-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-center font-semibold tracking-wider">No</th>
                    <th class="px-6 py-3 text-center font-semibold tracking-wider">Lokasi</th>
                    <th class="px-6 py-3 text-center font-semibold tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-center font-semibold tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center font-semibold tracking-wider">Fasilitas</th>
                    <th class="px-6 py-3 text-center font-semibold tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-center font-semibold tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse($reports as $index => $report)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $index + $reports->firstItem() }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-xs font-medium">{{ $report->facility->name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $report->location }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-700">{{ Str::limit($report->description, 60) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-xs">
                        @php
                        $statusClasses = [
                        'menunggu' => 'bg-yellow-100 text-yellow-800',
                        'diproses' => 'bg-blue-100 text-blue-800',
                        'selesai' => 'bg-green-100 text-green-800',
                        'ditolak' => 'bg-red-100 text-red-800',
                        ];
                        @endphp
                        <span
                            class="inline-block px-3 py-1 rounded-full text-xs font-semibold shadow-sm {{ $statusClasses[$report->status] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($report->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-600 text-xs">{{ $report->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center space-x-2 text-xs">
                        <a href="{{ route('reports.show', $report->id) }}"
                            class="inline-block px-3 py-1 rounded-md bg-indigo-50 text-indigo-700 hover:bg-indigo-100 font-medium transition">Detail</a>
                        <a href="{{ route('reports.edit', $report->id) }}"
                            class="inline-block px-3 py-1 rounded-md bg-green-50 text-green-700 hover:bg-green-100 font-medium transition">Edit</a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Yakin ingin menghapus laporan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block px-3 py-1 rounded-md bg-red-50 text-red-700 hover:bg-red-100 font-medium transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-6 text-center text-gray-400 text-base">
                        Belum ada laporan kerusakan yang dibuat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8 flex justify-center">
        {{ $reports->links() }}
    </div>
</div>
@endsection