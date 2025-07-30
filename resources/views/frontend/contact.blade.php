@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')

@php $hideWhatsappButton = true; @endphp

@section('content')

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

@endsection

@push('styles')
<style>
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
</style>
@endpush
