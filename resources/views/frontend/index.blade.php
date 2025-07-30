@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')
@section('description', 'Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.')
@section('keywords', 'Tigatra Adikara, IT Infrastructure, hardware, software, IT solutions, service center, teknologi, perangkat keras, perangkat lunak, sistem informasi')

@section('content')
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            {{-- Slide 1 --}}
            <div class="carousel-item active">
                <img src="{{ asset('template-assets/assets/img/contoh.jpg') }}" class="img-fluid" alt="Solusi Infrastruktur IT Tigatra Adikara">
                <div class="carousel-container">
                    <h2>Membangun Pondasi Digital Anda</h2>
                    <p>Tigatra Adikara adalah mitra terpercaya Anda dalam menyediakan solusi **Infrastruktur IT** yang kokoh dan inovatif, mulai dari perencanaan hingga implementasi dan pengelolaan sistem yang mendukung pertumbuhan bisnis Anda.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('frontend.about.index') }}" class="btn-get-started">Tentang Kami</a> {{-- Diubah ke Tentang Kami --}}
                        <a href="{{ route('frontend.products.index') }}" class="btn-get-started btn-get-started-alt ms-3">Lihat Produk</a> {{-- Diubah ke Produk --}}
                    </div>
                </div>
            </div>

            {{-- Slide 2 (Hanya 2 slide sesuai permintaan) --}}
            <div class="carousel-item">
                <img src="{{ asset('template-assets/assets/img/contoh2.jpeg') }}" class="img-fluid" alt="Pemasaran Hardware dan Software Terbaik">
                <div class="carousel-container">
                    <h2>Dukungan Komprehensif untuk Kebutuhan IT Anda</h2>
                    <p>Kami tidak hanya menyediakan **hardware dan software** terkini, tetapi juga menawarkan **Service Center** profesional dan konsultasi ahli untuk memastikan semua kebutuhan operasional IT Anda terpenuhi dengan optimal.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('frontend.services.index') }}" class="btn-get-started">Service Center</a> {{-- Diubah ke Service Center --}}
                        <a href="{{ route('frontend.contact.index') }}" class="btn-get-started btn-get-started-alt ms-3">Hubungi Kami</a> {{-- Diubah ke Kontak --}}
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
            <ol class="carousel-indicators"></ol>

        </div>

    </section>

    {{-- Bagian Tentang Kami --}}
    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Tentang Kami</h2>
            <p>Siapa Kami dan Apa yang Kami Lakukan</p>
        </div>
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-img">
                        <img src="{{ asset('template-assets/assets/img/about.jpg') }}" class="img-fluid" alt="About Us Portrait">
                    </div>
                </div>

                <div class="col-lg-7 content" data-aos="fade-up" data-aos-delay="200">
                    <p class="fst-italic">
                        {!! nl2br(e($about->deskripsi ?? 'Ringkasan tentang perusahaan belum tersedia. Silakan perbarui dari dashboard.')) !!}
                    </p>
                    <a href="{{ route('frontend.about.index') }}" class="read-more"><span>Selengkapnya Tentang Kami</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Bagian Our Product --}}
<section id="products" class="products section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Produk Unggulan Kami</h2>
        <p>Jelajahi Solusi Teknologi Terkini</p>
    </div>
    <div class="container">

        {{-- Filter Buttons --}}
        <div class="text-center mb-4" data-aos="fade-up" data-aos-delay="50">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <button class="btn btn-outline-primary active filter-btn" data-filter="all">All</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="hardware">Hardware</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="software">Software</button>
            </div>
        </div>

        {{-- Produk List --}}
        <div class="row gy-4" id="product-list">
            @forelse($products as $product)
                @php
                    $kategoriClass = strtolower($product->kategori);
                @endphp
                <div class="col-6 col-md-4 col-lg-3 filter-item {{ $kategoriClass }}" data-aos="fade-up" data-aos-delay="100">
    <div class="card h-100 shadow-sm border-0 rounded-lg product-card">
        <div class="product-image-wrapper text-center" style="height: 180px;">
            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" class="img-fluid">
        </div>
        <div class="card-body d-flex flex-column">
            <span class="badge bg-info text-dark mb-2 align-self-start">{{ ucfirst($product->kategori) }}</span>
            <h5 class="card-title fw-bold text-primary">{{ $product->nama }}</h5>
            <p class="card-text text-muted flex-grow-1 d-none d-md-block">{{ Str::limit($product->deskripsi, 80) }}</p>
            <div class="d-flex justify-content-between align-items-center mt-auto pt-2">
                <a href="{{ url('/products/' . $product->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">Detail <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada produk yang tersedia.</p>
                </div>
            @endforelse
        </div>

        {{-- Tombol Lihat Semua --}}
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ url('/products') }}" class="btn btn-outline-dark see-all-btn d-inline-flex align-items-center gap-2">
                    <span>Lihat Semua Produk</span>
                    <i class="bi bi-arrow-right-circle-fill fs-5"></i>
                </a>
            </div>
        </div>
    </div>
</section>

    <section id="contact-promo" class="contact-promo section pt-5 pb-5">
        <div class="container" data-aos="fade-up">
            <div class="card contact-promo-card shadow-sm border-0">
                <div class="card-body text-center p-4 p-md-5">
                    <i class="bi bi-chat-dots contact-promo-icon mb-3"></i>
                    <h3 class="contact-promo-title fw-bold mb-3">Punya pertanyaan atau butuh bantuan?</h3>
                    <p class="contact-promo-description mb-4">
                        Kami siap membantu Anda! Klik tombol di bawah untuk menghubungi kami langsung.
                    </p>
                    <a href="{{ route('frontend.contact.index') }}" class="btn contact-promo-btn btn-lg rounded-pill">
                        <i class="bi bi-headset me-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>@endsection

