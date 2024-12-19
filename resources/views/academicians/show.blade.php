@extends('layouts.tabler-template')
@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Academicians</a></li>
            <li class="breadcrumb-item active" aria-current="page">Academician Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
        <div class="col">
        <a href="{{ route('academicians.index') }}" class="btn btn-secondary mt-3">Back to Academicians</a>
        </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ $academician->name }}</h5>
            <p class="text-muted mb-1">{{ $academician->position }}</p>
            <p class="text-muted mb-4">{{ $academician->college }}</p>
            <!--<div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>-->
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-envelope fa-lg text-warning"></i>
                <p class="mb-0">{{ $academician->email }}</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-building fa-lg text-body"></i>
                <p class="mb-0">{{ $academician->department }}</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-university fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">{{ $academician->university }}</p>
              </li>
            </ul>
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
                <p class="text-muted mb-0">{{ $academician->name }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Staff Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $academician->staff_number }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $academician->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">College</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $academician->college }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Department</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $academician->department }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Position</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $academician->position }}</p>
              </div>
            </div>
          </div>
        </div>

        <!--
        <h4 class="profile-title">About Me</h4>
        <div class="card mb-4 shadow-sm animate__animated animate__fadeIn">
            <div class="card-body">
                <p>{{ $academician->about }}</p>
            </div>
        </div>-->

        <!--
        <h4 class="profile-title">Working Experiences</h4>
        <table class="table table-bordered profile-table">
            <tr>
                <th>Position</th>
                <th>Place of Work</th>
                <th>Start</th>
                <th>End</th>
            </tr>

        </table>-->

       
      </div>
    </div>
  </div>
</section>
@endsection

@push('headerScripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endpush