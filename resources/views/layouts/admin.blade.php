<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
    <div>
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Semua User</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.santri.index') }}">Santri</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.ustad.index') }}">Ustad</a></li>
      </ul>
    </div>
    <div>
      <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger btn-sm">Logout</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </div>
  </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>
