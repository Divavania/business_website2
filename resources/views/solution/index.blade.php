@extends('layouts.app')

@section('title', 'Manajemen Solusi Teknologi | Tigatra Adikara')

@section('content')
<div class="container-fluid py-4">
    <div class="row align-items-center mb-3">
        <div class="col-md-6">
            <h3 class="mb-0 text-primary fw-bold">Manajemen Solusi</h3>
            <p class="text-muted mb-0">Kelola daftar solusi yang tersedia.</p>
        </div>
        <div class="col-md-6 d-flex justify-content-md-end justify-content-start">
            <button class="btn btn-primary rounded-pill shadow-sm px-3 py-1" data-bs-toggle="modal" data-bs-target="#tambahModal">
                <i class="bi bi-plus-circle-fill me-2"></i>Tambah Solusi
            </button>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="solutionTable">
                    <thead class="bg-light text-secondary text-uppercase fw-semibold">
                        <tr>
                            <th class="py-3 px-4" style="width: 5%;">No.</th>
                            <th class="py-3 px-4" style="width: 25%;">Judul</th>
                            <th class="py-3 px-4" style="width: 55%;">Deskripsi</th>
                            <th class="py-3 px-4 text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solutions as $i => $solution)
                        <tr>
                            <td class="align-middle px-4">{{ $i + 1 }}</td>
                            <td class="align-middle px-4">{{ $solution->judul }}</td>
                            <td class="align-middle px-4">
                                <a href="#" class="text-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#editModal{{ $solution->id }}">
                                    Baca Selengkapnya
                                </a>
                            </td>
                            <td class="align-middle text-center px-4">
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $solution->id }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $solution->id }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal{{ $solution->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $solution->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content shadow-lg rounded-xl">
                                    <div class="modal-header bg-danger text-white px-4 py-3 rounded-top-xl d-flex justify-content-between align-items-center">
                                        <h5 class="modal-title fs-5" id="deleteModalLabel{{ $solution->id }}"><i class="bi bi-trash-fill me-2"></i>Hapus Solusi</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <p>Apakah Anda yakin ingin menghapus solusi <strong>{{ $solution->judul }}</strong>?</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-end p-3 bg-light border-top rounded-bottom-xl">
                                        <button type="button" class="btn btn-secondary px-4 me-2" data-bs-dismiss="modal">Batal</button>
                                        <form method="POST" action="{{ route('admin.solution.destroy', $solution->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger fw-semibold px-4"><i class="bi bi-trash me-2"></i>Hapus Solusi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content shadow-lg rounded-xl">
                <form method="POST" action="{{ route('admin.solution.store') }}">
                    @csrf
                    <div class="modal-header bg-primary text-white px-4 py-3 rounded-top-xl d-flex justify-content-between align-items-center">
                        <h5 class="modal-title fs-5" id="tambahModalLabel"><i class="bi bi-plus-circle me-2"></i>Tambah Solusi Baru</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">Judul Solusi</label>
                            <input type="text" name="judul" id="judul" class="form-control form-control-lg rounded-pill border-light-subtle" placeholder="Masukkan judul solusi" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi Solusi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control rounded-lg border-light-subtle" rows="5" placeholder="Tuliskan deskripsi lengkap solution..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end p-3 bg-light border-top rounded-bottom-xl">
                        <button type="button" class="btn btn-secondary px-4 me-2" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary fw-semibold px-4"><i class="bi bi-save me-2"></i>Simpan Solusi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($solutions as $solution)
    <div class="modal fade" id="editModal{{ $solution->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $solution->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content shadow-lg rounded-xl">
                <form method="POST" action="{{ route('admin.solution.update', $solution->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-warning text-dark px-4 py-3 rounded-top-xl d-flex justify-content-between align-items-center">
                        <h5 class="modal-title fs-5" id="editModalLabel{{ $solution->id }}"><i class="bi bi-pencil-square me-2"></i>Edit Solusi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">Judul Solusi</label>
                            <input type="text" name="judul" id="judul" class="form-control form-control-lg rounded-pill border-light-subtle" value="{{ $solution->judul }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi Solusi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control rounded-lg border-light-subtle" rows="5" required>{{ $solution->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end p-3 bg-light border-top rounded-bottom-xl">
                        <button type="button" class="btn btn-secondary px-4 me-2" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning fw-semibold px-4"><i class="bi bi-arrow-repeat me-2"></i>Perbarui Solusi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
    .btn.btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .btn-success {
        background-color: #198754 !important; /* Warna hijau */
        border-color: #198754 !important;
        color: #fff !important;
    }

    .btn-danger {
        background-color: #dc3545 !important; /* Warna merah */
        border-color: #dc3545 !important;
        color: #fff !important;
    }
</style>
@endsection
