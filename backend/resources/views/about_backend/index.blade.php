@extends('layouts.app')

@section('title', 'Tentang Kami | Tigatra Adikara') {{-- Perbarui judul halaman --}}

@section('content')
<div class="container-fluid py-4"> {{-- Menggunakan py-4 untuk padding vertikal konsisten --}}
    {{-- Header Halaman: Judul dan Deskripsi --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0 text-primary fw-bold">Tentang Kami</h3>
            <p class="text-muted mb-0">Kelola informasi sejarah, visi, misi, dan ringkasan perusahaan Anda.</p> {{-- Perbarui deskripsi --}}
        </div>
        {{-- Tidak ada tombol tambah karena ini halaman konfigurasi tunggal --}}
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error')) {{-- Tambahkan penanganan error jika ada --}}
        <div class="alert alert-danger alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Formulir dalam Card --}}
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-4"> {{-- Memberikan padding di dalam card body --}}
            <form action="{{ route('about_backend.update') }}" method="POST">
                @csrf
                {{-- Field Deskripsi (Ringkasan untuk Home Page) --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Ringkasan Deskripsi (untuk Halaman Home)</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control rounded-lg" rows="3" required placeholder="Masukkan ringkasan singkat tentang perusahaan Anda untuk halaman home...">{{ $about->deskripsi ?? '' }}</textarea>
                    <div class="form-text text-muted">Maksimal 500 karakter. Ini akan ditampilkan di bagian "Tentang Kami" pada halaman depan.</div>
                </div>
                <div class="mb-3">
                    <label for="sejarah" class="form-label fw-semibold">Sejarah</label> {{-- Label lebih tebal --}}
                    <textarea name="sejarah" id="sejarah" class="form-control rounded-lg" rows="6" required placeholder="Masukkan sejarah perusahaan Anda...">{{ $about->sejarah ?? '' }}</textarea> {{-- rows lebih banyak, rounded-lg --}}
                </div>
                <div class="mb-3">
                    <label for="visi" class="form-label fw-semibold">Visi</label>
                    <textarea name="visi" id="visi" class="form-control rounded-lg" rows="4" required placeholder="Masukkan visi perusahaan Anda...">{{ $about->visi ?? '' }}</textarea> {{-- rows lebih banyak, rounded-lg --}}
                </div>
                <div class="mb-3">
                    <label for="misi" class="form-label fw-semibold">Misi</label>
                    <textarea name="misi" id="misi" class="form-control rounded-lg" rows="4" required placeholder="Masukkan misi perusahaan Anda...">{{ $about->misi ?? '' }}</textarea> {{-- rows lebih banyak, rounded-lg --}}
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4 py-2">
                        <i class="bi bi-save-fill me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
