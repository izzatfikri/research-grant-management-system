@extends('layouts.tabler-template')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('staffs.index') }}">Staffs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
                    </ol>
                </nav>
            </div>
        </div>
        
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h1>Edit Staff</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('staffs.update', $staff->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="staff_number" class="form-label">Staff Number</label>
                                <input type="text" class="form-control" id="staff_number" name="staff_number" value="{{ $staff->staff_number }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $staff->email }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Staff</button>
                        </form>
                    </div>
                </div>
            </div>
@endsection
