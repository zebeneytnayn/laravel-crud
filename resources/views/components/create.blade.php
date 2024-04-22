@extends('layout.navbar')
@section('title', 'Create')
@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
    <h1 class="text-center text-primary fw-bolder">My Crud</h1>
    <h3 class="text-center text-success fw-bolder">Insert</h3>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row text-primary pb-5">
        <div>
            <form id="form" method="post" action="{{route('store')}}">
                @csrf
                @method('post')
                <div id="result"></div>
                <div class="form-group pb-3">
                    <label for="">First Name:</label>
                    <input type="text" id="firstName" name="firstName" placeholder="First Name" value="{{ old('firstName') }}" class="form-control">
                    @error('firstName')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <label for="">Last Name</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Last Name" value="{{ old('lastName') }}" class="form-control">
                    @error('lastName')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <label for="">Address</label>
                    <input type="text" id="address" name="address" placeholder="Address" value="{{ old('address') }}" class="form-control">
                    @error('address')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <label for="">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}" class="form-control">
                    @error('phone')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <label for="">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control">
                    @error('email')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pt-3">
                    <button type="submit" id="submit" name="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="d-none">
        <h2 class="text-primary text-center pb-2">List of all employees</h1>
            <table class="table">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Registered</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>erven</td>
                        <td>patoc</td>
                        <td>11/8/23</td>
                        <td>iligan</td>
                        <td>09309818410</td>
                        <td>patocervenkent@gmail.com</td>
                        <td>

                            <a href="#" id="edit" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                            <a href="#" id="del" class="badge bg-danger">Delete</a>

                        </td>
                    </tr>

                </tbody>
            </table>
    </div>




</div>
@endsection