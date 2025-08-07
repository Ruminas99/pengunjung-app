@extends('layout')

@section('content')
<<<<<<< HEAD
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
=======
<div class="animated-gradient-bg p-6">
<div class="p-6 mt-8">
    <h1 class="text-2xl font-bold text-white mb-4 ">Daftar Kehadiran</h1>
<div></div>
    <form method="GET" action="{{ route('pihak.kehadiran.perkara', '') }}" id="filterForm" class="mb-6">
        <label for="nomor_perkara" class="block text-sm font-medium text-blue-200">Pilih Nomor Perkara:</label>
        <select id="nomor_perkara" name="nomor_perkara" class="mt-1 block w-full rounded-md border border-gray-400 bg-white/20 text-white shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" onchange="document.getElementById('filterForm').action = '{{ route('pihak.kehadiran.perkara', '') }}/' + this.value; document.getElementById('filterForm').submit();">
            <option value="">-- Pilih Nomor Perkara --</option>
            @foreach ($perkaras as $perkara)
                <option class="text-black" value="{{ $perkara->perkara_id }}" {{ isset($selectedPerkara) && $selectedPerkara == $perkara->perkara_id ? 'selected' : '' }}>
                    {{ $perkara->nomor_perkara }}
                </option>
            @endforeach
        </select>
    </form>

    @if(isset($pihaks))
        <table class="w-full text-white border-collapse border border-gray-500">
            <thead>
                <tr>
                    <th class="border border-gray-500 px-4 py-2">Nama Pihak</th>
                    <th class="border border-gray-500 px-4 py-2">Status Kehadiran</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                @forelse ($pihaks as $pihak)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-300">{{ $pihak['nama'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center status-cell">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full text-slate-100 {{ $pihak['status'] === 'Hadir' ? 'bg-green-600' : 'bg-red-600' }}">
                                {{ $pihak['status'] }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center py-4 text-gray-400">Tidak ada data pihak.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endif
</div>
</div>
@endsection
>>>>>>> efb13bd (kehadiran)
