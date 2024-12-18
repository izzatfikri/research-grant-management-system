@extends('layouts.app')
@section('title', 'Academicians')
@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header bg-primary text-white text-center">
            <h1>Academicians - List</h1>
        </div>
    </div>

    <a href="{{ route('academicians.create') }}" class="btn btn-primary mb-3">Add New Academician</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" style="background-color: #f2f2f2;">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Staff Number</th>
                    <th>Email</th>
                    <th>College</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($academicians as $index => $academician)
                <tr class="{{ $index % 2 == 0 ? 'bg-light' : 'bg-white' }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $academician->name }}</td>
                    <td>{{ $academician->staff_number }}</td>
                    <td>{{ $academician->email }}</td>
                    <td>{{ $academician->college }}</td>
                    <td>{{ $academician->department }}</td>
                    <td>{{ $academician->position }}</td>
                    <td>{{ $academician->created_at }}</td>
                    <td>{{ $academician->updated_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('academicians.show', $academician->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('academicians.destroy', $academician->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this academician?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection