@extends('layouts.app')
@section('content')
    <div class=container-fluid>
    <h1>Milestones List</h1>
    <a href="{{ route('milestones.create') }}" class="btn btn-primary">Create Milestone</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Grant</th>
                    <th>Milestone Title</th>
                    <th>Completion Date</th>
                    <th>Deliverable</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($milestones as $milestone)
                    <tr>
                        <td>{{ $milestone->id }}</td>
                        <td>{{ $milestone->grant->project_title }}</td>
                        <td>{{ $milestone->milestone_title }}</td>
                        <td>{{ $milestone->completion_date }}</td>
                        <td>{{ $milestone->deliverable }}</td>
                        <td>{{ $milestone->status }}</td>
                        <td>{{ $milestone->remarks }}</td>
                        <td>
                            <div class="btn-group" role="group">  
                            <a href="{{ route('milestones.show', $milestone->id) }}" class="btn btn-info">Show</a>  
                            <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-warning">Edit</a>  
                                <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" style="display: inline;">
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