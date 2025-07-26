@extends('layouts.frontend')
@section('title', 'Kontak Kami | Tigatra Adikara')

@section('content')
<section id="contact" class="contact section pt-5 pb-3 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <!-- Kolom Map -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="h-100 overflow-hidden rounded-3 shadow-sm" style="height: 100%;">
                    @if($companyInfo->google_maps_embed_link)
                        <iframe
                            src="{{ $companyInfo->google_maps_embed_link }}"
                            style="border:0; width: 100%; height: 100%; border-radius: 8px;"
                            frameborder="0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @else
                        <div class="alert alert-info text-center py-4">
                            <i class="bi bi-map me-2"></i> Maps belum tersedia.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Kolom Form -->
            <div class="col-lg-7">
                <div class="card shadow-sm border-0 p-4 rounded-3">
                    <h3 class="fw-bold text-primary mb-3">Hubungi Kami Sekarang</h3>

                    {{-- Pesan Sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Pesan Validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i> Ada kesalahan:
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="row g-3 mt-2">
                        @csrf
                        <input type="hidden" name="from" value="contact">

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

                        <div class="col-12">
                            <input type="text" name="subjek" class="form-control @error('subjek') is-invalid @enderror" placeholder="Subjek" value="{{ old('subjek') }}" required>
                            @error('subjek') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <textarea name="pesan" rows="4" class="form-control @error('pesan') is-invalid @enderror" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                            @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">
                                <i class="bi bi-send me-1"></i> Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #a7aeb5;
        transition: 0.3s ease;
        font-size: 0.95rem;
        padding: 0.45rem 0.75rem;
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
        letter-spacing: 0.4px;
    }

    @media (max-width: 767.98px) {
        .card {
            padding: 1.5rem !important;
        }

        .form-control {
            font-size: 0.9rem;
        }

        .btn {
            width: 100%;
        }
    }
</style>
@endpush
