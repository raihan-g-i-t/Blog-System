@extends('layouts.guest')

@section('content')

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <a href="{{ route('index') }}" class="auth-logo">
                <i class="fas fa-blog"></i>
                Blog System
            </a>
            <h1>Create your account</h1>
            <p>Join our community of writers and readers</p>
        </div>

        <form method="POST" action="{{ route('user.store') }}" class="auth-form" id="demo-form">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Enter your full name"
                >
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
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
                    autocomplete="new-password"
                    placeholder="Create a password"
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            @error('g-recaptcha-response')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <button class="g-recaptcha" 
                data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" 
                data-callback='onSubmit' 
                data-action='submit'>Register</button>

            <!-- Login Redirect -->
            <div class="auth-footer">
                <p>Already have an account? <a href="{{ route('user.login') }}">Sign in</a></p>
            </div>
        </form>
    </div>
</div>

@endsection