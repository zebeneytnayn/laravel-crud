@extends('layout.navbar')
@section('title', 'All Employees')
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

    <div>
        <h2 class="text-primary text-center pb-2">List of all employees</h1>
            <table class="table">

                @if (count($employees) > 0)
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Registered</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @else
                    <div class="alert alert-warning text-center">There's No Data To Be Displayed.</div>
                    <a href="{{ route('create') }}" class="btn btn-outline-primary">Add Employee</a>
                    @endif


                    @foreach ( $employees as $employee )
                    <tr>

                        <td>{{$employee->id}}</td>
                        <td>{{$employee->firstName}}</td>
                        <td>{{$employee->lastName}}</td>
                        <td>{{$employee->created_at->diffForHumans()}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->status}}</td>
                        <td>
                            <!-- <a href="{{ route('edit', ['employee' => $employee]) }}" id="edit" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a> -->
                            <a href="{{ route('edit', ['employee' => $employee]) }}" id="edit" class="badge bg-warning">Edit</a>
                            <!-- <a href="{{ route('delete', ['employee' => $employee]) }}" id="del" class="badge bg-danger">Delete</a> -->
                            <form method="post" action="{{ route('delete', ['employee' => $employee]) }}" class="d-inline" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger" id="del">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
    </div>
</div>
<script>
  document.getElementById('deleteForm').addEventListener('submit', function(event) {
    var confirmed = confirm("Are you sure you want to delete this employee?");
    if (!confirmed) {
      event.preventDefault();
    }
  });
</script>
@endsection