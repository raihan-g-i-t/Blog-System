@extends('admin.layout')

@section('heading')
Add Categories
@endsection

@section('content')

    <form action="{{ route('save.category') }}" method="POST" class="w-50 mx-auto bg-white p-4 rounded shadow">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $data->title ?? '' }}" required>
            @error('title')
            <span>{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
                <option value="{{ STATUS_ACTIVE }}" {{ old('status', $data->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="{{ STATUS_INACTIVE }}" {{ old('status', $data->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Create</button>
    </form>

@endsection