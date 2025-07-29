<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <input name="email" type="email" placeholder="Email" required><br>
        <input name="password" type="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <a href="{{ route('register') }}">Register</a>
</body>
</html>