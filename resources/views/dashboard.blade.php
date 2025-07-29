@extends('layout')

@section('content')
<div class="bg-white p-6 rounded shadow-md w-full max-w-lg text-center">
    <h2 class="text-2xl font-bold mb-4">Dashboard</h2>

    <p class="mb-4">Halo, <strong>{{ auth()->user()->name }}</strong>! Kamu berhasil login.</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Logout
        </button>
    </form>
</div>
@endsection
