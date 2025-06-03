@extends('layouts.main')

@section('title', 'Daftar Laporan Kerusakan')

@section('content')
<div class="bg-white shadow rounded-lg p-8 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-red-700">Daftar Laporan Kerusakan</h1>
        <a href="{{ route('reports.create') }}"
           class="inline-flex items-center px-5 py-2 bg-red-700 hover:bg-red-800 text-white font-semibold rounded-md shadow transition">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
           </svg>
           Tambah Laporan
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-md bg-green-50 p-4 text-green-700 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-red-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Fasilitas</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($reports as $index => $report)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + $reports->firstItem() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $report->facility->name ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $report->location }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ Str::limit($report->description, 60) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusClasses = [
                                    'menunggu' => 'bg-yellow-100 text-yellow-800',
                                    'diproses' => 'bg-blue-100 text-blue-800',
                                    'selesai' => 'bg-green-100 text-green-800',
                                ];
                            @endphp
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $statusClasses[$report->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($report->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $report->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center space-x-3">
                            <a href="{{ route('reports.show', $report->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Detail</a>
                            <a href="{{ route('reports.edit', $report->id) }}" class="text-green-600 hover:text-green-900 font-medium">Edit</a>
                            <form action="{{ route('reports.destroy', $report->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus laporan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-6 text-center text-gray-500">
                            Belum ada laporan kerusakan yang dibuat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $reports->links() }}
    </div>
</div>
@endsection
