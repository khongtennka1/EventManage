<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    <form action="{{ route('register.registerHandler') }}" method="POST">
        <h1>Register</h1>
        @csrf
        <div>
            <label for="UserName">Tên đăng nhập:</label>
            <input type="text" name="UserName" required>
        </div>
        <div>
            <label for="StudentCode">Mã sinh viên:</label>
            <input type="text" name="StudentCode">
        </div>
        <div>
            <label for="Email">Email:</label>
            <input type="email" name="Email" required>
        </div>
        <div>
            <label for="Password">Mật khẩu:</label>
            <input type="password" name="Password" required>
        </div>

        <button type="submit">Register</button>

        <a href="{{ route('login.login') }}">Login</a>
    </form>
</body>
</html>