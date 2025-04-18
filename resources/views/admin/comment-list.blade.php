@extends('layouts.admin')

@section('heading')
    User Comment List 
@endsection

@section('content')
    <div class="container">
        <table id="blogTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Blog Title</th>
                    <th>Status</th>
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
            ajax: "{{ route('admin.comment') }}",
            columns: [
                { data: 'id', name: 'id'},
                { data: 'content', name: 'content' },
                { data: 'blog_id', name: 'blog_id' },
                { data: 'status', name: 'status'},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
    </script>
@endsection