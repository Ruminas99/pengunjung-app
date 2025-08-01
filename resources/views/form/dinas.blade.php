@extends('layout')
@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-10 animate__animated animate__fadeIn">
    <div class="bg-slate-800 p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-white mb-6">Form Tamu Dinas</h2>
        <form action="{{ route('dinas.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="nama" class="block mb-1 font-medium">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="nama_kantor" class="block mb-1 font-medium">Nama Kantor Asal</label>
                <input type="text" id="nama_kantor" name="nama_kantor" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="keperluan" class="block mb-1 font-medium">Ke Bagian</label>
                <select id="keperluan" name="ke_bagian" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="">-- Pilih Bagian --</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="SDM">SDM</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-teal-600 text-white py-2 rounded-lg hover:bg-teal-600 transition duration-200 transform hover:scale-105 active:scale-95">Submit</button>
        </form>
    </div>
</div>
@endsection
