@extends('layouts.tabler-template')
@section('title', 'Staffs')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1>Create Staff</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('staffs.store') }}" method="POST">
                @csrf
                <input type="hidden" name="userCategory" value="staff">
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="staff_number">Staff Number</label>
                    <input type="text" class="form-control" name="staff_number" required>
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
                <button type="submit" class="btn btn-primary w-100">Create Staff</button>
            </form>
        </div>
    </div>
</div>
@endsection