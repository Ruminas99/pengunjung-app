@extends('layout')

@section('content')
<div class="relative min-h-screen flex flex-col items-center justify-center p-4 sm:p-6 lg:p-8 animate-fade-in">

    <header class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-white">Formulir Tamu Sidang</h2>
        <p class="text-blue-300 mt-2">Silakan isi data tamu dengan benar.</p>
    </header>

    <form action="{{ route('pihak.store') }}" method="POST" class="space-y-6 w-full max-w-xl bg-white/10 p-6 rounded-xl shadow-lg animate-pop-in ">
        @csrf

        <div>
            <label for="nomor_perkara" class="block text-sm font-medium text-blue-200">Nomor Perkara</label>
            <select id="nomor_perkara" name="nomor_perkara" class="mt-1 block w-full rounded-md border border-gray-400 bg-white/20 text-white shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                required>
                <option value="" class="text-black">-- Pilih Nomor Perkara --</option>
                @foreach($perkaras as $perkara)
                    <option value="{{ $perkara->perkara_id }}" class="text-black">{{ $perkara->nomor_perkara }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nama_pihak" class="block text-sm font-medium text-blue-200">Nama Para Pihak</label>
            <select id="nama_pihak" name="nama_pihak" class="mt-1 block w-full rounded-md border border-gray-400 bg-white/20 text-white shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="" class="text-black">-- Pilih Pihak --</option>
            </select>
                    </div>

        <div>
            <label for="pihak_hadir" class="block text-sm font-medium text-blue-200">Pihak yang Hadir</label>
            <select id="pihak_hadir" name="pihak_hadir" class="mt-1 block w-full rounded-md border border-gray-400 bg-white/20 text-white shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option class="text-black">Prinsipal</option>
                <option class="text-black">Kuasa</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-teal-600 text-white py-2 rounded-lg transition duration-200 transform hover:scale-105 active:scale-95">Kirim</button>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#nomor_perkara').on('change', function () {
        const perkaraId = $(this).val();

        if (perkaraId) {
            $.get('/get-pihak/' + perkaraId, function (data) {
                $('#nama_pihak').empty().append('<option value="">-- Pilih Pihak --</option>');

                data.forEach(function (pihak) {
                    $('#nama_pihak').append('<option value="' + pihak + '" class="text-black">' + pihak + '</option>');
                });
            });
        } else {
            $('#nama_pihak').empty().append('<option value="">-- Pilih Pihak --</option>');
        }
    });
</script>
@endpush