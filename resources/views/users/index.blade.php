@extends('layouts.app')
@section('title', 'Dashboard Admin | Tigatra Adikara')

@section('content')
<div class="container-fluid py-4">
    {{-- Header Halaman: Judul, Deskripsi, dan Tombol Tambah --}}
    <div class="row align-items-center mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <h3 class="mb-0 fw-bold">Manajemen Admin</h3>
            <p class="text-muted mb-0">Kelola daftar pengguna admin dan superadmin Anda.</p>
        </div>
        <div class="col-md-6 d-flex justify-content-md-end justify-content-start">
            {{-- Tombol Tambah Admin --}}
           @if(session()->has('user') && session('user')->role == 'superadmin')
                <button class="btn btn-primary rounded-pill shadow-sm px-3 py-1" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    <i class="bi bi-plus-circle-fill me-2"></i>Tambah Admin
                </button>
            @else
                {{-- Tombol non-aktif jika bukan superadmin --}}
                <button class="btn btn-primary rounded-pill shadow-sm px-3 py-1" disabled style="opacity: 0.6; cursor: not-allowed;">
                    <i class="bi bi-plus-circle-fill me-2"></i>Tambah Admin
                </button>
            @endif
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

    {{-- Filter (Input Pencarian) dan Total Admin --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ url('/users') }}" method="GET" class="d-flex w-100 me-3">
            <div class="input-group shadow-sm rounded-pill" style="max-width: 300px;">
                <span class="input-group-text rounded-start-pill bg-white border-end-0 pe-1">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text" name="search" id="searchInput" class="form-control rounded-end-pill border-start-0 ps-1" placeholder="Cari admin..." value="{{ request('search') }}">
            </div>
            <button type="submit" class="d-none">Search</button>
        </form>
        <div class="text-end">
            <p class="mb-0 text-muted">Total Admin: <span class="fw-bold text-primary">{{ $users->count() }}</span></p>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-fixed-layout" id="adminTable">
                    <thead class="bg-light text-secondary text-uppercase fw-semibold">
                        <tr>
                            <th class="py-3 px-4" style="width: 50px;">No.</th>
                            <th class="py-3 px-4" style="width: 25%;">Nama</th>
                            <th class="py-3 px-4" style="width: 35%;">Email</th>
                            <th class="py-3 px-4" style="width: 15%;">Role</th>
                            <th class="py-3 px-4 text-center" style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $i => $u)
                        <tr>
                            <td class="align-middle px-4">{{ $i + 1 }}</td>
                            <td class="align-middle px-4">{{ $u->nama }}</td>
                            <td class="align-middle px-4">{{ $u->email }}</td>
                            <td class="align-middle px-4">{{ ucfirst($u->role) }}</td>
                            <td class="align-middle text-center px-4">
                            <div class="d-flex justify-content-center gap-2">
                                {{-- Tombol Edit --}}
                                @if(session()->has('user') && session('user')->role == 'superadmin')
                                    <button type="button" class="btn btn-sm btn-outline-warning rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $u->id }}" title="Edit"><i class="bi bi-pencil-fill"></i></button>
                                @else
                                    {{-- Tombol Edit non-aktif jika bukan superadmin --}}
                                    <button type="button" class="btn btn-sm btn-outline-warning rounded-pill" disabled style="opacity: 0.6; cursor: not-allowed;" title="Edit"><i class="bi bi-pencil-fill"></i></button>
                                @endif

                                {{-- Tombol Hapus --}}
                                @if(session()->has('user') && session('user')->role == 'superadmin')
                                    <button type="button" class="btn btn-sm btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $u->id }}" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                @else
                                    {{-- Tombol Hapus non-aktif jika bukan superadmin --}}
                                    <button type="button" class="btn btn-sm btn-outline-danger rounded-pill" disabled style="opacity: 0.6; cursor: not-allowed;" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                                @endif
                            </div>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4 no-filter">
                                <i class="bi bi-info-circle me-2"></i>Belum ada data admin.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH ADMIN --}}
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="/users/tambah" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                <div class="modal-header bg-primary text-white p-4 rounded-top-lg">
                    <h5 class="modal-title" id="tambahModalLabel"><i class="bi bi-person-plus-fill me-2"></i>Tambah Admin Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    @if ($errors->any() && session('modal_target') == 'tambahModal')
                        <div class="alert alert-danger pb-0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="nama_tambah" class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" id="nama_tambah" class="form-control rounded-pill @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email_tambah" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email_tambah" class="form-control rounded-pill @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_tambah" class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" id="password_tambah" class="form-control rounded-pill @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role_tambah" class="form-label fw-semibold">Role</label>
                        <select name="role" id="role_tambah" class="form-select rounded-pill @error('role') is-invalid @enderror" required>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-primary fw-semibold px-4"><i class="bi bi-save-fill me-2"></i>Simpan</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT ADMIN --}}
    @foreach($users as $u)
    @if(session()->has('user') && session('user')->role == 'superadmin')
    <div class="modal fade" id="editModal{{ $u->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $u->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="/users/edit/{{ $u->id }}" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                @method('PUT')
                <div class="modal-header bg-warning text-dark p-4 rounded-top-lg">
                    <h5 class="modal-title" id="editModalLabel{{ $u->id }}"><i class="bi bi-pencil-square me-2"></i>Edit Admin</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="nama_edit_{{ $u->id }}" class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" id="nama_edit_{{ $u->id }}" value="{{ $u->nama }}" class="form-control rounded-pill" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_edit_{{ $u->id }}" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email_edit_{{ $u->id }}" value="{{ $u->email }}" class="form-control rounded-pill" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_edit_{{ $u->id }}" class="form-label fw-semibold">Password Baru (opsional)</label>
                        <input type="password" name="password" id="password_edit_{{ $u->id }}" class="form-control rounded-pill">
                    </div>
                    <div class="mb-3">
                        <label for="role_edit_{{ $u->id }}" class="form-label fw-semibold">Role</label>
                        <select name="role" id="role_edit_{{ $u->id }}" class="form-select rounded-pill" required>
                            <option value="admin" {{ $u->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superadmin" {{ $u->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-warning fw-semibold px-4"><i class="bi bi-arrow-repeat me-2"></i>Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
    @endif
@endforeach

    {{-- MODAL HAPUS ADMIN --}}
    @foreach($users as $u)
    @if(session()->has('user') && session('user')->role == 'superadmin')
    <div class="modal fade" id="hapusModal{{ $u->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $u->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <form method="POST" action="/users/hapus/{{ $u->id }}" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                @method('DELETE')
                <div class="modal-header bg-danger text-white p-3 rounded-top-lg">
                    <h5 class="modal-title" id="hapusModalLabel{{ $u->id }}"><i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="mb-4">Apakah Anda yakin ingin menghapus admin <strong>"{{ $u->nama }}"</strong>?</p>
                    <small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-danger fw-semibold px-4"><i class="bi bi-trash-fill me-2"></i>Ya, Hapus</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
    @endif
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
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .input-group.rounded-pill > .input-group-text,
    .input-group.rounded-pill > .form-control {
        border-color: #dee2e6;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const searchForm = searchInput.closest('form');

        let typingTimer;
        const doneTypingInterval = 500;

        searchInput.addEventListener('keyup', () => {
            clearTimeout(typingTimer);
            if (searchInput.value.length > 0) {
                typingTimer = setTimeout(() => {
                    searchForm.submit();
                }, doneTypingInterval);
            } else {
                searchForm.submit();
            }
        });

        searchInput.addEventListener('keydown', () => {
            clearTimeout(typingTimer);
        });

        searchInput.addEventListener('change', () => {
            searchForm.submit();
        });

        // SKRIP UNTUK MENAMPILKAN MODAL SECARA OTOMATIS JIKA ADA ERROR VALIDASI
        /* @if ($errors->any()) */
            const modalTarget = "{{ session('modal_target') }}";
            if (modalTarget) {
                const myModal = new bootstrap.Modal(document.getElementById(modalTarget));
                myModal.show();
            }
        /* @endif */
    });
</script>
@endpush