@extends('layout')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 flex items-center justify-center px-4 py-10 animate__animated animate__fadeIn">
    <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-2xl text-center space-y-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 animate__animated animate__fadeInDown">Selamat Datang di Dashboard Tamu</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <a href="{{ route('pihak') }}"
               class="dashboard-button bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-4 rounded-xl shadow-lg text-center font-semibold text-lg transform transition duration-300 hover:scale-105 hover:from-blue-600 hover:to-blue-800">
                Form Pihak
            </a>

            <a href="{{ route('dinas') }}"
               class="dashboard-button bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-4 rounded-xl shadow-lg text-center font-semibold text-lg transform transition duration-300 hover:scale-105 hover:from-green-600 hover:to-green-800">
                Form Dinas
            </a>

            <a href="{{ route('ptsp') }}"
               class="dashboard-button bg-gradient-to-r from-purple-500 to-purple-700 text-white px-6 py-4 rounded-xl shadow-lg text-center font-semibold text-lg transform transition duration-300 hover:scale-105 hover:from-purple-600 hover:to-purple-800">
                Form PTSP
            </a>

            <a href="{{ route('mahasiswa') }}"
               class="dashboard-button bg-gradient-to-r from-pink-500 to-pink-700 text-white px-6 py-4 rounded-xl shadow-lg text-center font-semibold text-lg transform transition duration-300 hover:scale-105 hover:from-pink-600 hover:to-pink-800">
                Form Mahasiswa
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