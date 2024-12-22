@extends('layouts.tabler-template')
@section('title', 'Grants')
@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header bg-primary text-white text-center">
            <h1>Grants List</h1>
        </div>
    </div>

    @can('isAdmin', App\Models\User::class)
    <a href="{{ route('grants.create') }}" class="btn btn-primary mb-3">Create Grant</a>
    @endcan

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" style="background-color: #f2f2f2;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Grant Amount</th>
                    <th>Grant Provider</th>
                    <th>Project Title</th>
                    <th>Project Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration</th>
                    <th>Project Leader</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($grants as $index => $grant)
                <tr class="{{ $index % 2 == 0 ? 'bg-light' : 'bg-white' }}">
                    <td>{{ $grant->id }}</td>
                    <td>{{ $grant->grant_amount }}</td>
                    <td>{{ $grant->grant_provider }}</td>
                    <td>{{ $grant->project_title }}</td>
                    <td>{{ $grant->project_description }}</td>
                    <td>{{ $grant->start_date }}</td>
                    <td>{{ $grant->end_date }}</td>
                    <td>{{ $grant->duration }}</td>
                    <td>
                        @if($grant->leader())
                            {{ $grant->leader()->name }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('grants.show', $grant->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-warning">Edit</a>
                            @can('isAdmin', App\Models\User::class)
                            <form action="{{ route('grants.destroy', $grant->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this grant?')">Delete</button>
                            </form>
                            @endcan
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