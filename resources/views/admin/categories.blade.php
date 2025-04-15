@extends('layouts.admin')

@section('heading')
Categories
@endsection

@section('content')

<a href="{{ route('add.category') }}"> <button id="add-category"> Add Category</button> </a>

<table id="DataTables">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
</table>

<script>
        $(document).ready(function() {
            $('#DataTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('categories.data') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            })
        })
</script>

@endsection