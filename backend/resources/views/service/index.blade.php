@extends('layouts.app')
@section('title', 'Service Center')

@section('content')
<div class="container-fluid mt-4">
    <h4 class="text-primary mb-4">Manajemen Service Center</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Service Center</button>

    <!-- Tabel -->
    <div class="table-responsive bg-white p-3 shadow rounded">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Waktu Pelayanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($centers as $i => $c)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $c->nama }}</td>
                    <td>{{ $c->alamat }}</td>
                    <td>{{ $c->waktu_pelayanan }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $c->id }}">Edit</button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $c->id }}">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="/service/tambah" class="modal-content">
            @csrf
            <div class="modal-header"><h5 class="modal-title">Tambah Service Center</h5></div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="mb-2">
                    <label>Waktu Pelayanan</label>
                    <input type="text" name="waktu_pelayanan" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit & Hapus Ditaruh Di Luar Tabel -->
@foreach($centers as $c)
<!-- Modal Edit -->
<div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="/service/edit/{{ $c->id }}" class="modal-content">
            @csrf
            <div class="modal-header"><h5 class="modal-title">Edit Service Center</h5></div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $c->nama }}" required>
                </div>
                <div class="mb-2">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ $c->alamat }}</textarea>
                </div>
                <div class="mb-2">
                    <label>Waktu Pelayanan</label>
                    <input type="text" name="waktu_pelayanan" class="form-control" value="{{ $c->waktu_pelayanan }}" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal{{ $c->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="/service/hapus/{{ $c->id }}" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header"><h5 class="modal-title">Hapus Service Center</h5></div>
            <div class="modal-body">
                Yakin ingin menghapus <strong>{{ $c->nama }}</strong>?
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
