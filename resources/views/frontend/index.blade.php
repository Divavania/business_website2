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

            {{-- Slide 3 dihapus --}}

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
                {{-- Kolom untuk gambar di kiri --}}
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-img">
                        <img src="{{ asset('template-assets/assets/img/about.jpg') }}" class="img-fluid" alt="About Us Portrait">
                    </div>
                </div>

                {{-- Kolom untuk konten deskripsi --}}
                <div class="col-lg-7 content" data-aos="fade-up" data-aos-delay="200">
                    {{-- Hanya menampilkan deskripsi dari database --}}
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
            <p class="card-text text-muted flex-grow-1">{{ Str::limit($product->deskripsi, 80) }}</p>
            <div class="d-flex justify-content-between align-items-center mt-auto pt-2">
                <span class="fw-bold text-success fs-6">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
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


<section id="contact" class="contact section py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-4 d-flex flex-column justify-content-between">
                <div class="bg-white shadow-sm p-4 mb-2">
                    <h5 class="fw-bold">Butuh informasi lebih lanjut?</h5>
                    <p class="text-muted small mb-3">Kunjungi halaman FAQ kami untuk mempelajari lebih banyak tentang solusi terbaik dari Tigatra Adikara.</p>
                    <a href="{{ route('frontend.about.index') }}" class="text-primary small fw-semibold text-decoration-none">Pelajari selengkapnya &nbsp;></a>
                </div>
                <div class="bg-white shadow-sm p-4">
                    <h5 class="fw-bold">Ada pertanyaan?</h5>
                    <p class="text-muted small mb-3">Ajukan pertanyaan Anda dan tim layanan pelanggan kami akan dengan senang hati membantu Anda.</p>
                    <a href="{{ route('frontend.contact.index') }}" class="text-primary small fw-semibold text-decoration-none">Lihat Kontak &nbsp;></a>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="bg-white p-4 shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3">
                        <h3 class="fw-bold mb-2">Hubungi Kami</h3>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Mohon periksa kembali input Anda:
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="row g-2 mt-auto">
                        @csrf
                        <input type="hidden" name="from" value="home">

                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" value="{{ old('nomor_hp') }}" required>
                            @error('nomor_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Subjek</label>
                            <input type="text" name="subjek" class="form-control @error('subjek') is-invalid @enderror" value="{{ old('subjek') }}" required>
                            @error('subjek') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Pesan</label>
                            <textarea name="pesan" rows="3" class="form-control @error('pesan') is-invalid @enderror" required style="min-height: 80px; padding-top: 6px; padding-bottom: 6px;">{{ old('pesan') }}</textarea>
                            @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-3 py-1">
                                <i class="bi bi-envelope me-2"></i>Kirim Pesan
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
    #products.section,
    #contact.section {
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

    /* Judul dan teks */
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

    /* Responsive untuk mobile */
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
       Form Kontak
    -------------------------- */
    .form-control {
        border-radius: 0;
        padding: 0.4rem 0.7rem;
        font-size: 0.95rem;
    }
    .form-control:focus {
        border-color: #4797ec;
        box-shadow: 0 0 0 0.2rem rgba(71, 151, 236, 0.25);
    }
    textarea.form-control {
        resize: none;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
    }
    .btn-primary:hover {
        background-color: #014a79;
        box-shadow: 0 4px 12px rgba(1, 74, 121, 0.3);
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        #contact .row {
            flex-direction: column;
        }
        .col-lg-4, .col-lg-8 {
            max-width: 100%;
            flex: 0 0 100%;
        }
        .form-control {
            font-size: 0.9rem;
        }

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



