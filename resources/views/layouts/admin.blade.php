<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="{{route('admin.dash')}}">Dashboard</a>
    <a href="{{route('display.users')}}">User List</a>
    <a href="{{ route('blog') }}">Blogs</a>
    <a href="{{ route('categories') }}">Catagories</a>
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

    @if(session('success'))
        @include('modal');
    @endif

  </div>

</body>
</html>
