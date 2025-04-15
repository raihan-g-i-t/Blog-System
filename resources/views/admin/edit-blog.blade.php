@extends('layouts.admin')

@section('heading')
Edit Blog
@endsection

@section('content')

<div class="container">
    <form action="{{ route('edit.store', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <input type="hidden" name="oldImage" id="image" class="form-control" value="{{ $blog->image }}">
            <img id="editpage" src="{{ asset('storage/'. $blog->image) }}"></img>
        </div>

        <!-- Status Dropdown -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
                <option value="{{ STATUS_ACTIVE }}" 
                {{ old('status', $blog->status) == STATUS_ACTIVE ? 'selected' : ''}}>Active</option>
                <option value="{{ STATUS_INACTIVE }}"
                {{ old('status', $blog->status) == STATUS_INACTIVE ? 'selected' : ''}}>Inactive</option>
            </select>
        </div>

        <!-- Category Dropdown -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                    {{ $category->id == $blog->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4" required> {{ old('content',$blog->content) }} </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection