@extends('layouts.frontend')
@section('title', 'Tigatra Adikara')

@section('content')
<section id="contact" class="contact section">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2></h2>
            <p>Silakan hubungi kami melalui formulir di bawah ini.</p>
        </div>

        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Lokasi:</h4>
                        <p>Jalan Contoh No.123, Jakarta</p>
                    </div>
                    <div class="email mt-4">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>info@contoh.com</p>
                    </div>
                    <div class="phone mt-4">
                        <i class="bi bi-phone"></i>
                        <h4>Telepon:</h4>
                        <p>+62 812 3456 7890</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow border rounded-lg p-4">
                    {{-- Pesan sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Pesan error --}}
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

                    {{-- FORM KONTAK --}}
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Anda" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ old('nomor_hp') }}" required>
                            @error('nomor_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" name="subjek" class="form-control @error('subjek') is-invalid @enderror" placeholder="Subjek" value="{{ old('subjek') }}" required>
                            @error('subjek')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <textarea name="pesan" rows="6" class="form-control @error('pesan') is-invalid @enderror" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                                Kirim Pesan
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
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .form-control::placeholder {
        color: #6c757d;
        opacity: 0.7;
    }
</style>
@endpush
