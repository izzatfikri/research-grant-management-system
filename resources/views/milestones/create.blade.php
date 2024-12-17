@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Milestone</h2>
    <form action="{{ route('milestones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Milestone Title</label>
            <input type="text" class="form-control" name="milestone_title" required>
        </div>
        <div class="form-group">
            <label>Completion Date</label>
            <input type="date" class="form-control" name="completion_date" required>
        </div>
        <div class="form-group">
            <label>Deliverable</label>
            <textarea class="form-control" name="deliverable" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control" name="status" required>
        </div>
        <div class="form-group">
            <label>Remarks</label>
            <input type="text" class="form-control" name="remarks" required>
        </div>
        <div class="form-group">
            <label>Grant List</label>
            <select class="form-control" name="grant_id" required>
                <option value="">Select Grant</option>
                @foreach($grants as $grant)
                    <option value="{{ $grant->id }}">{{ $grant->project_title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection