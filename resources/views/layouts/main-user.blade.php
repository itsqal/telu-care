<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('appicon.ico')}}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @keyframes scanline {
            0% { top: 0%; }
            100% { top: 100%; }
        }
        .animate-scan-line {
            animation: scanline 2s linear infinite;
        }

        #qr-reader video {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
            border-radius: 0.75rem;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-200 font-sans">
    <div class="flex flex-col w-full min-h-screen">
        <!-- Top navbar -->
        <nav
            class="bg-white/90 backdrop-blur shadow-lg px-8 py-4 flex flex-col md:flex-row md:items-center md:justify-between sticky z-20 top-0 border-b border-gray-100">
            <div>
                <img class="w-8" src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <div class="flex-1"></div>
            <div class="relative flex flex-col justify-end" x-data="{ open: false }">
                <span class="font-semibold text-base text-gray-800 block mr-2 select-none">{{ Auth::user()->email
                    }}</span>
                <div class="flex justify-end">
                    <span class="font-normal text-sm text-gray-500 mr-2 select-none">{{ Auth::user()->name }}</span>
                    <button @click="open = !open" @click.away="open = false" class="focus:outline-none" aria-label="Akun">
                        <svg :class="{'rotate-180': open}" class="w-4 h-4 text-gray-600 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" x-transition
                    class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-gray-100 z-30">
                    <form method="POST" action="{{ route('logout') }}" @click.stop class="block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-50 flex items-center gap-2 rounded-b-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                            </svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <main class="flex-1 flex flex-col items-center py-4 px-2">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>