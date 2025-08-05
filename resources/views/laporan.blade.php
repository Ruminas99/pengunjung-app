@extends('layout')

@section('content')

    <div class="animated-gradient-bg"></div>

    <div id="app" class="relative min-h-screen flex flex-col items-center p-4 sm:p-6 lg:p-8 animate-fade-in">
        <div class="w-full max-w-7xl mx-auto mt-10 md:mt-20">
            <!-- Header -->
            <header class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-white">Dasbor Laporan Harian</h1>
                <p class="text-xl text-blue-300">Pengadilan Tata Usaha Negara Medan</p>
                <p id="currentDate" class="text-lg text-sky-400 mt-2"></p>
            </header>

            <main>
                <!-- Tampilan Laporan Harian -->
                <div id="dailyReport">
                    <div class="glass-card p-6 rounded-xl w-full mb-6">
                        <p class="text-base font-medium text-blue-300">Total Tamu Hari Ini</p>
                        <p class="text-5xl font-bold text-white mt-1">{{ $jumlahHariIni }} Orang</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <!-- Kartu Statistik -->
                        <div class="glass-card p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <p class="font-medium text-blue-300">Tamu Sidang</p>
                                <span class="bg-sky-500/10 text-sky-400 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6">
                                        <path d="m2 16 20 6-20 6Z" />
                                        <path d="M12.5 10.5 6 5" />
                                        <path d="m2 16 6-11 14 5-20 6Z" />
                                        <path d="M6 5v.01" />
                                        <path d="M12.5 10.5v0" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-white mt-2">{{ $jumlahPihak }} Orang</p>
                        </div>
                        <div class="glass-card p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <p class="font-medium text-blue-300">Layanan PTSP</p>
                                <span class="bg-sky-500/10 text-sky-400 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-white mt-2">{{ $jumlahPtsp }} Orang</p>
                        </div>
                        <div class="glass-card p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <p class="font-medium text-blue-300">Tamu Dinas</p>
                                <span class="bg-sky-500/10 text-sky-400 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6">
                                        <rect width="20" height="14" x="2" y="6" rx="2" />
                                        <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-white mt-2">{{ $jumlahDinas }} Orang</p>
                        </div>
                        <div class="glass-card p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <p class="font-medium text-blue-300">Tamu Mahasiswa</p>
                                <span class="bg-sky-500/10 text-sky-400 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6">
                                        <path
                                            d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.084a1 1 0 0 0 0 1.838l8.57 4.908a2 2 0 0 0 1.66 0z" />
                                        <path d="M22 10v6" />
                                        <path d="M6 12v5a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3v-5" />
                                    </svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-white mt-2">{{ $jumlahMahasiswa }} Orang</p>
                        </div>
                    </div>

                    <div class="glass-card p-6 rounded-xl mt-6">
                        <h2 class="text-xl font-bold text-white mb-4">Daftar Seluruh Tamu Hari Ini</h2>
                        <ul class="space-y-3 max-h-96 overflow-y-auto pr-2">
                            @forelse ($daftarHariIniLengkap as $log)
                                <li class="flex items-center space-x-4 border-b border-white/10 pb-3 last:border-b-0 last:pb-0">
                                    <div>
                                        <p class="font-medium text-white">{{ $log['nama'] }}</p>
                                        <p class="text-sm text-blue-300">{{ $log['keterangan'] }} —
                                            {{ $log['waktu']->format('H:i') }}</p>
                                    </div>
                                </li>
                            @empty
                                <p class="text-sm text-blue-300">Belum ada tamu hari ini.</p>
                            @endforelse
                        </ul>
                    </div>

                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // --- DOM Element Selection ---
                        const dailyReportView = document.getElementById('dailyReport');
                        const monthlyReportView = document.getElementById('monthlyReport');
                        const toggleBtn = document.getElementById('toggleReportBtn');
                        const backBtn = document.getElementById('backToDailyBtn');
                        const dateElement = document.getElementById('currentDate');

                        // --- Set Today's Date in Indonesian ---
                        const setDate = () => {
                            const now = new Date();
                            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                            dateElement.textContent = "" + now.toLocaleDateString('id-ID', options);
                        };

                        // --- View Toggling Logic ---
                        const showMonthlyReport = () => {
                            dailyReportView.classList.add('hidden');
                            toggleBtn.classList.add('hidden'); // Hide the main button
                            monthlyReportView.classList.remove('hidden');
                        };

                        const showDailyReport = () => {
                            monthlyReportView.classList.add('hidden');
                            dailyReportView.classList.remove('hidden');
                            toggleBtn.classList.remove('hidden'); // Show the main button again
                        };

                        // --- Event Listeners ---
                        toggleBtn.addEventListener('click', showMonthlyReport);
                        backBtn.addEventListener('click', showDailyReport);

                        // --- Initializations ---
                        setDate();

                        // Trigger entry animations for elements that should slide up
                        const animatedElements = document.querySelectorAll('.animate-slide-up');
                        animatedElements.forEach(el => {
                            // By changing opacity, we allow the animation to play.
                            // The initial state is set in the CSS.
                            el.style.opacity = '1';
                        });
                    });
                </script>
        </div>
@endsection