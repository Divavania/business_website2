@extends('layouts.frontend')
@section('title', 'Tigatra Adikara')

@section('content')
<section id="contact" class="contact section py-5 bg-light">
    <div class="container" data-aos="fade-up">

        <div class="section-title text-center mb-5">
            <h2 class="fw-bold text-primary">Hubungi Kami</h2>
            <p class="text-muted">Silakan hubungi kami melalui formulir di bawah ini, kami akan segera merespons Anda.</p>
        </div>

        <div class="row g-5">

            <!-- Informasi Kontak -->
            <div class="col-lg-5">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                    <div class="mb-4 d-flex align-items-start">
                        <i class="bi bi-geo-alt fs-3 text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Lokasi</h5>
                            <p class="mb-0 text-muted">Jalan Contoh No.123, Jakarta</p>
                        </div>
                    </div>

                    <div class="mb-4 d-flex align-items-start">
                        <i class="bi bi-envelope fs-3 text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Email</h5>
                            <p class="mb-0 text-muted">info@contoh.com</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <i class="bi bi-phone fs-3 text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Telepon</h5>
                            <p class="mb-0 text-muted">+62 812 3456 7890</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulir Kontak -->
            <div class="col-lg-7">
                <div class="bg-white p-4 rounded-4 shadow-sm">

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

                        <div class="col-md-6">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Anda" value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ old('nomor_hp') }}" required>
                            @error('nomor_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
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
    </div>
</section>
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #ced4da;
        transition: 0.3s ease;
        padding: 0.75rem;
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
</style>
@endpush
