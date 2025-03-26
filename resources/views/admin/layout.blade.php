<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="{{route('admin.dash')}}">Dashboard</a>
    <a href="#">Blogs</a>
    <a href="#">Main Catagory</a>
    <a href="{{route('admin.dash')}}">Sub Catagory</a>
    <a href="{{route('admin.dash')}}">Comments</a>
    <a href="{{route('admin.dash')}}">Settings</a>
    <a href="{{route("logout")}}">Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="header">
      <h1>@yield('heading')</h1>
    </div>

    @yield('content')

  </div>
</body>
</html>
