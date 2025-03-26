@extends('admin.layout')

@section('heading')
Welcome, Admin
@endsection

@section('content')
<!-- Statistics Section -->

@for ($i=1; $i<6; $i++)
  <div class="stats">
      <div class="card">
        <h3>Users</h3>
        <p>1,200</p>
      </div>
      <div class="card">
        <h3>Sales</h3>
        <p>$25,000</p>
      </div>
      <div class="card">
        <h3>Visitors</h3>
        <p>3,500</p>
      </div>
  </div>
@endfor

<!-- Table Section -->
<div class="table-section">
      <h2>Recent Activities</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Activity</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>001</td>
            <td>User Login</td>
            <td>2024-11-27</td>
            <td>Success</td>
          </tr>
          <tr>
            <td>002</td>
            <td>Payment Received</td>
            <td>2024-11-26</td>
            <td>Completed</td>
          </tr>
          <tr>
            <td>003</td>
            <td>Report Generated</td>
            <td>2024-11-25</td>
            <td>Pending</td>
          </tr>
        </tbody>
      </table>
    </div>
@endsection

