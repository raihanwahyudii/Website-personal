@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center mb-4"
        style="min-height: 100vh; background: linear-gradient(135deg, #ff9a9e, #fad0c4);">
        <div class="card shadow-lg p-4" style="border-radius: 20px; max-width: 400px; width: 100%; background: #ffffff;">
            <div class="text-center">
                <h2 class="mb-3" style="font-weight: bold; color: #333;">Login</h2>
                <p class="mb-4" style="color: #666;">Welcome back! Please login to your account.</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #555;">Email Address</label>
                    <input type="email" name="'email" id="email" class="form-control"
                        style="border-radius: 30px; background: #f9f9f9;" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #555;">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        style="border-radius: 30px; background: #f9f9f9;" placeholder="Enter your password" required>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me" class="ms-1" style="color: #777;">Remember Me</label>
                    </div>
                    <a href="#" class="text-decoration-none" style="color: #ff6f61;">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100"
                    style="border-radius: 30px; background: linear-gradient(135deg, #ff758c, #ff7eb3); border: none;">
                    Login
                </button>
            </form>
            <hr class="my-4">
            <div class="text-center">
                <p style="color: #777;">Or login with</p>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-secondary me-2" style="border-radius: 50px; width: 50px; height: 50px;">
                        <i class="bi bi-facebook" style="font-size: 20px; color: #3b5998;"></i>
                    </button>
                    <button class="btn btn-outline-secondary me-2" style="border-radius: 50px; width: 50px; height: 50px;">
                        <i class="bi bi-google" style="font-size: 20px; color: #db4437;"></i>
                    </button>
                    <button class="btn btn-outline-secondary" style="border-radius: 50px; width: 50px; height: 50px;">
                        <i class="bi bi-twitter" style="font-size: 20px; color: #1da1f2;"></i>
                    </button>
                </div>
            </div>
            <p class="mt-4 text-center" style="color: #777;">Don't have an account? <a href="#"
                    class="text-decoration-none" style="color: #ff6f61;">Sign Up</a></p>
        </div>
    </div>
@endsection
