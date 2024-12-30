@extends('layouts.tabler-template')
@section('title', 'Milestones')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Milestones</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white text-center">
            <h1>Milestones List</h1>
        </div>
    </div>

    <!--<a href="{{ route('milestones.create') }}" class="btn btn-primary mb-3">Create Milestone</a>-->

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" style="background-color: #f2f2f2;">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Grant</th>
                    <th>Milestone Title</th>
                    <th>Completion Date</th>
                    <th>Deliverable</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    @can('isAdmin', App\Models\User::class)
                    <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse($milestones as $index => $milestone)
                <tr class="{{ $index % 2 == 0 ? 'bg-light' : 'bg-white' }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $milestone->grant->project_title }}</td>
                    <td>{{ $milestone->milestone_title }}</td>
                    <td>{{ $milestone->completion_date }}</td>
                    <td>{{ $milestone->deliverable }}</td>
                    <td>{{ $milestone->status }}</td>
                    <td>{{ $milestone->remarks }}</td>
                    @can('isAdmin', App\Models\User::class)
                    <td>
                        <div class="btn-group" role="group">
                            <!--<a href="{{ route('milestones.show', $milestone->id) }}" class="btn btn-info">Show</a>-->
                            <!--<a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-warning">Edit</a>-->
                            <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this milestone?')">Delete</button>
                            </form>
                        </div>
                    </td>
                    @endcan
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection