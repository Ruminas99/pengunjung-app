@extends('layout')

@section('content')
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

