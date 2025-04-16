<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page with Background</title>
    <link rel="stylesheet "href="{{asset('css/login.css')}}">
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>
<body>

@if(session('success'))
    @include('modal');
@endif

<div class="login-container">
    <h1>Login</h1>
 
    <form action="{{ route('user.login.validate') }}" method="POST" id="demo-form">
        <label class="message">{{session('data') ?? ""}}</label>
        @csrf
        <div class="input-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your Email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button class="g-recaptcha" 
                data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" 
                data-callback='onSubmit' 
                data-action='submit'>Log In</button>
    </form>
    <div class="footer">
        <p>Don't have an account? <a href="{{ route('user.registration') }}">Sign up</a></p>
    </div>
</div>

<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
</script>

</body>
</html>
