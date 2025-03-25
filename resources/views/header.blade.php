<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>

<header>
        <div class="logo">
            <h1>P2P Exchange</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#trade">Trade</a></li>
                <li><a href="#wallet">Wallet</a></li>
                <li><a href="#support">Support</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="{{ route('user.login') }}"> <button id="loginBtn">Login</button> </a>
            <a href="{{ route('user.registration') }}"><button id="registerBtn">Register</button></a>
        </div>
</header>
    
</body>
</html>