@extends('layout')

@section('content')

<div class="min-h-screen flex flex-col items-center justify-center p-4 animate-fade-in">
    <header class="mb-6 text-center">
            <img src="{{ asset('image/logo.png') }}" alt="Logo Pengadilan" class="h-40 mx-auto" onerror="this.style.display='none'">
            <h1 class="text-2xl md:text-3xl font-bold text-white mt-4">Pengadilan Tata Usaha Negara Medan</h1>
            <p class="text-lg text-slate-400">Buku Tamu Elektronik</p>
        </header>

    <main class="w-full max-w-4xl bg-slate-800 p-8 md:p-12 rounded-xl shadow-2xl border border-slate-700 animate-pop-in">
            
            <h2 class="text-3xl font-bold text-center text-white mb-8">Pilih Tujuan Anda</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tombol 1: Tamu Sidang -->
                <a href="{{ route('pihak') }}" class="group bg-slate-700/50 hover:bg-teal-600/80 p-6 rounded-lg border border-slate-600 hover:border-teal-500 transition-all duration-300 transform hover:-translate-y-1 animate-pop-in stagger-1">
                    <div class="flex items-center gap-4">
                        <div class="bg-teal-500/10 text-teal-400 group-hover:bg-white/20 group-hover:text-white p-3 rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="m2 16 20 6-20 6Z"/><path d="M12.5 10.5 6 5"/><path d="m2 16 6-11 14 5-20 6Z"/><path d="M6 5v.01"/><path d="M12.5 10.5v0"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Tamu Sidang</h3>
                            <p class="text-slate-400 group-hover:text-slate-200 transition-colors duration-300">Untuk menghadiri persidangan.</p>
                        </div>
                    </div>
                </a>

                <!-- Tombol 2: Layanan PTSP -->
                <a href="{{ route('ptsp') }}" class="group bg-slate-700/50 hover:bg-teal-600/80 p-6 rounded-lg border border-slate-600 hover:border-teal-500 transition-all duration-300 transform hover:-translate-y-1 animate-pop-in stagger-2">
                    <div class="flex items-center gap-4">
                        <div class="bg-teal-500/10 text-teal-400 group-hover:bg-white/20 group-hover:text-white p-3 rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Layanan PTSP</h3>
                            <p class="text-slate-400 group-hover:text-slate-200 transition-colors duration-300">Pendaftaran, informasi, dan lainnya.</p>
                        </div>
                    </div>
                </a>

                <!-- Tombol 3: Tamu Dinas -->
                <a href="{{ route('dinas') }}" class="group bg-slate-700/50 hover:bg-teal-600/80 p-6 rounded-lg border border-slate-600 hover:border-teal-500 transition-all duration-300 transform hover:-translate-y-1 animate-pop-in stagger-3">
                    <div class="flex items-center gap-4">
                        <div class="bg-teal-500/10 text-teal-400 group-hover:bg-white/20 group-hover:text-white p-3 rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><rect width="20" height="14" x="2" y="6" rx="2"/><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Tamu Dinas</h3>
                            <p class="text-slate-400 group-hover:text-slate-200 transition-colors duration-300">Untuk keperluan kedinasan.</p>
                        </div>
                    </div>
                </a>

                <!-- Tombol 4: Tamu Mahasiswa -->
                <a href="{{ route('mahasiswa') }}" class="group bg-slate-700/50 hover:bg-teal-600/80 p-6 rounded-lg border border-slate-600 hover:border-teal-500 transition-all duration-300 transform hover:-translate-y-1 animate-pop-in stagger-4">
                    <div class="flex items-center gap-4">
                        <div class="bg-teal-500/10 text-teal-400 group-hover:bg-white/20 group-hover:text-white p-3 rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.084a1 1 0 0 0 0 1.838l8.57 4.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12v5a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3v-5"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Tamu Mahasiswa</h3>
                            <p class="text-slate-400 group-hover:text-slate-200 transition-colors duration-300">Untuk riset, magang, atau studi.</p>
                        </div>
                    </div>
                </a>
            </div>
        </main>
</div>
@endsection

@push('styles')
<style>
    .dashboard-button {
        @apply text-white font-semibold py-4 px-6 rounded-xl transition-transform duration-300 transform hover:scale-105 active:scale-95 shadow-md animate__animated animate__fadeInUp text-lg;
    }
</style>
@endpush
