@extends('layouts.tabler-template')
@section('title', 'Project')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Projects</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white text-center">
            <h1>Projects List</h1>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" style="background-color: #f2f2f2;">
            <thead>
                <tr>
                    <th>No.</th>
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
                    <td>{{ $index + 1 }}</td>
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
                            <a href="{{ route('projects.show', $grant->id) }}" class="btn btn-info">Show</a>
                        </div>
                    </td>
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