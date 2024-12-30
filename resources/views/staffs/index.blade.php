@extends('layouts.tabler-template')
@section('title', 'Staffs')
@section('content')
<div class="container">
    <div class="row mb-4">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Staffs</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white text-center">
            <h1>Staffs - List</h1>
        </div>
    </div>

    <a href="{{ route('staffs.create') }}" class="btn btn-primary mb-3">Add New Staff</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" style="background-color: #f2f2f2;">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Staff Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($staffs as $index => $staff)
                <tr class="{{ $index % 2 == 0 ? 'bg-light' : 'bg-white' }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->staff_number }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('staffs.show', $staff->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this staff?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection