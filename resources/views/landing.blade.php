<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tel-U Care | Sistem Pelaporan Fasilitas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-red-800 to-red-950 min-h-screen flex flex-col font-sans text-gray-900 scroll-smooth">

    {{-- Navbar --}}
    <header class="bg-white shadow-md py-3 px-6 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" class="w-10" alt="Logo Tel-U">
            <div>
                <h1 class="text-red-700 font-bold text-xl">Tel-U Care</h1>
                <p class="text-xs text-gray-600 -mt-1">Sistem Pelaporan Fasilitas Kampus</p>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('login.admin') }}" class="text-sm font-semibold text-red-700 border border-red-700 px-4 py-2 rounded-full hover:bg-red-700 hover:text-white transition duration-300">
                Masuk Sebagai Pegawai
            </a>
            <a href="{{ route('register') }}" class="text-sm font-semibold bg-red-700 text-white px-4 py-2 rounded-full hover:bg-red-800 transition duration-300">
                Daftar Sekarang
            </a>
        </div>
    </header>

    {{-- Hero Section --}}
    <main class="flex justify-center items-center px-6 py-20">
        <div class="bg-white p-10 rounded-2xl text-center max-w-3xl shadow-lg border-t-4 border-red-700 animate-fadeIn">
            <h2 class="text-4xl font-bold text-red-800 mb-2">Tel-U Care</h2>
            <h3 class="text-lg text-red-600 font-semibold mb-4">Solusi Digital Pelaporan Fasilitas Telkom University</h3>
            <div class="w-24 h-1 bg-red-700 mx-auto mb-6 rounded-full"></div>

            <p class="text-gray-700 text-sm leading-relaxed mb-8">
                Sistem pelaporan fasilitas kampus yang <strong>terintegrasi</strong>, <strong>real-time</strong>, dan <strong>akuntabel</strong>. 
                Dirancang khusus untuk menciptakan kampus Telkom University yang lebih <span class="text-red-700 font-semibold">nyaman</span> dan <span class="text-red-700 font-semibold">produktif</span>.
            </p>

            <div class="flex justify-center gap-4">
                <a href="{{ route('login.user') }}" class="bg-red-700 text-white font-semibold px-20 py-2 rounded-full shadow hover:bg-red-800 transition">
                    Masuk
                </a>
                <a href="#permasalahan" class="border border-red-700 text-red-700 font-semibold px-6 py-2 rounded-full hover:bg-red-700 hover:text-white transition">
                    📷 Scan QR Fasilitas
                </a>
            </div>
        </div>
    </main>

    {{-- Permasalahan Section --}}
    <section id="permasalahan" class="px-6 py-20 bg-white rounded-t-3xl shadow-inner">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-red-800 text-center mb-6">Kenapa Tel-U Butuh Ini?</h2>
            <p class="text-center text-gray-600 mb-10">
                Fasilitas kampus kita harus dijaga. Tapi tanpa sistem pelaporan yang modern dan cepat, perbaikan bisa tertunda. Ini masalahnya:
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ([
                    ['icon' => '📚', 'title' => 'Fasilitas Tidak Terlaporkan', 'desc' => 'Sering rusak, tapi tidak ada yang tahu karena tidak dilaporkan.'],
                    ['icon' => '📝', 'title' => 'Pelaporan Manual Tidak Efektif', 'desc' => 'Disampaikan lisan/media sosial — rawan lupa & tidak terdokumentasi.'],
                    ['icon' => '🕐', 'title' => 'Tindak Lanjut Lambat', 'desc' => 'Tanpa sistem tracking, laporan mudah terabaikan.'],
                    ['icon' => '📊', 'title' => 'Kurangnya Data Analitik', 'desc' => 'Tidak ada insight lokasi mana yang sering rusak.'],
                ] as $item)
                <div class="bg-white border border-red-100 p-5 rounded-xl shadow-sm hover:shadow-md transition duration-200">
                    <h3 class="font-semibold text-red-700 text-lg mb-1">{{ $item['icon'] }} {{ $item['title'] }}</h3>
                    <p class="text-sm text-gray-700">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-16 text-white">
                @foreach ([
                    ['value' => '50+', 'label' => 'Fasilitas Kampus'],
                    ['value' => '25,000+', 'label' => 'Civitas Akademika'],
                    ['value' => 'Real-time', 'label' => 'Pelaporan & Tracking'],
                    ['value' => '24/7', 'label' => 'Sistem Aktif'],
                ] as $stat)
                <div class="bg-red-700 p-6 rounded-xl text-center shadow-md">
                    <h4 class="text-3xl font-bold">{{ $stat['value'] }}</h4>
                    <p class="text-sm">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</body>
</html>