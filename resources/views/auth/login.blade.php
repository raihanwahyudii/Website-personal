@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Login ke Akunmu</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                </form>

                <div class="text-center">
                    <small>Belum punya akun? <a href="#">Daftar</a></small>
                </div>
            </div>
        </div>
    </div>
@endsection
