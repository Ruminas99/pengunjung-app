@extends('layout')

@section('content')
<div class="bg-white p-6 rounded shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <input name="name" type="text" placeholder="Name"
            class="w-full px-3 py-2 mb-3 border rounded" required>

        <input name="email" type="email" placeholder="Email"
            class="w-full px-3 py-2 mb-3 border rounded" required>

        <input name="password" type="password" placeholder="Password"
            class="w-full px-3 py-2 mb-3 border rounded" required>

        <input name="password_confirmation" type="password" placeholder="Confirm Password"
            class="w-full px-3 py-2 mb-4 border rounded" required>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded transition duration-200 transform 
                   hover:scale-105 active:scale-95">
            Register
        </button>
    </form>

    <p class="text-sm mt-4 text-center">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500">Login</a>
    </p>
</div>
@endsection
