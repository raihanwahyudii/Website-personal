<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Hafalan Tracker') }}</title>

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    
    <style>
        body {
            background-color:rgb(248, 250, 248);
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>

    @yield('head')
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Hafalan Tracker') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
                <ul class="navbar-nav me-auto">
                    {{-- Menu berdasarkan role --}}
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">
                                <i class="bi bi-people"></i> Kelola Santri & Ustad
                            </a>
                        </li>
                    @elseif(auth()->user()->role === 'ustad')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('setoran.index') }}">
                                <i class="bi bi-journal-text"></i> Setoran Santri
                            </a>
                        </li>
                    @elseif(auth()->user()->role === 'santri')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('santri.setoran') }}">
                                <i class="bi bi-bookmark-check"></i> Hafalan Saya
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('santri.download') }}">
                                <i class="bi bi-file-earmark-pdf"></i> Unduh PDF
                            </a>
                        </li>
                    @endif
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex align-items-center me-2 text-muted small">
                        Login sebagai: <strong class="ms-1">{{ auth()->user()->name }}</strong> ({{ auth()->user()->role }})
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" role="button">
                            <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
