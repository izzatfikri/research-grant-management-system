@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1>Create Academician</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('academicians.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="staff_number">Staff Number</label>
                    <input type="text" class="form-control" name="staff_number" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="college">College</label>
                    <input type="text" class="form-control" name="college" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="department">Department</label>
                    <input type="text" class="form-control" name="department" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="position">Position</label>
                    <input type="text" class="form-control" name="position" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create Academician</button>
            </form>
        </div>
    </div>
</div>
@endsection