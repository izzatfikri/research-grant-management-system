@extends('layouts.tabler-template')
@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('grants.index') }}">Grants</a></li>
            <li class="breadcrumb-item active" aria-current="page">Grant Details</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="text-center">Grant Details</h1>
        </div>
        <div class="card-body">
            <h1 class="mb-4">Project Title: {{ $grant->project_title }}</h1>
            <p><strong>Project Leader:</strong> {{ $grant->leader()->name }}</p>
            <p><strong>Provider:</strong> {{ $grant->grant_provider }}</p>
            <p><strong>Amount:</strong> {{ "RM ".$grant->grant_amount }}</p>
            <p><strong>Description:</strong> {{ $grant->project_description }}</p>
            <p><strong>Start Date (YYYY/MM/DD):</strong> {{ $grant->start_date }}</p>
            <p><strong>End Date (YYYY/MM/DD):</strong> {{ $grant->end_date }}</p>
            <p><strong>Duration (months):</strong> {{ $grant->duration }}</p>

            <h2 class="mt-4">Project Members</h2>
            <ul class="list-group">
                @foreach ($members as $member)
                    <li class="list-group-item">{{ $member->name }}</li>
                @endforeach
            </ul>

            <h2 class="mt-4">Milestones</h2>
            @can('isAcademician', App\Models\User::class)
            <a href="#" class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#create-milestone">Add Milestone</a>
            @endcan
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" style="background-color: #f2f2f2;"> 
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Deliverable</th>
                    <th>Completion Date</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Date Updated</th>
                    @can('isAcademician', App\Models\User::class)
                    <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse($milestones as $index => $milestone)
                <tr class="{{ $index % 2 == 0 ? 'bg-light' : 'bg-white' }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $milestone->milestone_title }}</td>
                    <td>{{ $milestone->deliverable }}</td>
                    <td>{{ $milestone->completion_date }}</td>
                    <td>{{ $milestone->status }}</td>
                    <td>{{ $milestone->remarks }}</td>
                    <td>{{ $milestone->updated_at }}</td>
                    @can('isAcademician', App\Models\User::class)
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#update-milestone-{{ $milestone->id }}" class="btn btn-primary">Edit</a>
                    </td>
                    @endcan
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No data found</td>
                </tr>
                @endforelse
            </table>
        </div>

        <!-- Add milestone button -->

            <a href="{{ route('grants.index') }}" class="btn btn-primary mt-4">Back to Grants</a>
        </div>
    </div>
</div>
@endsection

    <div class="modal modal-blur fade" id="create-milestone" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Milestone</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('milestones.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="grant_id" value="{{ $grant->id }}">
                        <div class="mb-3">
                            <label class="form-label">Milestone Title</label>
                            <input type="text" class="form-control" name="milestone_title" placeholder="Milestone Title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deliverable</label>
                            <input type="text" class="form-control" name="deliverable" placeholder="Deliverable" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Completion Date</label>
                            <input type="date" class="form-control" name="completion_date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remarks</label>
                            <textarea class="form-control" name="remarks" rows="3" placeholder="Remarks"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary ms-auto">Add Milestone</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Update milestone status and remarks modal -->
    @foreach($milestones as $milestone)
    <div class="modal modal-blur fade" id="update-milestone-{{ $milestone->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Milestone</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('milestones.update', $milestone->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="Pending" {{ $milestone->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Completed" {{ $milestone->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remarks</label>
                            <textarea class="form-control" name="remarks" rows="3" placeholder="Remarks">{{ $milestone->remarks }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary ms-auto">Update Milestone</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach