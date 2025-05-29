@extends('layouts.auth')

@section('title', 'Register | TelU Care')

@section('content')
<div class="flex flex-col h-full relative">
    <div class="absolute top-8 left-8 mb-2">
        <img src="{{ asset('images/full-logo.png') }}" alt="TelU Care Logo" class="w-12">
    </div>
    <div class="flex-1 flex items-center justify-center">
        <div class="w-full max-w-sm space-y-4 pl-8">
            <div class="text-center space-y-1">
                <h2 class="text-xl font-bold mt-16">Mulai Bergabung Sekarang!</h2>
                <p class="text-[#787878] text-sm">Daftar menggunakan akun pegawai untuk bisa memiliki akses dashboard
                </p>
            </div>
            <form action="/register " method="POST" class="space-y-3">
                @csrf
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium">Nama Lengkap</label>
                    <input type="text" value="{{ old('name') }}" name="name" placeholder="Masukan nama lengkap anda"
                        class="text-sm w-full p-2 border rounded-lg placeholder:text-sm focus:ring-[var(--color-dark-red)] focus:ring-1 focus:outline-none" required>
                </div>

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="text" value="{{ old('email') }}" name="email" placeholder="Masukan email pegawai"
                        class="text-sm w-full p-2 border rounded-lg placeholder:text-sm focus:ring-[var(--color-dark-red)] focus:ring-1 focus:outline-none" required>
                </div>

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" placeholder="Masukan password"
                        class="text-sm w-full p-2 border rounded-lg placeholder:text-sm focus:ring-[var(--color-dark-red)] focus:ring-1 focus:outline-none" required>
                </div>

                <div class="space-y-2">
                    <label for="password_confirmation" class="block text-sm font-medium">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" placeholder="Masukan konfirmasi password"
                        class="text-sm w-full p-2 border rounded-lg placeholder:text-sm focus:ring-[var(--color-dark-red)] focus:ring-1 focus:outline-none" required>
                </div>

                <div class="flex justify-end">
                    <a href="#"><span class="text-sm text-[#637381] hover:underline">Lupa Password?</span></a>
                </div>

                @if ($errors->any())
                @php
                $errorMessage = collect($errors->all())->first();
                @endphp
                <p class="mt-3 text-xs text-center text-red-600 my-2 font-medium">
                    {{ $errorMessage }}
                </p>
                @endif

                <button type="submit"
                    class="w-full bg-[var(--color-red-main)] text-white font-bold py-2 rounded-lg hover:opacity-90">
                    DAFTAR
                </button>

                <p class="text-center text-sm">Sudah memiliki akun?
                    <a href="/login" class="text-[var(--color-red-main)] hover:text-[var(--color-dark-red)] hover:underline">Masuk</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection