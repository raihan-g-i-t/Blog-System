@extends('layouts.admin')

@section('heading')
User List
@endsection

@section('content')

<div class="container">
    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.list') }}",
            columns: [
                { data: 'id', name: 'id', orderable: false},
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection