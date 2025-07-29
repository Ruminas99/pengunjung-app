@extends('layout')

@section('content')
<div class="relative min-h-screen w-full flex items-center justify-center overflow-hidden ">

    <div class="absolute inset-0 bg-cover bg-center filter blur-sm scale-110 z-0"
         style="background-image: url('https://img.freepik.com/premium-photo/indonesia-flag-mast_28799-28.jpg');">
    </div>

    <div class="relative z-20 bg-white p-6 rounded shadow-xl/30 w-full max-w-sm text-center">

        <img src="https://cdn.discordapp.com/attachments/787358062653734933/1399613097454604400/logo-ptun.png?ex=6889a2c5&is=68885145&hm=bc024e415c8992e4a6a6ebfeed3e17820d9952cc418c7e0ba7c3b39ba757bec7&"
             alt="Logo"
             class="mx-auto mb-10 w-20 h-20 object-contain">

        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <input name="email" type="email" placeholder="Email"
                class="w-full px-3 py-2 mb-3 border rounded" required>

            <input name="password" type="password" placeholder="Password"
                class="w-full px-3 py-2 mb-4 border rounded" required>

            <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded transition duration-200 transform 
                   hover:scale-105 active:scale-95">
            Login
            </button>
        </form>

        <p class="text-sm mt-4">
            Belum punya akun? <a href="{{ route('register') }}" class="text-green-500">Daftar</a>
        </p>
    </div>
</div>
@endsection
