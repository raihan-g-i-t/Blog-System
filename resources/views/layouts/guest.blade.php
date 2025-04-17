<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>
<body>
    @yield('content')
    
    @if (session('success'))
    @include('modal')
    @endif

  <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
  </script>
</body>
</html>