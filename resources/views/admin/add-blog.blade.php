@extends('admin.layout')

@section('heading')

Add Blogs

@endsection

@section('content')

<div class="container">
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <!-- Status Dropdown -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="{{ STATUS_ACTIVE }}">Active</option>
                <option value="{{ STATUS_INACTIVE }}">Inactive</option>
            </select>
        </div>

        <!-- Category Dropdown -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection