@extends('layouts.admin')

@section('heading')
Welcome, Admin
@endsection

@section('content')
<div class="admin-container">
    <!-- Header -->
    <div class="admin-header">
        <h1>Dashboard Overview</h1>
        <p>Welcome back, {{ auth()->user()->name }}</p>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <!-- Users Card -->
        <div class="stats-card">
            <div class="stats-icon" style="background: #4361ee20; color: #4361ee;">
                <i class="fas fa-users"></i>
            </div>
            <div class="stats-info">
                <h3>{{ $data['totalUsers'] }}</h3>
                <p>Total Users</p>
            </div>
        </div>

        <!-- Blogs Card -->
        <div class="stats-card">
            <div class="stats-icon" style="background: #3a0ca320; color: #3a0ca3;">
                <i class="fas fa-blog"></i>
            </div>
            <div class="stats-info">
                <h3>{{ $data['totalBlogs'] }}</h3>
                <p>Total Blogs</p>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="stats-card">
            <div class="stats-icon" style="background: #7209b720; color: #7209b7;">
                <i class="fas fa-tags"></i>
            </div>
            <div class="stats-info">
                <h3>{{ $data['totalCategory'] }}</h3>
                <p>Total Categories</p>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="dashboard-section">
        <div class="section-column">
            <h2>Recent Users</h2>
            <div class="activity-card">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['latestUsers'] as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="section-column">
            <h2>Recent Blogs</h2>
            <div class="activity-card">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Posted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['latestBlogs'] as $blog)
                        <tr>
                            <td>{{ Str::limit($blog->title, 30) }}</td>
                            <td>{{ $blog->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection