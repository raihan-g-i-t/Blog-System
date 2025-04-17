@extends('layouts.user')

@section('content')

<div class="profile-container">
    <div class="profile-card">

        <div class="profile-content">
            <form action="" method="post">
                @csrf
                <div class="profile-details">
                    <div class="detail-group">
                        <label>Current Password</label>
                        <input type="password" name="current" class="edit-profile">
                        <span>@error('current')
                            {{ $message }}
                        @enderror
                        </span>
                    </div>

                    <div class="detail-group">
                        <label>New Password</label>
                        <input type="password" name="new" class="edit-profile">
                        <span>@error('new')
                            {{ $message }}
                        @enderror
                        </span>
                    </div>
                        <a href=""> <button class="edit-button"> Save </button> </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection