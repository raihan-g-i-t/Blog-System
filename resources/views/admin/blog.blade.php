@extends('admin.layout')

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
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });

        // Delete Function
        // $(document).on('click', '.delete-btn', function() {
        //     var blogId = $(this).data('id');
        //     if (confirm('Are you sure you want to delete this blog?')) {
        //         $.ajax({
        //             url: "/blogs/" + blogId,
        //             type: 'DELETE',
        //             data: { _token: "{{ csrf_token() }}" },
        //             success: function(response) {
        //                 $('#blogTable').DataTable().ajax.reload();
        //                 alert(response.success);
        //             }
        //         });
        //     }
        // });
    });
</script>
@endsection