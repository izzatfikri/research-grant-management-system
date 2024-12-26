<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Login</title>
    <!-- Tabler CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
          --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, 
          San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
          font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body class="d-flex flex-column">
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="#" class="navbar-brand navbar-brand-autodark">
            <img src="{{ asset('static/logo.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            <h2 style="margin: left 10px; padding-top: 25px;">ResearchGrant Hub</h2>
          </a>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form method="POST" action="{{ route('login') }}" autocomplete="off">
              @csrf
              <!-- Email Address -->
              <div class="mb-3">
                <label class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <!-- Password -->
              <div class="mb-2">
                <label class="form-label">
                  {{ __('Password') }}
                </label>
                <div class="input-group input-group-flat">
                  <input id="password" type="password"
                         class="form-control @error('password') is-invalid @enderror"
                         name="password" required autocomplete="current-password" 
                         placeholder="Your password">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                      <!-- Eye Icon -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" 
                           height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                           fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 
                          0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 
                          6.6 2 9 6" />
                      </svg>
                    </a>
                  </span>
                </div>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <!-- Remember Me -->
              <div class="mb-2">
                <label class="form-check">
                  <input type="checkbox" name="remember" class="form-check-input" 
                         {{ old('remember') ? 'checked' : '' }}>
                  <span class="form-check-label">Remember me on this device</span>
                </label>
              </div>
              <!-- Submit -->
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Sign in') }}</button>
              </div>
            </form>
          </div>
          
         
        </div>
      </div>
    </div>
    <!-- Tabler Core JS -->
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js') }}" defer></script>
  </body>
</html>