@extends('layout')

@section('content')

<div class="animated-gradient-bg"></div>

    <div class="relative min-h-screen flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8 animate-fade-in">
    
        <!-- Header -->
        <header class="mb-10 text-center">
            <img src="{{ asset('image/logo-beranda.png') }}" alt="Logo Si Butet" class="h-32 sm:h-70 mx-auto shadow-2xl shadow-blue-500/20 ">
            <h1 class="text-3xl md:text-4xl font-bold text-white mt-6 tracking-tight">Pengadilan Tata Usaha Negara Medan</h1>
        </header>

        <!-- Konten Utama -->
        <main class="w-full max-w-4xl animate-pop-in" style="animation-delay: 0.2s;">
            <h2 class="text-3xl font-bold text-center text-white mb-8">Pilih Tujuan Kunjungan Anda</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Tombol Pilihan -->
                <a href="pihak" class="interactive-card group p-6 rounded-xl transform hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/30 animate-pop-in stagger-1">
                    <div class="flex items-center gap-5">
                        <div class="bg-white/10 text-sky-300 group-hover:text-white p-3 rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="m2 16 20 6-20 6Z"/><path d="M12.5 10.5 6 5"/><path d="m2 16 6-11 14 5-20 6Z"/><path d="M6 5v.01"/><path d="M12.5 10.5v0"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Tamu Sidang</h3>
                            <p class="text-blue-300 group-hover:text-blue-100 transition-colors duration-300">Untuk menghadiri persidangan.</p>
                        </div>
                    </div>
                </a>

                <a href="ptsp" class="interactive-card group p-6 rounded-xl transform hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/30 animate-pop-in stagger-2">
                    <div class="flex items-center gap-5">
                        <div class="bg-white/10 text-sky-300 group-hover:text-white p-3 rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Layanan PTSP</h3>
                            <p class="text-blue-300 group-hover:text-blue-100 transition-colors duration-300">Pendaftaran, informasi, dan lainnya.</p>
                        </div>
                    </div>
                </a>

                <a href="dinas" class="interactive-card group p-6 rounded-xl transform hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/30 animate-pop-in stagger-3">
                    <div class="flex items-center gap-5">
                        <div class="bg-white/10 text-sky-300 group-hover:text-white p-3 rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><rect width="20" height="14" x="2" y="6" rx="2"/><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Tamu Dinas</h3>
                            <p class="text-blue-300 group-hover:text-blue-100 transition-colors duration-300">Untuk keperluan kedinasan.</p>
                        </div>
                    </div>
                </a>

                <a href="mahasiswa" class="interactive-card group p-6 rounded-xl transform hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/30 animate-pop-in stagger-4">
                    <div class="flex items-center gap-5">
                        <div class="bg-white/10 text-sky-300 group-hover:text-white p-3 rounded-lg transition-colors duration-300">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.084a1 1 0 0 0 0 1.838l8.57 4.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12v5a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3v-5"/></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Tamu Mahasiswa</h3>
                            <p class="text-blue-300 group-hover:text-blue-100 transition-colors duration-300">Untuk riset, magang, atau studi.</p>
                        </div>
                    </div>
                </a>

            </div>
        </main>
    </div>

    <script>
        // JavaScript untuk efek kilau interaktif yang mengikuti kursor
        document.querySelectorAll('.interactive-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            });
        });
    </script>
@endsection

@push('styles')
<style>
    .dashboard-button {
        @apply text-white font-semibold py-4 px-6 rounded-xl transition-transform duration-300 transform hover:scale-105 active:scale-95 shadow-md animate__animated animate__fadeInUp text-lg;
    }

     @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes popIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Menerapkan animasi dengan delay yang berbeda */
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .animate-pop-in {
            animation: popIn 0.6s ease-out forwards;
            opacity: 0; /* Mulai dari transparan */
        }

        .stagger-1 { animation-delay: 0.2s; }
        .stagger-2 { animation-delay: 0.3s; }
        .stagger-3 { animation-delay: 0.4s; }
        .stagger-4 { animation-delay: 0.5s; }
</style>
@endpush
