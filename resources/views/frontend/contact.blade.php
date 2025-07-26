@extends('layouts.frontend')
@section('title', 'Kontak Kami | Tigatra Adikara')

@section('content')
{{-- KOREKSI: Mengurangi padding bawah pada section --}}
<section id="contact" class="contact section pt-5 pb-3 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="container flex-grow-1 d-flex"> 
                <!-- Informasi Kontak (Hanya Maps) -->
                {{-- KOREKSI: Menambahkan ps-0 agar peta menempel ke kiri --}}
                {{-- KOREKSI: Menambahkan overflow-hidden dan height-100 untuk mengisi penuh kolom --}}
                <div class="col-lg-5 ps-0 overflow-hidden" style="height: 500px;"> {{-- Tinggi kolom disesuaikan --}}
                    {{-- Kelas bg-white, padding, border-radius, dan shadow dipindahkan ke div induk --}}
                    <div class="h-100">
                        <!-- Google Maps Embed -->
                        {{-- KOREKSI: Menambahkan px-0 untuk menghilangkan padding horizontal --}}
                        {{-- KOREKSI: Menghapus judul peta --}}
                        <div class="mt-0 px-0 h-100"> {{-- Menambahkan h-100 untuk div pembungkus iframe --}}
                            @if($companyInfo->google_maps_embed_link)
                                <iframe
                                    style="border:0; width: 100%; height: 100%; border-radius: 8px;" 
                                    src="{{ $companyInfo->google_maps_embed_link }}"
                                    frameborder="0"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            @else
                                <div class="alert alert-info text-center py-4"> {{-- mx-4 dihapus --}}
                                    <i class="bi bi-map me-2"></i> Maps sedang dalam pemeliharaan atau belum diatur.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Formulir Kontak -->
                {{-- KOREKSI: Menambahkan p-4 agar formulir memiliki padding internal
                             KOREKSI: Menambahkan h-100 untuk mengisi tinggi kolom --}}
                <div class="col-lg-7 p-4 h-100 d-flex flex-column"> {{-- Menjadikan flex-column untuk mengatur konten vertikal --}}
                    <div>
                        {{-- KOREKSI: Menambahkan judul "Contact us now" di atas formulir --}}
                        <h3 class="fw-bold text-primary mb-3">Hubungi Kami Sekarang</h3>

                        {{-- Pesan Sukses --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                Mohon periksa kembali input Anda:
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="row g-3 mt-3">
                            @csrf
                            <input type="hidden" name="from" value="contact">

                            {{-- KOREKSI: Layout field form sesuai contoh --}}
                            <div class="col-md-4">
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                                @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-4">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Anda" value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-4">
                                <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ old('nomor_hp') }}" required>
                                @error('nomor_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="text" name="subjek" class="form-control @error('subjek') is-invalid @enderror" placeholder="Subjek" value="{{ old('subjek') }}" required>
                                @error('subjek') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12">
                                <textarea name="pesan" rows="5" class="form-control @error('pesan') is-invalid @enderror" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                                @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">
                                    <i class="bi bi-send me-1"></i> Kirim Pesan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
        </div>
</section>
@endsection

@push('styles')
<style>

    .form-control {
        border: 1px solid #a7aeb5ff;
        transition: 0.3s ease;
        padding: 0.5rem;
        font-size: 0.95rem;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
    }

    .invalid-feedback {
        font-size: 0.85rem;
    }

    textarea.form-control {
        resize: vertical;
    }

    .btn-primary {
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* Kustomisasi untuk section-title */
    .section-title h2 {
        font-size: 1rem; /* Ukuran font lebih kecil */
        margin-bottom: 0.5rem; /* Mengurangi margin bawah */
    }

    .section-title p {
        font-size: 0.95rem; /* Ukuran font lebih kecil */
        margin-bottom: 0; /* Menghilangkan margin bawah */
    }

    /* Kustomisasi untuk ikon info kontak */
    .list-unstyled .bi {
        font-size: 1.2rem; /* Ukuran ikon sedikit lebih kecil */
    }
</style>
@endpush