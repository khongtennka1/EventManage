<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <form action="{{ route('login.loginHandler') }}" method="POST">
        <h1>Login</h1>
        @csrf
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <label for="Email">Email:</label>
            <input type="text" name="Email" placeholder="Nhập email" required>
        </div>
        <div>
            <label for="Password">Mật Khẩu:</label>
            <input type="password" name="Password" required>
        </div>
        <button type="submit">Login</button>

        <a href="{{ route('register.register') }}">Register</a>
    </form>
</body>
</html>