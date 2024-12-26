@extends('layouts.tabler-template')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Account Settings
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="row g-0">
                <div class="col-12 col-md-3 border-end">
                  <div class="card-body">
                    <h4 class="subheader">Account settings</h4>
                    <div class="list-group list-group-transparent">
                      <a href="{{ route('settings.index') }}" class="list-group-item list-group-item-action d-flex align-items-center active">My Account</a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-9 d-flex flex-column">
                  <div class="card-body">
                    <h2 class="mb-4">My Account</h2>
        
                    <form method="POST" action="{{ route('settings.update', $user->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    <!--<div class="row align-items-center">
                      <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url(/static/avatars/user.png)"></span>
                      </div>
                      <div class="col-auto">
                        <input type="file" class="form-control" name="profile_picture">
                        <a href="#" class="btn">Change avatar</a>
                      </div>
                      <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                          Delete avatar
                        </a></div>
                    </div>-->
                    
                    <div class="row g-3">
                      <div class="col-md">
                      
                        <div class="form-label">Your Name</div>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <h3 class="card-title mt-4">Email</h3>
                    <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.</p>
                    <div>
                      <div class="row g-2">
                        <div class="col-auto">
                          <input type="text" class="form-control w-auto" name="email" value="{{ Auth::user()->email }}">
                        </div>
                      </div>
                    </div>
                    <h3 class="card-title mt-4">Password</h3>
                    <p class="card-subtitle">You can set a new password for accessing the ResearchGrant Hub.</p>
                    <div>
                      <input type="password" class="form-control" name="password" value="{{ Auth::user()->password }}">
                    </div>
                    
                    <h3 class="card-title mt-4">Public profile</h3>
                    <p class="card-subtitle">Making your profile public means that anyone on the ResearchGrant Hub will be able to find
                      you.</p>
                    <div>
                      <label class="form-check form-switch form-switch-lg">
                        <input class="form-check-input" type="checkbox" >
                        <span class="form-check-label form-check-label-on">You're currently visible</span>
                        <span class="form-check-label form-check-label-off">You're
                          currently invisible</span>
                      </label>
                    </div>
                  </div>
                  <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                      <a href="#" class="btn">
                        Cancel
                      </a>
                      <button type="submit" class="btn btn-primary">
                        Submit
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection