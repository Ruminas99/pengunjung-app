@extends('layout')

@section('content')
@include('navbar')

<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Selamat Datang, {{ auth()->user()->name }}</h1>
    <p class="text-gray-600">Ini adalah halaman Beranda setelah login.</p>
</div>
@endsection
