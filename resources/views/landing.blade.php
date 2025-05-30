<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tel-U Care</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-[#a10808] to-[#5c0000] min-h-screen flex flex-col font-sans text-gray-800 scroll-smooth">

    {{-- Navbar --}}
    <header class="bg-white shadow py-3 px-6 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" class="w-8" alt="Logo">
            <div>
                <h1 class="text-red-700 font-bold text-lg">Tel-U Care</h1>
                <p class="text-xs text-gray-500 -mt-1">Sistem Pelaporan Fasilitas</p>
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <a href="{{ route('login') }}" class="border border-red-700 text-red-700 px-4 py-1.5 rounded-full text-sm hover:bg-red-700 hover:text-white transition">
                Masuk
            </a>
            <a href="{{ route('register') }}" class="bg-red-700 text-white px-4 py-1.5 rounded-full text-sm hover:bg-red-800 transition">
                Daftar Sekarang
            </a>
        </div>
    </header>

    {{-- Hero Section --}}
    <main class="flex justify-center items-center px-6 py-16">
        <div class="bg-white p-10 rounded-2xl text-center max-w-3xl shadow-xl border-t-4 border-red-600">
            <h2 class="text-4xl font-bold text-purple-800 mb-2">Tel-U Care</h2>
            <h3 class="text-lg text-red-700 font-semibold mb-4">Sistem Pelaporan Fasilitas Telkom University</h3>
            <div class="w-20 h-1 bg-red-600 mx-auto mb-6 rounded"></div>

            <p class="text-gray-700 leading-relaxed mb-8">
                Platform terintegrasi untuk melaporkan dan mengelola fasilitas kampus Telkom University.
                Memungkinkan seluruh civitas akademika melaporkan kerusakan fasilitas secara real-time,
                terdokumentasi, dan responsif untuk menciptakan lingkungan kampus yang lebih nyaman dan produktif.
            </p>

            <div class="flex justify-center gap-4">
                <a href="{{ route('login') }}" class="bg-red-700 text-white font-semibold px-6 py-2 rounded-full shadow hover:bg-red-800 transition">
                    Laporkan Kerusakan
                </a>
                <a href="#permasalahan" class="border border-red-700 text-red-700 font-semibold px-6 py-2 rounded-full hover:bg-red-700 hover:text-white transition">
                    Scan QR Fasilitas
                </a>
            </div>
        </div>
    </main>

    {{-- Permasalahan Section --}}
    <section id="permasalahan" class="px-6 py-16 text-gray-800">
        <div class="max-w-6xl mx-auto bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-md">
            <h2 class="text-3xl font-bold text-red-700 text-center mb-4">Permasalahan yang Dihadapi</h2>
            <p class="text-center text-gray-600 mb-10">
                Fasilitas umum di lingkungan kampus Telkom University memiliki peran penting dalam menunjang kenyamanan dan produktivitas civitas akademika.
                Namun, saat ini masih terdapat beberapa permasalahan dalam sistem pelaporan kerusakan fasilitas.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white border border-red-200 p-5 rounded-xl shadow-sm">
                    <h3 class="font-semibold text-red-700 text-lg mb-1">📚 Kerusakan Fasilitas Tidak Terlaporkan</h3>
                    <p class="text-sm text-gray-700">
                        Bangku taman, toilet, lampu penerangan, hingga sarana olahraga sering mengalami kerusakan namun tidak ada sistem pelaporan yang terintegrasi dan mudah diakses.
                    </p>
                </div>
                <div class="bg-white border border-red-200 p-5 rounded-xl shadow-sm">
                    <h3 class="font-semibold text-red-700 text-lg mb-1">📝 Pelaporan Manual Tidak Efektif</h3>
                    <p class="text-sm text-gray-700">
                        Laporan hanya disampaikan secara lisan, melalui media sosial, atau tidak disampaikan sama sekali, sehingga tidak terdokumentasi dengan baik.
                    </p>
                </div>
                <div class="bg-white border border-red-200 p-5 rounded-xl shadow-sm">
                    <h3 class="font-semibold text-red-700 text-lg mb-1">🕐 Tindak Lanjut Tidak Optimal</h3>
                    <p class="text-sm text-gray-700">
                        Proses perbaikan menjadi lambat bahkan dapat terabaikan sepenuhnya karena tidak ada sistem tracking yang jelas.
                    </p>
                </div>
                <div class="bg-white border border-red-200 p-5 rounded-xl shadow-sm">
                    <h3 class="font-semibold text-red-700 text-lg mb-1">📊 Kurangnya Data Analisis</h3>
                    <p class="text-sm text-gray-700">
                        Tidak ada data yang dapat digunakan untuk menganalisis area yang rawan kerusakan dan perencanaan pemeliharaan yang efektif.
                    </p>
                </div>
            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-16">
                <div class="bg-red-700 text-white p-6 rounded-xl text-center shadow-md">
                    <h4 class="text-3xl font-bold">50+</h4>
                    <p class="text-sm">Fasilitas Kampus</p>
                </div>
                <div class="bg-red-700 text-white p-6 rounded-xl text-center shadow-md">
                    <h4 class="text-3xl font-bold">25,000+</h4>
                    <p class="text-sm">Civitas Akademika</p>
                </div>
                <div class="bg-red-700 text-white p-6 rounded-xl text-center shadow-md">
                    <h4 class="text-3xl font-bold">Real-time</h4>
                    <p class="text-sm">Pelaporan & Tracking</p>
                </div>
                <div class="bg-red-700 text-white p-6 rounded-xl text-center shadow-md">
                    <h4 class="text-3xl font-bold">24/7</h4>
                    <p class="text-sm">Sistem Aktif</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
