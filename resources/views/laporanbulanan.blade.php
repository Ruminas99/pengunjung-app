@extends('layout')

@section('content')

    <div class="animated-gradient-bg"></div>

    <div id="app" class="relative min-h-screen flex flex-col items-center p-4 sm:p-6 lg:p-8 animate-fade-in">
        <div class="w-full max-w-7xl mx-auto mt-10 md:mt-20">
            <header class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-white">Laporan Kunjungan Bulanan</h1>
                <p class="text-xl text-blue-300">Pengadilan Tata Usaha Negara Medan</p>
                <p id="currentDate" class="text-lg text-sky-400 mt-2"></p>
            </header>

            <main>
                 <form action="{{ route('export.bulanan') }}" method="GET" class="mb-6 flex items-center gap-4">
                    <label for="bulan" class="text-white text-sm">Pilih Bulan:</label>
                    <input type="month" name="bulan" id="bulan" required class="glass-card col-span-1 sm:col-span-2 lg:col-span-1 p-5 rounded-xl flex flex-col justify-center items-center text-center">
                    
                    <button type="submit" class="glass-card col-span-1 sm:col-span-2 lg:col-span-1 p-5 rounded-xl flex flex-col justify-center items-center text-center">
                        Export Bulanan
                    </button>
                </form>
                <div id="monthlyReport">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                        <div
                            class="glass-card col-span-1 sm:col-span-2 lg:col-span-1 p-5 rounded-xl flex flex-col justify-center items-center text-center">
                            <p class="font-medium text-blue-300">Total Kunjungan</p>
                            <p class="text-4xl font-bold text-white mt-1">{{ count($dataBulananLengkap) }}</p>
                        </div>
                        <div class="glass-card p-5 rounded-xl">
                            <p class="font-medium text-blue-300">Tamu Sidang</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $jumlahPihak }} Orang</p>
                        </div>
                        <div class="glass-card p-5 rounded-xl">
                            <p class="font-medium text-blue-300">Layanan PTSP</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $jumlahPtsp }} Orang</p>
                        </div>
                        <div class="glass-card p-5 rounded-xl">
                            <p class="font-medium text-blue-300">Tamu Dinas</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $jumlahDinas }} Orang</p>
                        </div>
                        <div class="glass-card p-5 rounded-xl">
                            <p class="font-medium text-blue-300">Tamu Mahasiswa</p>
                            <p class="text-3xl font-bold text-white mt-1">{{ $jumlahMahasiswa }} Orang</p>
                        </div>
                    </div>

                    <div class="w-full overflow-x-auto glass-card rounded-xl p-2">
                        <table class="min-w-full text-sm text-left">
                            <thead class="text-xs text-blue-300 uppercase tracking-wider">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Nama Tamu</th>
                                    <th scope="col" class="px-6 py-4">Jenis</th>
                                    <th scope="col" class="px-6 py-4">Keterangan</th>
                                    <th scope="col" class="px-6 py-4 text-right">Waktu Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataBulananLengkap as $log)
                                    <tr class="border-t border-white/10 hover:bg-white/5 transition-colors duration-200">
                                        <td class="px-6 py-4 font-medium text-white whitespace-nowrap">{{ $log['nama'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold
                                                    @if($log['jenis'] == 'Pihak') bg-sky-500/20 text-sky-300
                                                    @elseif($log['jenis'] == 'PTSP') bg-emerald-500/20 text-emerald-300
                                                    @elseif($log['jenis'] == 'Dinas') bg-amber-500/20 text-amber-300
                                                    @elseif($log['jenis'] == 'Mahasiswa') bg-violet-500/20 text-violet-300
                                                    @endif">
                                                {{ $log['jenis'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-400">{{ $log['keterangan'] }}</td>
                                        <td class="px-6 py-4 text-gray-400 text-right whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($log['waktu'])->format('d M Y, H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-10 text-blue-300">
                                            Tidak ada data kunjungan untuk bulan ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dailyReportView = document.getElementById('dailyReport');
            const monthlyReportView = document.getElementById('monthlyReport');
            const toggleBtn = document.getElementById('toggleReportBtn');
            const backBtn = document.getElementById('backToDailyBtn');
            const dateElement = document.getElementById('currentDate');

            document.addEventListener('DOMContentLoaded', function () {
                const dateElement = document.getElementById('currentDate');
                const setDate = () => {
                    const now = new Date();
                    const options = { year: 'numeric', month: 'long' };
                    dateElement.textContent = "Laporan untuk Bulan " + now.toLocaleDateString('id-ID', options);
                };
                setDate();
            });
            const setDate = () => {
                const now = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                dateElement.textContent = "" + now.toLocaleDateString('id-ID', options);
            };
            const showMonthlyReport = () => {
                dailyReportView.classList.add('hidden');
                toggleBtn.classList.add('hidden');
                monthlyReportView.classList.remove('hidden');
            };

            const showDailyReport = () => {
                monthlyReportView.classList.add('hidden');
                dailyReportView.classList.remove('hidden');
                toggleBtn.classList.remove('hidden');
            };
            toggleBtn.addEventListener('click', showMonthlyReport);
            backBtn.addEventListener('click', showDailyReport);
            setDate();
            const animatedElements = document.querySelectorAll('.animate-slide-up');
            animatedElements.forEach(el => {
                el.style.opacity = '1';
            });
        });
    </script>
    </div>
@endsection