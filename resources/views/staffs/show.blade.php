@extends('layouts.tabler-template')
@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('staffs.index') }}">Staffs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Staff Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
        <div class="col">
        <a href="{{ route('staffs.index') }}" class="btn btn-secondary mt-3">Back to Staffs</a>
        </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ $staff->name }}</h5>
            <p class="text-muted mb-1">{{ $staff->email }}</p>
            <p class="text-muted mb-4">{{ $staff->staff_number }}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $staff->name }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Staff Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $staff->staff_number }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $staff->email }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection