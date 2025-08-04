@extends('layouts.app') {{-- Pastikan ini menggunakan layout backend yang benar --}}

@section('title', 'Manajemen Anggota Organisasi')

@section('content')
<style>
    /* Mengatur tinggi maksimal dan scrolling vertikal untuk tabel */
    .table-scroll-container {
        max-height: 600px; /* Atur tinggi maksimal sesuai kebutuhan Anda (sekitar 5-6 baris) */
        overflow-y: auto;
    }
    
    /* Memastikan thead tetap terlihat saat scrolling */
    .table-scroll-container thead th {
        position: sticky;
        top: 0;
        background-color: #f8f9fa; /* Warna background thead */
        z-index: 10;
        border-bottom: 2px solid #dee2e6;
    }
</style>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="mb-0 text-dark fw-bold">Manajemen Struktur Perusahaan</h3>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#createMemberModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Anggota
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card-body p-0">
        {{-- Kontainer baru untuk scrolling --}}
        <div class="table-scroll-container">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Deskripsi</th>
                            <th>Urutan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" style="width: 50px; height: 50px; object-fit: cover;"></td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->position }}</td>
                            <td>{{ Str::limit($member->description, 50) }}</td>
                            <td>{{ $member->order }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMemberModal-{{ $member->id }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                {{-- Tombol hapus yang menggunakan modal konfirmasi --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteMemberModal" data-member-id="{{ $member->id }}">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Anggota --}}
<div class="modal fade" id="createMemberModal" tabindex="-1" aria-labelledby="createMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMemberModalLabel">Tambah Anggota Organisasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.organization-members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="photo" name="photo" required>
                    </div>
                    <div class="mb-3">
                        <label for="order" class="form-label">Urutan</label>
                        <input type="number" class="form-control" id="order" name="order" value="{{ $members->count() + 1 }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit Anggota (dalam perulangan) --}}
@foreach($members as $member)
<div class="modal fade" id="editMemberModal-{{ $member->id }}" tabindex="-1" aria-labelledby="editMemberModalLabel-{{ $member->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMemberModalLabel-{{ $member->id }}">Edit Anggota Organisasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.organization-members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Menggunakan metode PUT untuk update --}}
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name-{{ $member->id }}" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name-{{ $member->id }}" name="name" value="{{ $member->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="position-{{ $member->id }}" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="position-{{ $member->id }}" name="position" value="{{ $member->position }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description-{{ $member->id }}" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description-{{ $member->id }}" name="description" rows="3">{{ $member->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo-{{ $member->id }}" class="form-label">Ganti Foto (Opsional)</label>
                        <input class="form-control" type="file" id="photo-{{ $member->id }}" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="order-{{ $member->id }}" class="form-label">Urutan</label>
                        <input type="number" class="form-control" id="order-{{ $member->id }}" name="order" value="{{ $member->order }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Konfirmasi Hapus --}}
<div class="modal fade" id="deleteMemberModal" tabindex="-1" aria-labelledby="deleteMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMemberModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus anggota ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Skrip untuk mengelola modal hapus --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteMemberModal = document.getElementById('deleteMemberModal');
        deleteMemberModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button yang memicu modal
            var memberId = button.getAttribute('data-member-id');
            var form = document.getElementById('deleteForm');
            form.action = '{{ url("admin/organization-members") }}/' + memberId;
        });
    });
</script>
@endpush

@endsection
