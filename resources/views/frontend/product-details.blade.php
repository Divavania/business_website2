@extends('layouts.frontend') {{-- Menggunakan layout frontend Anda --}}

@section('title', 'Tigatra Adikara') {{-- Mengubah judul halaman --}}
@section('description', Str::limit($product->deskripsi, 150)) {{-- Deskripsi dari produk --}}
@section('keywords', 'Tigatra Adikara, produk, ' . $product->nama . ', ' . $product->kategori) {{-- Keywords dari produk --}}

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Detail Produk</h1> {{-- Mengubah judul halaman --}}
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('frontend.products.index') }}">Produk</a></li>
            <li class="current">Detail Produk</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Product Details Section -->
    <section id="product-details" class="portfolio-details section"> {{-- Mengubah ID section --}}

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="product-details-image"> {{-- Mengubah class --}}
                @if($product->gambar)
                    <img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid rounded shadow-sm" alt="{{ $product->nama }}" onerror="this.onerror=null;this.src='https://placehold.co/800x600/E0E0E0/333333?text=No+Image';">
                @else
                    <img src="https://placehold.co/800x600/E0E0E0/333333?text=No+Image" class="img-fluid rounded shadow-sm" alt="No Image Available">
                @endif
            </div>
            {{-- Jika Anda ingin slider gambar, Anda bisa mengaktifkan kembali dan menyesuaikan bagian ini --}}
            {{-- <div class="portfolio-details-slider swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}">
                </div>
                {{-- Tambahkan slide lain jika ada banyak gambar produk --}}
              {{-- </div>
              <div class="swiper-pagination"></div>
            </div> --}}
          </div>

          <div class="col-lg-4">
            <div class="product-info" data-aos="fade-up" data-aos-delay="200"> {{-- Mengubah class --}}
              <h3>Informasi Produk</h3>
              <ul>
                <li><strong>Nama Produk</strong>: {{ $product->nama }}</li>
                <li><strong>Kategori</strong>: {{ ucfirst($product->kategori) }}</li>
                <li><strong>Harga</strong>: Rp {{ number_format($product->harga, 0, ',', '.') }}</li>
                {{-- Anda bisa menambahkan link untuk order atau kontak di sini --}}
                {{-- KOREKSI: Mengubah rute dari 'contact.index' menjadi 'frontend.contact.index' --}}
                <li><a href="{{ route('frontend.contact.index') }}" class="btn btn-primary btn-sm mt-3 rounded-pill px-4 py-2">Hubungi Kami untuk Pembelian</a></li>
              </ul>
            </div>
            <div class="product-description" data-aos="fade-up" data-aos-delay="300"> {{-- Mengubah class --}}
              <h2>Deskripsi Produk</h2>
              <p>
                {!! nl2br(e($product->deskripsi)) !!}
              </p>
              @if($product->spesifikasi)
                <h2 class="mt-4">Spesifikasi Teknis</h2>
                <p>
                  {!! nl2br(e($product->spesifikasi)) !!}
                </p>
              @endif
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Product Details Section -->

</main>
@endsection

@push('styles')
<style>
    /* Custom styles for product details page if needed */
    .product-details-image img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto; /* Center the image */
    }
    .product-info h3, .product-description h2 {
        color: #007bff; /* Warna biru primer Bootstrap */
        font-weight: bold;
        margin-bottom: 15px;
    }
    .product-info ul {
        list-style: none;
        padding: 0;
    }
    .product-info ul li {
        margin-bottom: 10px;
        font-size: 1.05rem;
        color: #333;
    }
    .product-info ul li strong {
        color: #555;
    }
    .product-description p {
        line-height: 1.6;
        color: #444;
    }
</style>
@endpush

@push('scripts')
{{-- Jika Anda memutuskan untuk menggunakan swiper, Anda perlu menambahkan kembali inisialisasi swiper di sini --}}
{{-- Contoh:
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.portfolio-details-slider', {
            speed: 600,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            }
        });
    });
</script>
--}}
@endpush