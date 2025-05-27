@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">
      <div class="card shadow-sm border rounded-4">
        
        <div class="card-header bg-danger text-white text-center fs-4 fw-semibold rounded-top">
          {{ __('Login') }}
        </div>
        
        <div class="card-body p-4">
          <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label fw-semibold text-secondary">{{ __('Email Address') }}</label>
              <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="email"
                placeholder="you@example.com"
                class="form-control form-control-lg @error('email') is-invalid @enderror"
              >
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label fw-semibold text-secondary">{{ __('Password') }}</label>
              <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
                class="form-control form-control-lg @error('password') is-invalid @enderror"
              >
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-4 form-check">
              <input
                type="checkbox"
                class="form-check-input"
                id="remember"
                name="remember"
                {{ old('remember') ? 'checked' : '' }}
              >
              <label class="form-check-label text-secondary" for="remember">
                {{ __('Remember Me') }}
              </label>
            </div>

            <div class="d-grid gap-3">
              <button type="submit" class="btn btn-danger btn-lg fw-semibold shadow-sm">
                {{ __('Login') }}
              </button>

              @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-center text-danger text-decoration-none fw-semibold small">
                  {{ __('Forgot Your Password?') }}
                </a>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
