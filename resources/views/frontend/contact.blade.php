@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')

@php $hideWhatsappButton = true; @endphp

@section('content')

{{-- Alert (Notifikasi) --}}
@if(session('success'))
    <div class="alert alert-success fixed-alert alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger fixed-alert alert-dismissible fade show" role="alert">
        <strong>Terjadi Kesalahan!</strong> Mohon periksa kembali input Anda.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<section id="contact" class="contact section pt-5 pb-3 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card shadow-sm border-0 h-100 rounded-3 overflow-hidden">
                    <div class="card-body p-0 d-flex flex-column">
                        <h4 class="card-title fw-bold text-primary p-3 mb-0">Lokasi Kami di Peta</h4>
                        @if($companyInfo->google_maps_embed_link)
                            <div class="embed-responsive embed-responsive-16by9 flex-grow-1">
                                <iframe
                                    src="{{ $companyInfo->google_maps_embed_link }}"
                                    class="embed-responsive-item w-100 h-100"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        @else
                            <div class="alert alert-info text-center py-4 my-auto">
                                <i class="bi bi-map me-2"></i> Maps belum tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Kolom untuk Informasi Kontak dan Tombol --}}
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 p-4 rounded-3 text-center h-100 d-flex flex-column justify-content-center">
                    <h3 class="fw-bold text-primary mb-3">Hubungi Kami</h3>
                    <p class="contact-description mb-3" style="line-height: 1.6;">
                        Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, Anda bisa menghubungi kami melalui email atau langsung chat dengan kami via WhatsApp. Pilih metode yang paling nyaman bagi Anda!
                    </p>

                    <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mt-3">
                        @if($companyInfo->whatsapp_number)
                            <a href="https://wa.me/{{ $companyInfo->whatsapp_number }}?text=Halo%20Tigatra%20Adikara%2C%20saya%20ingin%20bertanya"
                               target="_blank"
                               class="btn btn-whatsapp btn-lg rounded-pill flex-grow-1 flex-md-grow-0"
                               rel="nofollow noreferrer">
                                <i class="bi bi-whatsapp me-2"></i> Chat via WhatsApp
                            </a>
                        @endif

                        @if($companyInfo->contact_email)
                            <a href="mailto:{{ $companyInfo->contact_email }}"
                               class="btn btn-email btn-lg rounded-pill flex-grow-1 flex-md-grow-0"
                               rel="nofollow noreferrer">
                                <i class="bi bi-envelope me-2"></i> Kirim via Email
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact-form-section" class="contact section pt-3 pb-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 p-4 rounded-3">
                    <h3 class="fw-bold text-primary mb-4 text-center">Atau Kirim Pesan Melalui Form Ini</h3>
                    <p class="text-center mb-4">
                        Isi form di bawah ini dan tim kami akan segera menghubungi Anda.
                    </p>

                    <form action="{{ route('contact.submit') }}" method="post" class="php-email-form">
                        @csrf {{-- Token CSRF untuk keamanan --}}

                        <div class="row gy-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">Nama Depan <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Masukkan nama depan Anda" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" class="form-label">Nama Belakang <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Masukkan nama belakang Anda" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row gy-3 mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="contoh@domain.com" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Nomor Handphone</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="+62 812 3456 7890" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="company_name" class="form-label">Nama Perusahaan (Opsional)</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Nama perusahaan Anda" value="{{ old('company_name') }}">
                            @error('company_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row gy-3 mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address" class="form-label">Alamat Lengkap (Opsional)</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Jalan, Nomor, RT/RW" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city" class="form-label">Kota (Opsional)</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Kota Anda" value="{{ old('city') }}">
                                    @error('city')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="message" class="form-label">Isi Pesan <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="message" rows="4" placeholder="Tulis pesan Anda di sini..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Kirim Pesan</button>
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
    /* Alert notifikasi di kanan atas */
    .fixed-alert {
        position: fixed;
        top: 50px;
        right: 20px;
        z-index: 9999;
        width: auto;
        max-width: 350px;
        margin: 0;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .fixed-alert.show {
        opacity: 1;
    }

    .contact-info .d-flex {
        align-items: center; 
    }
    .contact-info i {
        min-width: 40px; 
        text-align: center;
    }
    .card {
        padding: 2.5rem !important; 
    }
    @media (max-width: 767.98px) {
        .card {
            padding: 1.5rem !important;
        }
        .btn-lg {
            width: 100%;
        }
    }

    #contact .card {
        height: 100%; 
    }

    .embed-responsive {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .embed-responsive-16by9 {
        padding-top: 56.25%; 
    }
    .embed-responsive-item {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }


    .contact-description {
        color: #333333; 
        font-size: 15px; 
    }

    .btn-whatsapp {
        background: linear-gradient(to bottom, #25D366, #128C7E); 
        border: none; 
        color: #fff;
        font-size: 16px; 
        padding: 12px 24px; 
        transition: all 0.3s ease; 
    }
    .btn-whatsapp:hover {
        background: linear-gradient(to bottom, #1DA851, #075E54); 
        color: #fff;
        transform: translateY(-2px); 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
    }

    
    .btn-email {
        background: linear-gradient(to bottom, #3b82f6, #1e3a8a); 
        border: none;
        color: #fff;
        font-size: 16px; 
        padding: 12px 24px; 
        transition: all 0.3s ease; 
    }
    .btn-email:hover {
        background: linear-gradient(to bottom, #2563eb, #152963); 
        color: #fff;
        transform: translateY(-2px); 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
    }

    @media (max-width: 767.98px) {
        #contact .flex-md-grow-0 {
            flex-grow: 1 !important; 
        }
        #contact .d-flex.flex-column.flex-md-row {
            align-items: center; 
        }
    }

    /* CSS tambahan untuk form kontak */
    .form-group label {
        font-weight: 600;
        margin-bottom: .5rem;
    }
    .form-control {
        border-radius: .5rem;
        padding: .75rem 1rem;
    }
    .php-email-form .error-message {
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 0.25rem;
    }
</style>
@endpush

@push('scripts')
<script>
    // Menambahkan class "show" pada alert agar muncul
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.querySelector('.fixed-alert');
        if (alert) {
            alert.classList.add('show');
            setTimeout(function() {
                alert.classList.remove('show');
            }, 3000); // Menghilang setelah 3 detik
        }
    });
</script>
@endpush