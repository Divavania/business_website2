@extends('layouts.frontend') {{-- Sesuaikan dengan layout-mu --}}
@section('title', 'Kontak')

@section('content')
<section id="contact" class="contact section"> {{-- Tambahkan kelas 'section' agar konsisten --}}
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Kontak</h2>
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

            <div class="col-lg-6"> {{-- Hapus mt-5 mt-lg-0 karena card akan memberi padding --}}
                <div class="card shadow border rounded-lg p-4"> {{-- Mengubah shadow-sm border-0 menjadi shadow border --}}
                    {{-- Menampilkan pesan sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-lg shadow-sm mb-3" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- Menampilkan pesan error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show rounded-lg shadow-sm mb-3" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Mohon periksa kembali input Anda:
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="php-email-form"> {{-- Tambahkan method POST dan class php-email-form --}}
                        @csrf

                        <div class="row gy-4"> {{-- Gunakan gy-4 untuk gap vertikal --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Anda" value="{{ old('nama') }}" required> {{-- Menghapus rounded-pill --}}
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6"> {{-- Hapus mt-3 mt-md-0, gy-4 sudah menangani --}}
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Anda" value="{{ old('email') }}" required> {{-- Menghapus rounded-pill --}}
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp" id="nomor_hp" placeholder="Nomor Telepon (misal: 081234567890)" value="{{ old('nomor_hp') }}" required> {{-- Menghapus rounded-pill --}}
                            @error('nomor_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('subjek') is-invalid @enderror" name="subjek" id="subjek" placeholder="Subjek" value="{{ old('subjek') }}" required> {{-- Menghapus rounded-pill --}}
                            @error('subjek')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" rows="6" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea> {{-- Menghapus rounded-lg --}}
                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 text-center mt-3"> {{-- Tambahkan col-md-12 dan text-center --}}
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Pesan Anda berhasil terkirim. Terima kasih!</div>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">Kirim Pesan</button>
                        </div>
                    </form>
                </div> {{-- Tutup wrapper card --}}
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Custom styles for form controls */
    .form-control {
        border: 1px solid #ced4da; /* Default Bootstrap border color */
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        border-color: #86b7fe; /* Bootstrap primary color for focus */
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); /* Bootstrap primary shadow for focus */
    }

    /* Placeholder styling */
    .form-control::placeholder {
        color: #6c757d; /* Darker grey for better visibility */
        opacity: 0.7; /* Slightly less opaque than default for elegance */
    }
</style>
@endpush

@push('scripts')
{{-- Jika Anda menggunakan php-email-form/validate.js, pastikan itu dimuat di layouts/frontend.blade.php --}}
{{-- Tidak perlu script tambahan di sini karena php-email-form/validate.js sudah menangani --}}
@endpush