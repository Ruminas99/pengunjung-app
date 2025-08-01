@extends('layout')

@section('content')

<div class="bg-slate-900 text-gray-300">

    <div id="app" class="min-h-screen flex flex-col items-center justify-center sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto mt-20 p-6 rounded-lg shadow-lg">
            <div class="mb-8 animate-fade-in">
                <h1 class="text-3xl md:text-4xl font-bold text-white">Buku Tamu Elektronik</h1>
                <p class="text-xl text-slate-300">Pengadilan Tata Usaha Negara Medan</p>
                <p id="currentDate" class="text-lg text-teal-400 mt-2"></p>
            </div>

            <main>
                <div id="dailyReport">
                     <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700 w-full mb-6 animate-slide-up opacity-0">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                            <div>
                                <p class="text-base font-medium text-slate-400">Total Tamu Hari Ini</p>
                                <p class="text-4xl font-bold text-white mt-1">{{ $jumlahHariIni }} Orang</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700 transform hover:scale-105 transition-transform duration-300 animate-slide-up stagger-2 opacity-0">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-400">Tamu Sidang</p>
                                <span class="bg-teal-500/10 text-teal-400 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="m2 16 20 6-20 6Z"/><path d="M12.5 10.5 6 5"/><path d="m2 16 6-11 14 5-20 6Z"/><path d="M6 5v.01"/><path d="M12.5 10.5v0"/></svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-white mt-2">{{ $jumlahPihak }} Orang</p>
                        </div>
                        
                        <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700 transform hover:scale-105 transition-transform duration-300 animate-slide-up stagger-3 opacity-0">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-400">Tamu Layanan PTSP</p>
                                <span class="bg-teal-500/10 text-teal-400 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-white mt-2">{{ $jumlahPtsp }} Orang</p>
                        </div>
                        
                        <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700 transform hover:scale-105 transition-transform duration-300 animate-slide-up stagger-4 opacity-0">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-400">Tamu Dinas</p>
                                <span class="bg-teal-500/10 text-teal-400 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><rect width="20" height="14" x="2" y="6" rx="2"/><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-white mt-2">{{ $jumlahDinas }} Orang</p>
                        </div>
                        
                        <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700 transform hover:scale-105 transition-transform duration-300 animate-slide-up stagger-4 opacity-0">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-slate-400">Tamu Mahasiswa</p>
                                <span class="bg-teal-500/10 text-teal-400 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.084a1 1 0 0 0 0 1.838l8.57 4.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12v5a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3v-5"/></svg>
                                </span>
                            </div>
                            <p class="text-3xl font-bold text-white mt-2">{{ $jumlahMahasiswa }} Orang</p>
                        </div>
                    </div>

                    <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700 animate-slide-up stagger-5 opacity-0">
                        <h2 class="text-xl font-bold text-white mb-4">Daftar Tamu Masuk Terbaru</h2>
                        <ul class="space-y-4">
                            @foreach ($daftarTerbaru as $log)
                            <li class="flex items-center space-x-4">
                                <div>
                                    <p class="font-medium text-white">{{ $log['nama'] }}</p>
                                    <p class="text-sm text-slate-400">{{ $log['keterangan'] }} — {{ $log['waktu']->format('d M Y H:i') }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div id="monthlyReport" class="hidden animate-fade-in">
                    <h2 class="text-2xl font-bold text-white mb-6">Laporan Kunjungan Bulanan</h2>

                    <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700 animate-slide-up stagger-5 opacity-0 mt-6 w-full overflow-x-auto">
                        <h2 class="text-xl font-bold text-white mb-4">Laporan Detail Bulanan</h2>

                        @if(count($dataBulananLengkap) === 0)
                            <p class="text-slate-400">Tidak ada data untuk bulan ini.</p>
                        @else
                            <table class="min-w-full text-sm text-left text-gray-400">
                                <thead class="text-xs uppercase bg-slate-700 text-gray-300">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">No</th>
                                        <th scope="col" class="px-6 py-3">Nama</th>
                                        <th scope="col" class="px-6 py-3">Keterangan</th>
                                        <th scope="col" class="px-6 py-3">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-slate-800 divide-y divide-slate-700">
                                    @foreach($dataBulananLengkap as $index => $log)
                                        <tr>
                                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4">{{ $log['nama'] }}</td>
                                            <td class="px-6 py-4">{{ $log['keterangan'] }}</td>
                                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($log['waktu'])->format('d M Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                    <button id="backToDailyBtn" class="mt-8 w-full sm:w-auto bg-slate-700 hover:bg-slate-600 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <line x1="19" y1="12" x2="5" y2="12"/>
                            <polyline points="12 19 5 12 12 5"/>
                        </svg>
                        Kembali ke Dasbor Harian
                    </button>
                </div>
            </main>

            <!-- Action Button -->
            <footer class="mt-8 text-center">
                 <button id="toggleReportBtn" class="w-full sm:w-auto bg-teal-600 hover:bg-teal-500 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-teal-500/50 transform hover:-translate-y-1 transition-all duration-300">
                    Lihat Laporan Kunjungan Bulanan
                </button>
            </footer>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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