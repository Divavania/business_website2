@extends('layouts.app')

@section('title', 'Manajemen Produk | Tigatra Adikara')

@section('content')
<div class="container-fluid py-4">
    {{-- Header Halaman: Judul dan Tombol Tambah Produk --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0 text-primary fw-bold">Manajemen Produk</h3>
            <p class="text-muted mb-0">Kelola daftar produk, tambah, edit, atau hapus dengan mudah.</p>
        </div>
        <button class="btn btn-primary btn-sm fw-bold rounded-pill px-3 py-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-circle me-1"></i> Tambah Produk
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            Terjadi kesalahan saat memproses data. Mohon periksa kembali input Anda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- KONTROL UTAMA: Search, Filters --}}
{{-- Semua filter dan search dalam satu card untuk kerapian --}}
<div class="card shadow-sm border-0 rounded-lg mb-4">
    <div class="card-body py-3">
        <form id="filterForm" action="{{ route('admin.products.index') }}" method="GET" class="d-flex justify-content-between align-items-center gap-2 flex-wrap">
            {{-- Filters (gunakan gap-2 untuk spasi antar filter) --}}
            <div class="d-flex flex-wrap gap-2"> {{-- Membungkus dropdown filter untuk kontrol yang lebih baik --}}
                <select name="kategori" class="form-select rounded-pill shadow-sm" style="width: auto; min-width: 140px;" onchange="this.form.submit()">
                    <option value="all" {{ request('kategori') == 'all' ? 'selected' : '' }}>Semua Kategori</option>
                    <option value="hardware" {{ request('kategori') == 'hardware' ? 'selected' : '' }}>Hardware</option>
                    <option value="software" {{ request('kategori') == 'software' ? 'selected' : '' }}>Software</option>
                </select>

                {{-- Urutkan Harga dihapus --}}
                {{-- <select name="sort_harga" class="form-select rounded-pill shadow-sm" style="width: auto; min-width: 160px;" onchange="this.form.submit()">
                    <option value="">Urutkan Harga</option>
                    <option value="asc" {{ request('sort_harga') == 'asc' ? 'selected' : '' }}>Termurah</option>
                    <option value="desc" {{ request('sort_harga') == 'desc' ? 'selected' : '' }}>Termahal</option>
                </select> --}}

                <select name="sort_nama" class="form-select rounded-pill shadow-sm" style="width: auto; min-width: 160px;" onchange="this.form.submit()">
                    <option value="">Urutkan Nama</option>
                    <option value="asc" {{ request('sort_nama') == 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('sort_nama') == 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </div>
            {{-- Search Input (membuatnya mengambil ruang yang cukup) --}}
            <div class="input-group flex-grow-1 me-2" style="max-width: 300px;"> {{-- Tambahkan flex-grow-1 dan me-2 --}}
                <input type="text" class="form-control rounded-pill border-0 shadow-sm" placeholder="Cari produk..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary rounded-pill ms-2" type="submit"><i class="bi bi-search"></i></button>
            </div>

        </form>
    </div>
</div>

{{-- Total Product Info (Dikeluarkan dari Card) --}}
<div class="mb-4 text-muted small text-end"> {{-- Tambahkan text-end untuk rata kanan --}}
    Menampilkan {{ $products->firstItem() }} - {{ $products->lastItem() }} dari **{{ $totalProducts }}** produk.
</div>

    {{-- Bagian tabel dan modal tetap sama seperti sebelumnya --}}
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light text-secondary text-uppercase fw-semibold">
                        <tr>
                            <th class="py-3 px-4" style="width: 50px;">No.</th>
                            <th class="py-3 px-4">Gambar</th>
                            <th class="py-3 px-4">Nama Produk</th>
                            <th class="py-3 px-4">Kategori</th>
                            {{-- Harga dihapus dari header tabel --}}
                            {{-- <th class="py-3 px-4">Harga</th> --}}
                            <th class="py-3 px-4 text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $index => $p)
                            <tr>
                                <td class="align-middle px-4">{{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</td>
                                <td class="align-middle px-4">
                                    @if($p->gambar)
                                        <img src="{{ asset('storage/' . $p->gambar) }}" class="rounded" width="70" height="70" style="object-fit: cover; border: 1px solid #dee2e6;">
                                    @else
                                        <span class="text-muted small">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="align-middle px-4 fw-semibold">{{ $p->nama }}</td>
                                <td class="align-middle px-4 text-muted">{{ ucfirst($p->kategori) }}</td>
                                {{-- Harga dihapus dari body tabel --}}
                                {{-- <td class="align-middle px-4 fw-semibold text-primary">Rp {{ number_format($p->harga, 0, ',', '.') }}</td> --}}
                                <td class="align-middle text-center px-4">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-warning btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $p->id }}" title="Edit Produk"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $p->id }}" title="Hapus Produk"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4"> {{-- colspan disesuaikan --}}
                                    <i class="bi bi-box-seam me-2"></i>Belum ada produk yang terdaftar. Tambahkan produk pertama Anda!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($products instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $products->hasPages())
            <div class="card-footer bg-light border-0">
                {{ $products->appends(request()->input())->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

    {{-- MODAL TAMBAH PRODUK --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            {{-- KOREKSI: Menggunakan route() helper untuk action --}}
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                <input type="hidden" name="form_type" value="add">
                <div class="modal-header bg-primary text-white p-4 rounded-top-lg">
                    <h5 class="modal-title" id="modalTambahLabel"><i class="bi bi-plus-circle me-2"></i>Tambah Produk Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nama_produk_tambah" class="form-label fw-semibold">Nama Produk</label>
                            <input type="text" name="nama" id="nama_produk_tambah" class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}">
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="kategori_tambah" class="form-label fw-semibold">Kategori</label>
                            <select name="kategori" id="kategori_tambah" class="form-select @error('kategori') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                <option value="hardware" {{ old('kategori') == 'hardware' ? 'selected' : '' }}>Hardware</option>
                                <option value="software" {{ old('kategori') == 'software' ? 'selected' : '' }}>Software</option>
                            </select>
                            @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        {{-- Harga dihapus dari modal tambah --}}
                        {{-- <div class="col-md-6">
                            <label for="harga_tambah" class="form-label fw-semibold">Harga (Rp)</label>
                            <input type="number" name="harga" id="harga_tambah" class="form-control @error('harga') is-invalid @enderror" required value="{{ old('harga') }}">
                            @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div> --}}
                        <div class="col-md-6">
                            <label for="gambar_tambah" class="form-label fw-semibold">Gambar Produk (Opsional)</label>
                            <input type="file" name="gambar" id="gambar_tambah" class="form-control @error('gambar') is-invalid @enderror">
                            @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-12">
                            <label for="deskripsi_tambah" class="form-label fw-semibold">Deskripsi Produk</label>
                            <textarea name="deskripsi" id="deskripsi_tambah" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-12">
                            <label for="spesifikasi_tambah" class="form-label fw-semibold">Spesifikasi Produk</label>
                            <textarea name="spesifikasi" id="spesifikasi_tambah" class="form-control @error('spesifikasi') is-invalid @enderror" rows="3">{{ old('spesifikasi') }}</textarea>
                            @error('spesifikasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-primary fw-semibold"><i class="bi bi-save me-2"></i>Simpan Produk</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT PRODUK --}}
    @foreach($products as $p)
    <div class="modal fade" id="modalEdit{{ $p->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $p->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            {{-- KOREKSI: Menggunakan route() helper untuk action --}}
            <form action="{{ route('admin.products.update', $p->id) }}" method="POST" enctype="multipart/form-data" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                <input type="hidden" name="form_type" value="edit">
                <input type="hidden" name="product_id_for_error" value="{{ $p->id }}">
                <div class="modal-header bg-warning text-white p-4 rounded-top-lg">
                    <h5 class="modal-title" id="modalEditLabel{{ $p->id }}"><i class="bi bi-pencil-square me-2"></i>Edit Produk: {{ $p->nama }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nama_produk_edit_{{ $p->id }}" class="form-label fw-semibold">Nama Produk</label>
                            <input type="text" name="nama" id="nama_produk_edit_{{ $p->id }}" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $p->nama) }}" required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="kategori_edit_{{ $p->id }}" class="form-label fw-semibold">Kategori</label>
                            <select name="kategori" id="kategori_edit_{{ $p->id }}" class="form-select @error('kategori') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                <option value="hardware" {{ old('kategori', $p->kategori) == 'hardware' ? 'selected' : '' }}>Hardware</option>
                                <option value="software" {{ old('kategori', $p->kategori) == 'software' ? 'selected' : '' }}>Software</option>
                            </select>
                            @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        {{-- Harga dihapus dari modal edit --}}
                        {{-- <div class="col-md-6">
                            <label for="harga_edit_{{ $p->id }}" class="form-label fw-semibold">Harga (Rp)</label>
                            <input type="number" name="harga" id="harga_edit_{{ $p->id }}" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $p->harga) }}" required>
                            @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div> --}}
                        <div class="col-md-6">
                            <label for="gambar_edit_{{ $p->id }}" class="form-label fw-semibold">Gambar Produk (Opsional)</label>
                            <input type="file" name="gambar" id="gambar_edit_{{ $p->id }}" class="form-control @error('gambar') is-invalid @enderror">
                            @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            @if($p->gambar)
                                <div class="mt-2 text-muted small">Gambar saat ini:</div>
                                <img src="{{ asset('storage/' . $p->gambar) }}" width="70" height="70" class="rounded mt-1" style="object-fit: cover; border: 1px solid #dee2e6;">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="deskripsi_edit_{{ $p->id }}" class="form-label fw-semibold">Deskripsi Produk</label>
                            <textarea name="deskripsi" id="deskripsi_edit_{{ $p->id }}" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $p->deskripsi) }}</textarea>
                            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-12">
                            <label for="spesifikasi_edit_{{ $p->id }}" class="form-label fw-semibold">Spesifikasi Produk</label>
                            <textarea name="spesifikasi" id="spesifikasi_edit_{{ $p->id }}" class="form-control @error('spesifikasi') is-invalid @enderror" rows="3">{{ old('spesifikasi', $p->spesifikasi) }}</textarea>
                            @error('spesifikasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-warning text-white fw-semibold"><i class="bi bi-arrow-clockwise me-2"></i>Update Produk</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL HAPUS PRODUK --}}
    <div class="modal fade" id="hapusModal{{ $p->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $p->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            {{-- KOREKSI: Menggunakan route() helper untuk action --}}
            <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                @method('DELETE')
                <div class="modal-header bg-danger text-white p-3 rounded-top-lg">
                    <h5 class="modal-title" id="hapusModalLabel{{ $p->id }}"><i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="mb-4">Apakah Anda yakin ingin menghapus produk <strong class="text-danger">{{ $p->nama }}</strong>?</p>
                    <small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-danger fw-semibold px-4"><i class="bi bi-trash me-2"></i>Ya, Hapus</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

</div>

{{-- Script untuk menjaga modal tetap terbuka setelah validasi gagal --}}
@if($errors->any() && (old('form_type') == 'add' || old('form_type') == 'edit'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(old('form_type') == 'add')
                var addModal = new bootstrap.Modal(document.getElementById('modalTambah'));
                addModal.show();
            @elseif(old('form_type') == 'edit')
                var editModalId = 'modalEdit' + '{{ old("product_id_for_error") }}';
                var editModal = new bootstrap.Modal(document.getElementById(editModalId));
                editModal.show();
            @endif
        });
    </script>
@endif

<script>
    document.getElementById('filterForm').addEventListener('submit', function(e) {
        // Prevent the default action of submitting the form, in case you need custom logic
        e.preventDefault();
        // You can add your form submission logic here if needed
        // For now, just submit the form normally:
        this.submit();
    });

    // Optional: Add custom logic here for saving scroll position if needed
</script>
@endsection
