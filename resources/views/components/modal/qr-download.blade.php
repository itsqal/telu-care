@props(['title' => 'QR Code'])

<div x-show="showQRModal" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Background backdrop -->
    <div x-show="showQRModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-25" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-25" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-500 opacity-25"></div>

    <!-- Modal -->
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="showQRModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                            <div class="flex items-center">
                                <h3 class="flex-grow text-center text-base font-semibold leading-6 text-gray-900"
                                    id="modal-title">
                                    {{ $title }}
                                </h3>

                                <button type="button" @click="showQRModal = false"
                                    class="ml-4 flex-shrink-0 inline-flex justify-center rounded-md bg-white px-2 py-1 text-sm font-semibold text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    x
                                </button>
                            </div>
                            <div class="mt-1">
                                <!-- You can access facility data using Alpine.js -->
                                <div class="">
                                    <!-- QR Code placeholder -->
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <img src="{{ asset('images/QR-code-animation.png') }}" alt="QR Code"
                                            class="w-100 h-100 object-contain rounded-lg" /> <!-- Download button -->
                                        <a :href="'{{ url('/admin/facility/qr-code/download') }}/' + currentFacility?.id"
                                            class="w-full flex items-center justify-center gap-2 bg-[var(--color-red-main)] hover:opacity-90 text-white py-2 rounded-lg transition cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                            <span class="font-regular">Unduh QR Code</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>