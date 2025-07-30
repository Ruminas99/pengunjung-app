@extends('layout')

@section('content')

<div class="min-h-screen bg-gradient-to-r from-violet-950 via-purple-500 to-rose-300 flex items-center justify-center px-4 py-10 animate__animated animate__fadeIn">
    <div class="bg-violet/30 backdrop-blur-md p-10 rounded-2xl shadow-2xl w-full max-w-4xl text-center space-y-6">

        {{-- Logo di tengah atas --}}
        <div class="flex justify-center mb-4">
            <img src="https://cdn.discordapp.com/attachments/787358062653734933/1400048470458368000/1753867948311.png?ex=688b383f&is=6889e6bf&hm=80319e1c0eff05eff6a4900dc80c9221c218ad550c394df1fa7d0e81b4d05878&" alt="Logo" class="w-auto h-80 object-contain">
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-10 animate__animated animate__fadeInDown">Pilih Tujuan</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <a href="{{ route('pihak') }}"
               class="dashboard-button bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-4 rounded-xl shadow-lg text-center font-semibold text-lg transform transition duration-300 hover:scale-105 hover:from-blue-600 hover:to-blue-800">
                Tamu Persidangan Para Pihak
            </a>

            <a href="{{ route('dinas') }}"
               class="dashboard-button bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-4 rounded-xl shadow-lg text-center font-semibold text-lg transform transition duration-300 hover:scale-105 hover:from-green-600 hover:to-green-800">
                Tamu Dinas
            </a>

            <a href="{{ route('ptsp') }}"
               class="dashboard-button bg-gradient-to-r from-purple-500 to-purple-700 text-white px-6 py-4 rounded-xl shadow-lg text-center font-semibold text-lg transform transition duration-300 hover:scale-105 hover:from-purple-600 hover:to-purple-800">
                Tamu PTSP
            </a>

            <a href="{{ route('mahasiswa') }}"
               class="dashboard-button bg-gradient-to-r from-pink-500 to-pink-700 text-white px-6 py-4 rounded-xl shadow-lg text-center font-semibold text-lg transform transition duration-300 hover:scale-105 hover:from-pink-600 hover:to-pink-800">
                Mahasiswa Klinis
            </a>    
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .dashboard-button {
        @apply text-white font-semibold py-4 px-6 rounded-xl transition-transform duration-300 transform hover:scale-105 active:scale-95 shadow-md animate__animated animate__fadeInUp text-lg;
    }
</style>
@endpush
