@extends('layouts.main')

@section('title', 'Dashboard | TelU Care')

@section('content')
<div x-data="{ showDeleteModal: false, showQRModal: false, deleteUrl: '', currentFacility: null }">
    <section class="ml-[18%]">
        <div class="px-4">
            <!-- Start coding here -->
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                @if (session('success'))
                <div id="success-message"
                    class="p-4 mb-4 text-sm text-green-800 bg-green-50 transition-opacity duration-500">
                    {{ session('success') }}
                </div>
                @endif

                <div class="flex items-center justify-between p-4 mb-2 bg-gray-50 border-b border-gray-200">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 placeholder-gray-400"
                            placeholder="Search">
                    </div>
                    <a href="{{ route('followUp.create') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-sans font-medium transition text-white bg-[var(--color-red-main)] cursor-pointer hover:opcity-90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Tindak Lanjut Laporan
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-[#667085] font-medium bg-gray-100">
                            <tr class="text-center">
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Nama Pelapor</th>
                                <th scope="col" class="px-4 py-3">Nama Fasilitas</th>
                                <th scope="col" class="px-4 py-3">Lokasi/Gedung</th>
                                <th scope="col" class="px-4 py-3">Nomor Ruangan</th>
                                <th scope="col" class="px-4 py-3">Deskripsi Laporan</th>
                                <th scope="col" class="px-4 py-3">Status Tindak Lanjut</th>
                                <th scope="col" class="px-4 py-3">Deskripsi Tindak Lanjut</th>
                                <th scope="col" class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($reports as $report)
                            <tr class="hover:bg-gray-50 text-center text-xs text-black">
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $report->user->name }}</td>
                                <td class="px-4 py-3">{{ $report->facility->name }}</td>
                                <td class="px-4 py-3">{{ $report->facility->location }}</td>
                                <td class="px-4 py-3">{{ $report->facility->room_number }}</td>
                                <td class="px-4 py-3">{{ $report->description }}</td>
                                <td class="px-4 py-3">
                                    @if($report->reportFollowUp)
                                    <span
                                        class="px-2 py-1 rounded font-semibold text-xs {{ $report->reportFollowUp->follow_up_status == 'diterima' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ ucfirst($report->reportFollowUp->follow_up_status) }}
                                    </span>
                                    @else
                                    <span class="text-gray-400 italic">Belum ada tindak lanjut</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if($report->reportFollowUp)
                                    <span class="break-words whitespace-pre-line block max-w-xs">{{
                                        $report->reportFollowUp->follow_up_decsription }}</span>
                                    @else
                                    <span class="text-gray-400 italic">Belum ada tindak lanjut</span>
                                    @endif
                                </td>

                                <td class="flex justify-around space-x-1 mr-1">
                                    <a href="{{ route('followUp.edit', $report->id) }}"
                                        class="text-white bg-[#FFB700] rounded-lg p-2 my-2 cursor-pointer hover:opacity-90 inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <button
                                        class="text-white bg-[#C30010] rounded-lg p-2 my-2 cursor-pointer hover:opacity-90">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="my-2 px-4">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>
    </section>

    <x-modal.delete-confirmation title="Hapus Fasilitas"
        message="Apakah Anda yakin ingin menghapus fasilitas ini? Aksi ini tidak dapat dibatalkan." />

    <x-modal.qr-download />
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.opacity = '0';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 500);
            }, 3000);
        }
    });
</script>
@endsection