@extends('layouts.admin')

@section('heading')
Blogs
@endsection


@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Blog List</h2>
        <a href="{{ route('blog.create') }}" class="btn btn-primary">+ Add Blog</a>
    </div>
</div>

<div class="container">
    <table id="blogTable">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Status</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#blogTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('blog') }}",
            columns: [
                { data: 'image', name: 'image', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'status', name: 'status' },
                { data: 'category_id', name: 'category_id'},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection