@extends('layout')

@section('content')
<div class="animated-gradient-bg">

    <div class="relative min-h-screen flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8 animate-fade-in">

        <!-- Konten Utama (Tabel) -->
        <main class="w-full max-w-5xl animate-pop-in" style="animation-delay: 0.2s;">
            <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl shadow-lg overflow-x-auto border border-slate-700">
                <table class="min-w-full">
                    <thead class="bg-slate-900/50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-bold text-sky-300 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-bold text-sky-300 uppercase tracking-wider">
                                Nomor Perkara
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-bold text-sky-300 uppercase tracking-wider">
                                Pihak
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-bold text-sky-300 uppercase tracking-wider">
                                Status Kehadiran
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tabel-body" class="divide-y divide-slate-700">
                        <!-- Contoh data baris 1 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">01/Pdt.G/2024/PA.Mdn</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">Penggugat</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center status-cell"
                                onclick="toggleStatus(this)">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-slate-600 text-slate-100"
                                    data-status="pending">
                                    Belum Absen
                                </span>
                            </td>
                        </tr>
                        <!-- Contoh data baris 2 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">02/Pdt.P/2024/PA.Mdn</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">Tergugat</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center status-cell"
                                onclick="toggleStatus(this)">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-slate-600 text-slate-100"
                                    data-status="pending">
                                    Belum Absen
                                </span>
                            </td>
                        </tr>
                        <!-- Contoh data baris 3 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">03/Pdt.G/2024/PA.Mdn</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">Kuasa Hukum Penggugat</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center status-cell"
                                onclick="toggleStatus(this)">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-slate-600 text-slate-100"
                                    data-status="pending">
                                    Belum Absen
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

    </div>
</div>
@endsection

@push('scripts')
<script>
    /**
     * Fungsi untuk mengubah status kehadiran saat sel status diklik.
     * Status akan berputar: Belum Absen -> Hadir -> Tidak Hadir -> Belum Absen
     * @param {HTMLElement} cell - Sel (td) yang diklik.
     */
    function toggleStatus(cell) {
        const statusSpan = cell.querySelector('span');
        const currentStatus = statusSpan.dataset.status;

        if (currentStatus === 'pending') {
            // Ubah ke Hadir
            statusSpan.className = 'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white';
            statusSpan.textContent = 'Hadir';
            statusSpan.dataset.status = 'present';
        } else if (currentStatus === 'present') {
            // Ubah ke Tidak Hadir
            statusSpan.className = 'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white';
            statusSpan.textContent = 'Tidak Hadir';
            statusSpan.dataset.status = 'absent';
        } else { // currentStatus === 'absent'
            // Ubah kembali ke Belum Absen
            statusSpan.className = 'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-slate-600 text-slate-100';
            statusSpan.textContent = 'Belum Absen';
            statusSpan.dataset.status = 'pending';
        }
    }
</script>
@endpush