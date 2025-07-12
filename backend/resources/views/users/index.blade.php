@extends('layouts.app')
@section('title', 'Kelola Admin')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Kelola Admin</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
        + Tambah Admin
    </button>

    <div class="table-responsive bg-white p-3 shadow rounded">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $i => $u)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ ucfirst($u->role) }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $u->id }}">Edit</button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $u->id }}">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada admin</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="/users/tambah" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Tambah Admin</h5></div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin">Admin</option>
                        <option value="superadmin">Superadmin</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Simpan</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit & Hapus DITARUH DI LUAR TABEL -->
@foreach($users as $u)
<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $u->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="/users/edit/{{ $u->id }}" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Edit Admin</h5></div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ $u->nama }}" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $u->email }}" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Password Baru (opsional)</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin" {{ $u->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="superadmin" {{ $u->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal{{ $u->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="/users/hapus/{{ $u->id }}" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header"><h5>Hapus Admin</h5></div>
            <div class="modal-body">
                Yakin ingin menghapus <strong>{{ $u->nama }}</strong>?
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger">Hapus</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
