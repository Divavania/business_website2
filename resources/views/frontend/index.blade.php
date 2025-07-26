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
                    <a href="{{ url('/about') }}" class="read-more"><span>Selengkapnya Tentang Kami</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Bagian Our Product (Baru) --}}
    <section id="products" class="products section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Produk Unggulan Kami</h2>
            <p>Jelajahi Solusi Teknologi Terkini</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                @forelse($products as $product)
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 shadow-sm border-0 rounded-lg product-card">
                            {{-- Perhatikan path gambar: sesuaikan dengan tempat Anda menyimpan gambar produk --}}
                            <img src="{{ asset('storage/' . $product->gambar) }}" class="card-img-top rounded-top-lg" alt="{{ $product->nama }}" onerror="this.onerror=null;this.src='https://placehold.co/600x400/E0E0E0/333333?text=No+Image';">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold text-primary">{{ $product->nama }}</h5>
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit($product->deskripsi, 100) }}</p> {{-- Batasi deskripsi --}}
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2">
                                    <span class="fw-bold text-success">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                    {{-- Anda perlu membuat rute detail produk jika belum ada, contoh: /products/{id} --}}
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
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ url('/products') }}" class="btn btn-primary btn-lg rounded-pill px-4 py-2">Lihat Semua Produk</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact section py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center"> 
            <h2 class="fw-bold text-primary">Hubungi Kami</h2> 
            <p class="text-muted mb-0">Kirim pesan kepada kami langsung dari beranda</p> {{-- Tambah mb-0 --}}
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="bg-white p-3 p-md-4 rounded-4 shadow-sm">

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

                    <form action="{{ route('contact.store') }}" method="POST" class="row g-3">
                        @csrf
                        <input type="hidden" name="from" value="home">

                        <div class="col-md-6">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap Anda" value="{{ old('nama') }}" required>
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
                            <textarea name="pesan" rows="3" class="form-control @error('pesan') is-invalid @enderror" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                            @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                                <i class="bi bi-send me-1"></i> Kirim Pesan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


    {{-- Bagian Clients, Services, Portfolio yang sebelumnya ada di index.blade.php telah dihapus --}}
    {{-- Jika Anda ingin bagian ini tetap ada di halaman lain, pastikan rutenya masih ada --}}

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
</style>
@endpush


