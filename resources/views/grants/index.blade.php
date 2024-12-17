@extends('layouts.app')
@section('content')
    <div class=container-fluid>
    <h1>Grants List</h1>
    <a href="{{ route('grants.create') }}" class="btn btn-primary">Create Grant</a>
    <div class="table-responsive">
    <table border="1" class="table table-striped table-bordered table-hover">
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
            @foreach($grants as $grant)
                <tr>
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
                            <form action="{{ route('grants.destroy', $grant->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this grant?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
@endsection