@push('styles')
<style>
    /* -------------------------
        Form Control Styling
    -------------------------- */
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

    /* -------------------------
        Section Padding Compact
    -------------------------- */
    #about.section,
    #products.section { 
        padding: 20px 0;
    }

    /* -------------------------
        Product Card Styling
    -------------------------- */
    .product-card {
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        width: 100%;
        height: 200px;
        object-fit: contain;
        background-color: #f9f9f9;
        padding: 1rem;
    }

    .product-card .card-body {
        padding: 1rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-card .card-title {
        font-size: 1rem;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .product-card .card-text {
        font-size: 0.9rem;
        color: #6c757d;
        flex-grow: 1;
    }

    .product-card .text-success {
        font-size: 0.9rem;
        font-weight: 500;
    }

    .product-card .btn-sm {
        font-size: 0.75rem;
        padding: 6px 14px;
        border-radius: 999px;
        margin-top: 0.5rem;
    }

    @media (max-width: 576px) {
        .product-card img {
            height: 160px;
            padding: 0.75rem;
        }
    }

    .btn-group .filter-btn {
        border-radius: 999px;
        font-weight: 500;
        padding: 0.4rem 1.2rem;
        transition: all 0.3s ease-in-out;
        color: #014a79;
        border: 1.5px solid #014a79;
        background-color: transparent;
    }

    .btn-group .filter-btn:hover {
        background-color: #4797ec;
        color: #fff;
        border-color: #4797ec;
    }

    .btn-group .filter-btn.active {
        background-color: #014a79;
        color: #fff;
        border-color: #014a79;
        box-shadow: 0 4px 12px rgba(1, 74, 121, 0.2);
        transform: translateY(-1px);
    }

    .see-all-btn {
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease-in-out;
        border: 2px solid #014a79;
        color: #014a79;
        background-color: transparent;
    }

    .see-all-btn:hover {
        background-color: #014a79;
        color: #fff;
        box-shadow: 0 4px 12px rgba(1, 74, 121, 0.2);
        transform: translateY(-2px);
    }

    .see-all-btn i {
        transition: transform 0.3s ease;
    }

    .see-all-btn:hover i {
        transform: translateX(3px);
    }

      /* -------------------------
        About Section Image Styling
    -------------------------- */
    .about-img img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    @media (max-width: 991px) {
        .about-img {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .about-img img {
            height: 250px;
        }
    }


      /* -------------------------
        Tombol Filter Produk (Homepage)
-------------------------- */
    .btn-group .filter-btn {
        border-radius: 999px;
        font-weight: 500;
        padding: 0.4rem 1.2rem;
        transition: all 0.3s ease-in-out;
        color: #014a79;
        border: 1.5px solid #014a79;
        background-color: transparent;
    }

    .btn-group .filter-btn:hover {
        background-color: #4797ec;
        color: #fff;
        border-color: #4797ec;
    }

    .btn-group .filter-btn.active {
        background-color: #014a79;
        color: #fff;
        border-color: #014a79;
        box-shadow: 0 4px 12px rgba(1, 74, 121, 0.2);
        transform: translateY(-1px);
    }

    .contact-promo.section {
        background-color: #f8f9fa; 
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .contact-promo-card {
        background-color: #ffffff; 
        border: 1px solid #e9ecef; 
        border-radius: 15px; 
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); 
        max-width: 700px; 
        margin-left: auto;
        margin-right: auto;
    }

    .contact-promo-icon {
        font-size: 2.5rem; 
        color: #014a79; 
        margin-bottom: 1rem;
        display: block; 
    }

    .contact-promo-title {
        font-size: 1.8rem; 
        color: #014a79; 
        font-weight: 700;
    }

    .contact-promo-description {
        font-size: 1.0rem; 
        color: #333333;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        max-width: 500px; 
        margin-left: auto;
        margin-right: auto;
    }

    .contact-promo-btn {
        background-color: #014a79; 
        color: #ffffff; 
        border: none;
        padding: 12px 30px; 
        font-size: 1.1rem; 
        font-weight: 500;
        border-radius: 50px; 
        box-shadow: 0 4px 10px rgba(1, 74, 121, 0.25); 
        transition: all 0.3s ease;
    }

    .contact-promo-btn:hover {
        background-color: #003a60; 
        transform: translateY(-2px); 
        box-shadow: 0 6px 15px rgba(1, 74, 121, 0.35); 
        color: #ffffff;
    }

    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .contact-promo-card {
            padding: 2rem !important; 
        }
        .contact-promo-title {
            font-size: 1.5rem; 
        }
        .contact-promo-description {
            font-size: 0.95rem; 
        }
        .contact-promo-btn {
            width: 100%; 
            max-width: 300px; 
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterButtons = document.querySelectorAll(".filter-btn");
        const productItems = document.querySelectorAll(".filter-item");

        filterButtons.forEach(btn => {
            btn.addEventListener("click", function () {
                filterButtons.forEach(b => b.classList.remove("active"));
                this.classList.add("active");

                const filter = this.getAttribute("data-filter");

                productItems.forEach(item => {
                    if (filter === "all" || item.classList.contains(filter)) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });
    });
</script>
@endpush