@extends('layouts.app')

@section('title', 'Dashboard Admin | Tigatra Adikara')

@section('content')
<div class="container-fluid py-4">
    {{-- Header Halaman: Judul, Deskripsi, dan Tombol Tambah --}}
    <div class="row align-items-center mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <h3 class="mb-0 text-dark fw-bold">Manajemen Service Center</h3>
            <p class="text-muted mb-0">Kelola daftar lokasi service center Anda.</p>
        </div>
        <div class="col-md-6 d-flex justify-content-md-end justify-content-start">
            <button class="btn btn-primary rounded-pill shadow-sm px-3 py-1" data-bs-toggle="modal" data-bs-target="#tambahModal">
                <i class="bi bi-plus-circle-fill me-2"></i>Tambah Service Center
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Filter (Input Pencarian) dan Total Store --}}
    <div class="d-flex justify-content-between align-items-center mb-3"> 
        <div class="input-group shadow-sm rounded-pill" style="max-width: 300px;">
            <span class="input-group-text rounded-start-pill bg-white border-end-0 pe-1">
                <i class="bi bi-search text-muted"></i>
            </span>
            <input type="text" id="searchInput" class="form-control rounded-end-pill border-start-0 ps-1" placeholder="Cari...">
        </div>
        {{-- Informasi Total Service Center --}}
        <div class="text-end">
            <p class="mb-0 text-muted">Total Service Center: <span class="fw-bold text-primary">{{ $centers->count() }}</span></p>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-fixed-layout" id="serviceCenterTable">
                    <thead class="table-secondary bg-light text-secondary text-uppercase fw-semibold">
                        <tr>
                            <th class="py-3 px-4" style="width: 50px;">No.</th>
                            <th class="py-3 px-4" style="width: 18%;">Nama</th>
                            <th class="py-3 px-4" style="width: 30%;">Alamat</th>
                            <th class="py-3 px-4" style="width: 25%;">Waktu Pelayanan</th>
                            <th class="py-3 px-4 text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($centers as $i => $c)
                            <tr>
                                <td class="align-middle px-4">{{ $i + 1 }}</td>
                                <td class="align-middle px-4">{{ $c->nama }}</td>
                                <td class="align-middle px-4 alamat-cell">
                                    {{ $c->alamat }}
                                </td>
                                <td class="align-middle px-4">{{ $c->waktu_pelayanan }}</td>
                                <td class="align-middle text-center px-4">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-warning rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $c->id }}" title="Edit"><i class="bi bi-pencil-fill"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $c->id }}" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4 no-filter">
                                    <i class="bi bi-info-circle me-2"></i>Belum ada data service center.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH SERVICE CENTER (Kode ini tetap sama) --}}
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="/service/tambah" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                <div class="modal-header bg-primary text-white p-4 rounded-top-lg">
                    <h5 class="modal-title" id="tambahModalLabel"><i class="bi bi-plus-circle me-2"></i>Tambah Service Center Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="nama_tambah" class="form-label fw-semibold">Nama Lokasi</label>
                        <input type="text" name="nama" id="nama_tambah" class="form-control rounded-pill" placeholder="Contoh: Service Center Jakarta" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_tambah" class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat_tambah" class="form-control rounded-lg" rows="3" placeholder="Contoh: Jl. Sudirman No. 123, Jakarta Pusat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_pelayanan_tambah" class="form-label fw-semibold">Waktu Pelayanan</label>
                        <input type="text" name="waktu_pelayanan" id="waktu_pelayanan_tambah" class="form-control rounded-pill" placeholder="Contoh: Senin-Jumat, 09.00-17.00" required>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-primary fw-semibold px-4"><i class="bi bi-save me-2"></i>Simpan Data</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT & HAPUS (Loop untuk setiap item - Kode ini tetap sama) --}}
    @foreach($centers as $c)
    <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $c->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="/service/edit/{{ $c->id }}" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                <div class="modal-header bg-warning text-dark p-4 rounded-top-lg">
                    <h5 class="modal-title" id="editModalLabel{{ $c->id }}"><i class="bi bi-pencil-square me-2"></i>Edit Service Center</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="nama_edit_{{ $c->id }}" class="form-label fw-semibold">Nama Lokasi</label>
                        <input type="text" name="nama" id="nama_edit_{{ $c->id }}" class="form-control rounded-pill" value="{{ $c->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_edit_{{ $c->id }}" class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat_edit_{{ $c->id }}" class="form-control rounded-lg" rows="3" required>{{ $c->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_pelayanan_edit_{{ $c->id }}" class="form-label fw-semibold">Waktu Pelayanan</label>
                        <input type="text" name="waktu_pelayanan" id="waktu_pelayanan_edit_{{ $c->id }}" class="form-control rounded-pill" value="{{ $c->waktu_pelayanan }}" required>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-warning fw-semibold px-4"><i class="bi bi-arrow-repeat me-2"></i>Perbarui Data</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="hapusModal{{ $c->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $c->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <form method="POST" action="/service/hapus/{{ $c->id }}" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                @method('DELETE')
                <div class="modal-header bg-danger text-white p-3 rounded-top-lg">
                    <h5 class="modal-title" id="hapusModalLabel{{ $c->id }}"><i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="mb-4">Apakah Anda yakin ingin menghapus service center <strong>"{{ $c->nama }}"</strong>?</p>
                    <small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-danger fw-semibold px-4"><i class="bi bi-trash-fill me-2"></i>Ya, Hapus</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

</div>
@endsection

@push('styles')
<style>
    .table-fixed-layout {
        table-layout: fixed;
        width: 100%;
    }

    .table-fixed-layout th,
    .table-fixed-layout td {
        overflow: hidden;
    }

    .alamat-cell {
        white-space: normal;
        word-break: break-all;
        text-align: justify;
        -webkit-hyphens: auto;
        -ms-hyphens: auto;
        hyphens: auto;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Kustomisasi untuk input-group agar lebih rapi */
    .input-group.rounded-pill > .input-group-text,
    .input-group.rounded-pill > .form-control {
        border-color: #dee2e6; /* Warna border default Bootstrap */
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.querySelector('#serviceCenterTable tbody');
        const tableRows = tableBody.querySelectorAll('tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            tableRows.forEach(function(row) {
                if (row.classList.contains('no-filter')) {
                    return;
                }

                const rowText = row.textContent.toLowerCase();

                if (rowText.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush