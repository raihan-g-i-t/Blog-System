<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>

<h1>User Dashboard</h1>

{{ Auth::user()->email }}

<a href="{{ route('user.logout') }}"> <button type="submit">logout</button> </a>
    
</body>
</html>