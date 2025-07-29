<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h2>Selamat Datang di Dashboard</h2>
    <p>Halo, {{ auth()->user()->name }}!</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>