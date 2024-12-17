@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1>Milestones - Edit</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('milestones.update', $milestone->id) }}">
                @method('PUT')
                @csrf 
                <div class="form-group mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" class="form-control" name="status" value="{{ $milestone->status }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Remarks</label>
                    <input type="text" class="form-control" name="remarks" value="{{ $milestone->remarks }}">
                </div>
                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection