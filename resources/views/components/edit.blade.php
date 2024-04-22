@extends('layout.navbar')
@section('title', 'Edit')
@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
    <h1 class="text-center text-primary fw-bolder">My Crud</h1>
    <h3 class="text-center text-primary fw-bolder">Edit</h3>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row text-primary pb-5">
        <div>
            <form id="form" method="POST" action="{{route('update', ['employee' => $employee])}}">
                @csrf
                @method('put')
                <div id="result"></div>
                <div class="form-group pb-3">
                    <label for="">First Name:</label>
                    <input type="text" id="firstName" name="firstName" placeholder="First Name" value="{{ $employee['firstName'] }}" class="form-control">
                    @error('firstName')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <label for="">Last Name</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Last Name" value="{{ $employee['lastName'] }}" class="form-control">
                    @error('lastName')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <label for="">Address</label>
                    <input type="text" id="address" name="address" placeholder="Address" value="{{ $employee['address'] }}" class="form-control">
                    @error('address')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <label for="">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Phone" value="{{ $employee['phone'] }}" class="form-control">
                    @error('phone')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <label for="">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email" value="{{ $employee['email'] }}" class="form-control">
                    @error('email')
                    <div class="form-error text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <select class="btn btn-primary dropdown-toggle form-group pb-3" id="status" name="status">
  <option value="Active" {{ $employee->status === 'Active' ? 'selected' : '' }}>Active</option>
  <option value="Inactive" {{ $employee->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
</select>


                <div class="form-group pt-3">
                    <button type="submit" id="submit" name="submit" class="btn btn-outline-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection