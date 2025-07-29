@extends('layout')

@section('content')
<div class="bg-white p-6 rounded shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <input name="email" type="email" placeholder="Email"
            class="w-full px-3 py-2 mb-3 border rounded" required>

        <input name="password" type="password" placeholder="Password"
            class="w-full px-3 py-2 mb-4 border rounded" required>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Login
        </button>
    </form>

    <p class="text-sm mt-4 text-center">
        Belum punya akun? <a href="{{ route('register') }}" class="text-green-500">Daftar</a>
    </p>
</div>
@endsection
