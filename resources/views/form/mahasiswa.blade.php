@extends('layout')
@section('content')
<div class="relative min-h-screen flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8 animated-gradient-bg">
<nav class="absolute top-0 left-0 right-0 z-10 p-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-center h-16">
                <!-- Wadah Tombol dengan Efek Kaca Buram (Frosted Glass) -->
                <div
                    class="flex items-baseline space-x-2 bg-black/20 backdrop-blur-sm border border-white/10 shadow-lg rounded-full p-2">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link px-4 py-2 rounded-full text-sm font-medium transition duration-200"
                        :class="window.location.href.includes('dashboard') ? 'bg-white text-gray-800' : 'text-white hover:bg-white/20'">Beranda</a>
                </div>
            </div>
        </div>
    </nav>
    <header class="mb-8 text-center animate-pop-in stagger-1">
        <h2 class="text-3xl font-bold text-white">Formulir Tamu Mahasiswa</h2>
        <p class="text-blue-300 mt-2">Silakan isi data tamu dengan benar.</p>
    </header>
        <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-6 w-full max-w-xl bg-white/10 p-6 rounded-xl shadow-lg animate-pop-in stagger-2">   
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium text-blue-200">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="no_hp" class="block text-sm font-medium text-blue-200">Nomor HP</label>
                <input type="text" id="no_hp" name="no_hp" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="universitas" class="block text-sm font-medium text-blue-200">Nama Universitas</label>
                <input type="text" id="universitas" name="universitas" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="jumlah_klinis" class="block text-sm font-medium text-blue-200">Jumlah Mahasiswa Klinis</label>
                <input type="number" id="jumlah_klinis" name="jumlah_klinis" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <button type="submit" class="w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-600 transition duration-200 transform hover:scale-105 active:scale-95">Submit</button>
        </form>
    </div>
</div>
@endsection