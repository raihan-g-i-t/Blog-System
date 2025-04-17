@extends('layouts.user')

@section('content')

<div class="profile-container">
    <div class="profile-card">

        <div class="profile-content">
            <form action="{{ route('user.edit.store') }}" method="post">
                @csrf
                <div class="profile-details">
                    <div class="detail-group">
                        <label>Name</label>
                        <input class="edit-profile" name="name" value="{{ auth()->user()->name ?? ''}}">
                        <span class="error-message">@error('name')
                            {{ $message }}
                        @enderror
                        </span>
                    </div>

                    <div class="detail-group">
                        <label>Email</label>
                        <input class="edit-profile" name="email" value="{{ auth()->user()->email ?? ''}}">
                        <span class="error-message">@error('email')
                            {{ $message }}
                        @enderror
                        </span>
                    </div>
                    <div class="detail-group">
                        <a href=""> <button class="edit-button"> Save </button> </a>
                    </div>
                        
                </div>
            </form>
        </div>
    </div>
</div>
@endsection