@extends('layout')
@section('content')
<div class="min-h-screen bg-gradient-to-r from-purple-500 to-purple-700 flex items-center justify-center px-4 py-10 animate__animated animate__fadeIn">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Form PTSP</h2>
        <form action="{{ route('ptsp.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="nik" class="block mb-1 font-medium text-gray-700">NIK</label>
                <input type="text" id="nik" name="nik" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="nama" class="block mb-1 font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="no_hp" class="block mb-1 font-medium text-gray-700">Nomor HP</label>
                <input type="text" id="no_hp" name="no_hp" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="meja" class="block mb-1 font-medium text-gray-700">Ke Meja PTSP</label>
                <select id="meja" name="meja" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="">-- Pilih Meja --</option>
                    <option value="1">Meja 1</option>
                    <option value="2">Meja 2</option>
                    <option value="3">Meja 3</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transform hover:scale-105 active:scale-95">Submit</button>
        </form>
    </div>
</div>
@endsection