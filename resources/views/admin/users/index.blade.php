@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-primary fw-bold">Daftar Semua User</h1>

    <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-4 shadow-sm">
        <i class="bi bi-plus-circle me-2"></i> Tambah User
    </a>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle mb-0 bg-white">
            <thead class="table-dark">
                <tr>
                    <th scope="col" style="width: 5%;">No</th>
                    <th scope="col" style="width: 25%;">Nama</th>
                    <th scope="col" style="width: 30%;">Email</th>
                    <th scope="col" style="width: 15%;">Role</th>
                    <th scope="col" style="width: 25%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $users->firstItem() + $index }}</td>
                    <td class="fw-semibold text-secondary">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge 
                            @if($user->role === 'admin') bg-danger
                            @elseif($user->role === 'user') bg-primary
                            @else bg-secondary
                            @endif
                        ">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm me-2" title="Edit User">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" title="Hapus User">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
