@extends('layouts.app')

@section('title', 'Dashboard Admin | Manajemen Proyek')

@section('content')
<div class="container-fluid py-4">
    {{-- Header Halaman: Judul, Deskripsi, dan Tombol Tambah --}}
    <div class="row align-items-center mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <h3 class="mb-0 text-dark fw-bold">Manajemen Proyek</h3>
            <p class="text-muted mb-0">Kelola daftar proyek perusahaan berdasarkan tahun.</p>
        </div>
        <div class="col-md-6 d-flex justify-content-md-end justify-content-start">
            <button class="btn btn-primary rounded-pill shadow-sm px-3 py-1" data-bs-toggle="modal" data-bs-target="#tambahModal">
                <i class="bi bi-plus-circle-fill me-2"></i>Tambah Proyek
            </button>
        </div>
    </div>

    {{-- Notifikasi Session --}}
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

    {{-- Filter Tahun dan Total Proyek --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="input-group shadow-sm rounded-pill mb-2 mb-md-0" style="max-width: 300px;">
            <span class="input-group-text rounded-start-pill bg-white border-end-0 pe-1">
                <i class="bi bi-search text-muted"></i>
            </span>
            <input type="text" id="searchInput" class="form-control rounded-end-pill border-start-0 ps-1" placeholder="Cari proyek...">
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="dropdown me-2">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownFilterTahun" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter Tahun
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownFilterTahun">
                    <li><a class="dropdown-item filter-tahun" href="#" data-year="all">Semua Tahun</a></li>
                    <li><hr class="dropdown-divider"></li>
                    @foreach($years as $year)
                        <li><a class="dropdown-item filter-tahun" href="#" data-year="{{ $year }}">{{ $year }}</a></li>
                    @endforeach
                </ul>
            </div>
            {{-- Informasi Total Proyek --}}
            <div class="text-end">
                <p class="mb-0 text-muted">Total Proyek: <span class="fw-bold text-primary">{{ $projects->count() }}</span></p>
            </div>
        </div>
    </div>

    {{-- Tabel Proyek --}}
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-0">
            <div class="table-responsive project-table-container">
                <table class="table table-hover mb-0 table-fixed-layout table-sm" id="projectTable">
                    <thead class="table-secondary bg-light text-secondary text-uppercase fw-semibold">
                        <tr>
                            <th class="py-3 px-3" style="width: 50px;">No.</th>
                            <th class="py-3 px-3" style="width: 25%;">Judul Proyek</th>
                            <th class="py-3 px-3" style="width: 10%;">Tahun</th>
                            <th class="py-3 px-3" style="width: 10%;">Urutan</th>
                            <th class="py-3 px-3" style="width: 20%;">Deskripsi</th>
                            <th class="py-3 px-3" style="width: 15%;">Gambar</th>
                            <th class="py-3 px-3 text-center" style="width: 12%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $i => $project)
                            <tr class="project-row" data-year="{{ $project->year }}">
                                <td class="align-middle px-4 text-sm">{{ $i + 1 }}</td>
                                <td class="align-middle px-4 text-sm text-truncate">{{ $project->title }}</td>
                                <td class="align-middle px-4 text-sm">{{ $project->year }}</td>
                                <td class="align-middle px-4 text-sm">{{ $project->order }}</td>
                                <td class="align-middle px-4 text-sm" style="max-width: 200px;">
                                    <a href="#" class="text-primary text-decoration-none fw-semibold d-inline-block mt-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}">Baca selengkapnya...</a>
                                </td>
                                <td class="align-middle px-4">
                                    <img src="{{ Storage::url($project->image) }}" alt="Gambar Proyek" class="rounded" style="height: 50px; width: auto; object-fit: cover;">
                                </td>
                                <td class="align-middle text-center px-4">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-warning rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $project->id }}" title="Edit"><i class="bi bi-pencil-fill"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $project->id }}" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="bi bi-info-circle me-2"></i>Belum ada data proyek.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH PROYEK --}}
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form method="POST" action="{{ route('admin.projects.store') }}" class="modal-content shadow-lg rounded-lg border-0" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white p-4 rounded-top-lg">
                    <h5 class="modal-title" id="tambahModalLabel"><i class="bi bi-plus-circle me-2"></i>Tambah Proyek Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="title_tambah" class="form-label fw-semibold">Judul Proyek</label>
                        <input type="text" name="title" id="title_tambah" class="form-control" placeholder="Contoh: Proyek Pembangunan Gedung A" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="year_tambah" class="form-label fw-semibold">Tahun</label>
                            <input type="number" name="year" id="year_tambah" class="form-control" placeholder="Contoh: 2023" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="order_tambah" class="form-label fw-semibold">Urutan</label>
                            <input type="number" name="order" id="order_tambah" class="form-control" placeholder="Nilai urutan (angka)">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image_tambah" class="form-label fw-semibold">Gambar Proyek</label>
                        <input type="file" name="image" id="image_tambah" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_tambah" class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="description" id="description_tambah" class="form-control" rows="5" placeholder="Ceritakan detail proyek..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-primary fw-semibold px-4"><i class="bi bi-save me-2"></i>Simpan Data</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT & HAPUS (Loop untuk setiap item) --}}
    @foreach($projects as $project)
        {{-- Modal Edit --}}
        <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" class="modal-content shadow-lg rounded-lg border-0" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-warning text-dark p-4 rounded-top-lg">
                        <h5 class="modal-title" id="editModalLabel{{ $project->id }}"><i class="bi bi-pencil-square me-2"></i>Edit Proyek</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="title_edit_{{ $project->id }}" class="form-label fw-semibold">Judul Proyek</label>
                            <input type="text" name="title" id="title_edit_{{ $project->id }}" class="form-control" value="{{ $project->title }}" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="year_edit_{{ $project->id }}" class="form-label fw-semibold">Tahun</label>
                                <input type="number" name="year" id="year_edit_{{ $project->id }}" class="form-control" value="{{ $project->year }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="order_edit_{{ $project->id }}" class="form-label fw-semibold">Urutan</label>
                                <input type="number" name="order" id="order_edit_{{ $project->id }}" class="form-control" value="{{ $project->order ?? 0 }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image_edit_{{ $project->id }}" class="form-label fw-semibold">Gambar Proyek</label>
                            <input type="file" name="image" id="image_edit_{{ $project->id }}" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                            @if($project->image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($project->image) }}" alt="Gambar saat ini" style="height: 100px; width: auto; object-fit: cover;">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description_edit_{{ $project->id }}" class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="description" id="description_edit_{{ $project->id }}" class="form-control" rows="5" required>{{ $project->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                        <button type="submit" class="btn btn-warning fw-semibold px-4"><i class="bi bi-arrow-repeat me-2"></i>Perbarui Data</button>
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal Hapus --}}
        <div class="modal fade" id="hapusModal{{ $project->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" class="modal-content shadow-lg rounded-lg border-0">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header bg-danger text-white p-3 rounded-top-lg">
                        <h5 class="modal-title" id="hapusModalLabel{{ $project->id }}"><i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body text-center p-4">
                        <p class="mb-4">Apakah Anda yakin ingin menghapus proyek <strong>"{{ $project->title }}"</strong>?</p>
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

    /* Menambahkan scrolling vertikal saat data melebihi 11 baris */
    .project-table-container {
        max-height: 500px; /* Atur tinggi maksimal tabel, bisa disesuaikan */
        overflow-y: auto;
    }
    
    /* Mengurangi ukuran font untuk seluruh sel tabel */
    .table-fixed-layout td,
    .table-fixed-layout th {
        font-size: 0.875rem; /* Ukuran font 14px */
    }

    .text-truncate-2 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2; /* Batasi hingga 2 baris */
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const projectRows = document.querySelectorAll('.project-row');
        const filterLinks = document.querySelectorAll('.filter-tahun');

        function filterProjects(searchTerm, selectedYear) {
            projectRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                const projectYear = row.dataset.year;
                const matchesSearch = rowText.includes(searchTerm);
                const matchesYear = (selectedYear === 'all' || projectYear === selectedYear);

                if (matchesSearch && matchesYear) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const selectedYear = document.querySelector('.filter-tahun.active')?.dataset.year || 'all';
            filterProjects(searchTerm, selectedYear);
        });

        filterLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                filterLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');

                const selectedYear = this.dataset.year;
                const searchTerm = searchInput.value.toLowerCase();
                filterProjects(searchTerm, selectedYear);
            });
        });

        // Set active class for 'Semua Tahun' by default
        document.querySelector('.filter-tahun[data-year="all"]').classList.add('active');
    });
</script>
@endpush