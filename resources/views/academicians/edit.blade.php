@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1>Edit Academician</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('academicians.update', $academician->id) }}">
                @method('PUT')
                @csrf 
                <div class="form-group mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $academician->name }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Staff Number</label>
                    <input type="text" class="form-control" name="staff_number" value="{{ $academician->staff_number }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $academician->email }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">College</label>
                    <input type="text" class="form-control" name="college" value="{{ $academician->college }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Department</label>
                    <input type="text" class="form-control" name="department" value="{{ $academician->department }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Position</label>
                    <input type="text" class="form-control" name="position" value="{{ $academician->position }}">
                </div>
                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection