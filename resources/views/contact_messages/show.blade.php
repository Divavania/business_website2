@extends('layouts.app') 

@section('title', 'Detail Pesan | Tigatra Adikara')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Pesan dari {{ $contactMessage->first_name }} {{ $contactMessage->last_name }}</h5>
            <a href="{{ route('contact_messages.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Pesan
            </a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Informasi Pengirim --}}
            <div class="mb-4">
                <h6 class="border-bottom pb-2 mb-3">Informasi Pengirim</h6>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <strong>Nama Lengkap:</strong>
                        <p class="mb-0">{{ $contactMessage->first_name }} {{ $contactMessage->last_name }}</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>Email:</strong>
                        <p class="mb-0"><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>No. Telepon:</strong>
                        <p class="mb-0">{{ $contactMessage->phone_number ?: '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>Nama Perusahaan:</strong>
                        <p class="mb-0">{{ $contactMessage->company_name ?: '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>Alamat:</strong>
                        <p class="mb-0">{{ $contactMessage->address ?: '-' }}</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <strong>Kota:</strong>
                        <p class="mb-0">{{ $contactMessage->city ?: '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- Informasi Pesan --}}
            <div class="mb-4">
                <h6 class="border-bottom pb-2 mb-3">Isi Pesan</h6>
                <div class="card bg-light p-3 border-0">
                    <p class="mb-0">{{ $contactMessage->message }}</p>
                </div>
            </div>

            {{-- Waktu Dikirim dan Status --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="border-bottom pb-2 mb-3">Detail Tambahan</h6>
                    <p class="mb-1"><strong>Dikirim Pada:</strong> {{ \Carbon\Carbon::parse($contactMessage->created_at)->translatedFormat('d F Y, H:i:s') }}</p>
                    <p class="mb-0">
                        <strong>Status:</strong>
                        <span class="badge {{ $contactMessage->is_read ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ $contactMessage->is_read ? 'Sudah Dibaca' : 'Belum Dibaca' }}
                        </span>
                    </p>
                </div>
            </div>


            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                @if (!$contactMessage->is_read)
                    <form action="{{ route('contact_messages.markAsRead', $contactMessage->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i> Tandai Sudah Dibaca
                        </button>
                    </form>
                @else
                    <button type="button" class="btn btn-secondary" disabled>
                        <i class="bi bi-check-circle me-1"></i> Sudah Dibaca
                    </button>
                @endif

                <form action="{{ route('contact_messages.destroy', $contactMessage->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                        <i class="bi bi-trash me-1"></i> Hapus Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection