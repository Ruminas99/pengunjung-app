@extends('layout')
@section('content')
<div class="min-h-screen bg-gradient-to-r from-pink-500 to-pink-700 flex items-center justify-center px-4 py-10 animate__animated animate__fadeIn">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Form Mahasiswa</h2>
        <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-5">   
            @csrf
            <div>
                <label for="nama" class="block mb-1 font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="no_hp" class="block mb-1 font-medium text-gray-700">Nomor HP</label>
                <input type="text" id="no_hp" name="no_hp" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="universitas" class="block mb-1 font-medium text-gray-700">Nama Universitas</label>
                <input type="text" id="universitas" name="universitas" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="jumlah_klinis" class="block mb-1 font-medium text-gray-700">Jumlah Mahasiswa Klinis</label>
                <input type="number" id="jumlah_klinis" name="jumlah_klinis" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-pink-700 text-white py-2 rounded-lg hover:bg-red-700 transform hover:scale-105 active:scale-95">Submit</button>
        </form>
    </div>
</div>
@endsection