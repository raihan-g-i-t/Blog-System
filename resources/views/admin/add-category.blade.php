@extends('admin.layout')

@section('heading')
{{ $heading ?? "Add Categories" }}
@endsection

@section('content')

    <form action="{{ route($url ?? 'save.category', request()->route('id'))  }}" method="POST" class="w-50 mx-auto bg-white p-4 rounded shadow">
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
                <option value="{{ STATUS_ACTIVE }}" @if (isset($data))
                {{ old('status', $data->status) == STATUS_ACTIVE ? 'selected' : ''}}
                @endif>Active</option>
                <option value="{{ STATUS_INACTIVE }}" @if (isset($data)) 
                {{ old('status', $data->status) == STATUS_INACTIVE ? 'selected' : ''}}
                @endif>Inactive</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">{{ $button ?? 'Create'}}</button>
    </form>

@endsection