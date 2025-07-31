@extends('layout')
@section('content')
<div class="min-h-screen bg-gradient-to-r from-green-500 to-green-700 flex items-center justify-center px-4 py-10 animate__animated animate__fadeIn">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Form Tamu Dinas</h2>
        <form action="{{ route('dinas.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="nama" class="block mb-1 font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="kantor_asal" class="block mb-1 font-medium text-gray-700">Nama Kantor Asal</label>
                <input type="text" id="kantor_asal" name="kantor_asal" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="keperluan" class="block mb-1 font-medium text-gray-700">Ke Bagian</label>
                <select id="keperluan" name="keperluan" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="">-- Pilih Bagian --</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="SDM">SDM</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transform hover:scale-105 active:scale-95">Submit</button>
        </form>
    </div>
</div>
@endsection
