@extends('layouts.admin')

@section('heading')
    Admin Settings 
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <h1>Admin Profile</h1>
        </div>
        <div class="profile-header">
            <a href="{{ route('admin.settings.info') }}" class="edit-button">
                <i class="fas fa-edit"></i> Edit Profile
            </a>
            <a href="{{ route('admin.settings.password') }}" class="edit-button">
                <i class="fas fa-edit"></i> Edit Password
            </a>
        </div>

        <div class="profile-content">
            
            <div class="profile-details">
                <div class="detail-group">
                    <label>Name</label>
                    <p>{{ auth()->user()->name }}</p>
                </div>

                <div class="detail-group">
                    <label>Email</label>
                    <p>{{ auth()->user()->email }}</p>
                </div>

                <div class="detail-group">
                    <label>Member Since</label>
                    <p>{{ auth()->user()->created_at->format('F j, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection