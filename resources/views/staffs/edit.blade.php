@extends('layouts.tabler-template')
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Staffs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <a href="{{ route('staffs.index') }}" class="btn btn-secondary">Back to Staffs</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h1>Edit Academician</h1>
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
        </div>
    </div>
</section>
@endsection
