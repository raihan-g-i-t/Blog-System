@extends('layouts.guest')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <a href="{{ route('index') }}" class="auth-logo">
                <i class="fas fa-blog"></i>
                Blog System
            </a>
            <h1>Welcome back</h1>
            <p>Sign in to your account to continue</p>
        </div>

        <form method="POST" action="{{ route('user.login') }}" class="auth-form">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    autocomplete="email"
                    placeholder="Enter your email"
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    placeholder="Enter your password"
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="auth-button">
                Sign In
            </button>

            <div class="auth-footer">
                <p>Don't have an account? <a href="{{ route('user.registration') }}">Sign up</a></p>
            </div>
        </form>
    </div>
</div>
@endsection