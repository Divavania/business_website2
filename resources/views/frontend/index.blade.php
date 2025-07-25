@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')
@section('description', 'Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.')
@section('keywords', 'Tigatra Adikara, IT Infrastructure, hardware, software, IT solutions, service center, teknologi, perangkat keras, perangkat lunak, sistem informasi')

@section('content')
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            {{-- Slide 1 --}}
            <div class="carousel-item active">
                <img src="{{ asset('template-assets/assets/img/contoh.jpeg') }}" class="img-fluid" alt="Solusi Infrastruktur IT Tigatra Adikara">
                <div class="carousel-container">
                    <h2>Membangun Pondasi Digital Anda</h2>
                    <p>Tigatra Adikara adalah mitra terpercaya Anda dalam menyediakan solusi **Infrastruktur IT** yang kokoh dan inovatif. Kami merancang, mengimplementasikan, dan mengelola sistem yang mendukung pertumbuhan bisnis Anda.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ url('/products') }}" class="btn-get-started">Lihat Solusi Infrastruktur</a>
                        <a href="{{ url('/service-center') }}" class="btn-get-started btn-get-started-alt ms-3">Dukungan Teknis</a>
                    </div>
                </div>
            </div>

            {{-- Slide 2 (Hanya 2 slide sesuai permintaan) --}}
            <div class="carousel-item">
                <img src="{{ asset('template-assets/assets/img/contoh2.jpeg') }}" class="img-fluid" alt="Pemasaran Hardware dan Software Terbaik">
                <div class="carousel-container">
                    <h2>Hardware & Software Terbaik untuk Efisiensi Anda</h2>
                    <p>Dapatkan **hardware dan software** terkini dari brand terkemuka. Kami menyediakan konsultasi, pengadaan, dan instalasi untuk memastikan Anda memiliki alat yang tepat untuk setiap kebutuhan operasional Anda.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ url('/products') }}" class="btn-get-started">Jelajahi Produk Hardware & Software</a>
                        <a href="{{ url('/contact') }}" class="btn-get-started btn-get-started-alt ms-3">Konsultasi Gratis</a>
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
                        <img src="{{ asset('template-assets/assets/img/about-portrait.jpg') }}" class="img-fluid" alt="About Us Portrait">
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
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
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

    {{-- Bagian Kontak (Send Message) (Baru) --}}
    <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Hubungi Kami</h2>
            <p>Kirim Pesan kepada Kami</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{-- KOREKSI: Mengubah shadow-sm border-0 menjadi shadow border --}}
                    <div class="card shadow border rounded-lg p-4">
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
                        {{-- KOREKSI: Form Kontak disesuaikan dengan halaman kontak --}}
                        <form action="{{ route('contact.store') }}" method="POST" class="php-email-form">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- KOREKSI: Menghapus rounded-pill --}}
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap Anda" required value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- KOREKSI: Menghapus rounded-pill --}}
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Anda" required value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{-- KOREKSI: Menghapus rounded-pill --}}
                                        <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp" id="nomor_hp" placeholder="Nomor Telepon (misal: 081234567890)" required value="{{ old('nomor_hp') }}">
                                        @error('nomor_hp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- KOREKSI: Menambahkan field Subjek --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{-- KOREKSI: Menghapus rounded-pill --}}
                                        <input type="text" class="form-control @error('subjek') is-invalid @enderror" name="subjek" id="subjek" placeholder="Subjek" required value="{{ old('subjek') }}">
                                        @error('subjek')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{-- KOREKSI: Menghapus rounded-lg --}}
                                        <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" rows="6" placeholder="Pesan Anda" required id="pesan">{{ old('pesan') }}</textarea>
                                        @error('pesan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan Anda berhasil terkirim. Terima kasih!</div>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">Kirim Pesan</button>
                                </div>
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

    /* Custom styles to reduce section padding for a more compact look */
    #about.section,
    #products.section,
    #contact.section {
        padding: 20px 0; /* Further reduced padding for these sections */
    }

    /* Remove media query for padding to keep it consistently short */
    /* @media (min-width: 992px) {
        #about.section,
        #products.section,
        #contact.section {
            padding: 60px 0;
        }
    } */
</style>
@endpush

@push('scripts')
{{-- Jika Anda menggunakan php-email-form/validate.js, pastikan itu dimuat di layouts/frontend.blade.php --}}
{{-- Tidak perlu script tambahan di sini karena php-email-form/validate.js sudah menangani --}}
@endpush
