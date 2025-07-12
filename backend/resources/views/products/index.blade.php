@extends('layouts.app')

@section('title', 'Manajemen Produk')

@section('content')
<div class="container">
    <h4 class="text-primary mb-4">Manajemen Produk</h4>

    <!-- ALERT -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah Produk -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah Produk</button>

    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg"> <!-- modal-lg agar cukup untuk 2 kolom -->
            <form action="/products/tambah" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Nama Produk</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Kategori</label>
                            <select name="kategori" class="form-select" required>
                                <option value="hardware">Hardware</option>
                                <option value="software">Software</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label>Spesifikasi</label>
                            <textarea name="spesifikasi" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Produk -->
    <table class="table table-bordered table-hover table-striped bg-white shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>
                        @if($p->gambar)
                            <img src="{{ asset('storage/' . $p->gambar) }}" width="60" height="60" style="object-fit: cover;">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ ucfirst($p->kategori) }}</td>
                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $p->id }}">Edit</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $p->id }}">Hapus</button>
                    </td>
                </tr>
            @endforeach

            @if(count($products) == 0)
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada produk.</td>
                </tr>
            @endif
        </tbody>
    </table>

    @foreach($products as $p)
    <!-- Modal Edit Produk -->
    <div class="modal fade" id="modalEdit{{ $p->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form action="/products/edit/{{ $p->id }}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Nama Produk</label>
                            <input type="text" name="nama" class="form-control" value="{{ $p->nama }}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Kategori</label>
                            <select name="kategori" class="form-select" required>
                                <option value="hardware" {{ $p->kategori == 'hardware' ? 'selected' : '' }}>Hardware</option>
                                <option value="software" {{ $p->kategori == 'software' ? 'selected' : '' }}>Software</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ $p->harga }}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Gambar (Opsional)</label>
                            <input type="file" name="gambar" class="form-control">
                            @if($p->gambar)
                                <img src="{{ asset('storage/' . $p->gambar) }}" width="60" height="60" class="mt-2" style="object-fit: cover;">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="2">{{ $p->deskripsi }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label>Spesifikasi</label>
                            <textarea name="spesifikasi" class="form-control" rows="2">{{ $p->spesifikasi }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <!-- Modal Hapus -->
    <div class="modal fade" id="hapusModal{{ $p->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $p->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/products/hapus/{{ $p->id }}" method="POST" class="modal-content">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus produk <strong>{{ $p->nama }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
