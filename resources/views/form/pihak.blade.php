@extends('layout')

@section('content')
<div class="min-h-screen flex  items-center justify-center bg-gradient-to-r from-blue-500 to-blue-700 py-12 px-4 sm:px-6 lg:px-8 animate__animated animate__fadeIn">
    <div class="w-full max-w-md space-y-8 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-center text-2xl font-bold text-gray-900">Form Data Pihak</h2>
        <form action="" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="nomor_perkara" class="block text-sm font-medium text-gray-700">Nomor Perkara</label>
                <input type="text" id="nomor_perkara" name="nomor_perkara" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label for="nama_pihak" class="block text-sm font-medium text-gray-700">Nama Para Pihak</label>
                <select id="nama_pihak" name="nama_pihak" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option>Pihak A</option>
                    <option>Pihak B</option>
                </select>
            </div>
            <div>
                <label for="pihak_hadir" class="block text-sm font-medium text-gray-700">Pihak yang Hadir</label>
                <select id="pihak_hadir" name="pihak_hadir" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option>Prinsipal</option>
                    <option>Kuasa</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg transition duration-200 transform hover:scale-105 active:scale-95">Kirim</button>
        </form>
    </div>
</div>
@endsection
