@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')
@section('description', 'Jelajahi berbagai produk hardware dan software terbaik dari Tigatra Adikara.')
@section('keywords', 'produk, hardware, software, IT, komputer, laptop, server, jaringan, lisensi, Tigatra Adikara')

@section('content')

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Produk Kami</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="current">Produk</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<section id="products-list" class="products-list section">
    <div class="container" data-aos="fade-up">

        {{-- Filter dan Search --}}
        <div class="row mb-4 justify-content-end">
            <div class="col-lg-8 col-md-10">
                <form action="{{ url('/products') }}" method="GET" class="d-flex flex-wrap gap-3 justify-content-end">
                    <div class="flex-grow-1" style="max-width: 250px;">
                        <select name="kategori" class="form-select rounded-pill shadow-sm" onchange="this.form.submit()">
                            <option value="all" {{ request('kategori') == 'all' ? 'selected' : '' }}>Semua Kategori</option>
                            <option value="hardware" {{ request('kategori') == 'hardware' ? 'selected' : '' }}>Hardware</option>
                            <option value="software" {{ request('kategori') == 'software' ? 'selected' : '' }}>Software</option>
                        </select>
                    </div>
                    <div class="input-group flex-grow-1" style="max-width: 350px;">
                        <input type="text" class="form-control rounded-pill border-0 shadow-sm" placeholder="Cari produk..." name="search" value="{{ request('search') }}">
                        <button class="btn btn-outline-primary rounded-pill ms-2" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Produk List --}}
        <div class="row gy-4">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 shadow-sm border-0 rounded-lg product-card">
                        {{-- Gambar Produk --}}
                        {{-- KOREKSI: Mengubah struktur pembungkus gambar dan gaya --}}
                        <div class="product-image-wrapper text-center" style="height: 180px; background-color: #f0f2f5;">
                            <img src="{{ asset('storage/' . $product->gambar) }}"
                                 alt="{{ $product->nama }}"
                                 class="img-fluid">
                        </div>
                        {{-- Detail Produk --}}
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
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5"><i class="bi bi-box-seam me-2"></i>Maaf, tidak ada produk yang ditemukan.</p>
                    <a href="{{ url('/products') }}" class="btn btn-outline-secondary rounded-pill mt-3">Reset Filter</a>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $products->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>

{{-- Styling --}}
@push('styles')
<style>
    .product-card {
        border-radius: 16px;
        transition: all 0.3s ease-in-out;
        padding: 8px; /* Padding di sekitar card, termasuk gambar */
        background-color: #f9f9f9;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
    }

    /* KOREKSI: Gaya untuk pembungkus gambar */
    .product-image-wrapper {
        height: 180px; /* Tinggi tetap untuk wadah gambar */
        display: flex; /* Menggunakan flexbox untuk centering */
        align-items: center; /* Vertically center */
        justify-content: center; /* Horizontally center */
        overflow: hidden; /* Pastikan gambar yang 'cover' tidak meluber */
        border-radius: 12px 12px 0 0; /* Sesuaikan border-radius agar cocok dengan card */
        margin-bottom: 8px; /* Jarak antara gambar dan detail produk */
    }

    /* KOREKSI: Gaya untuk gambar di dalam pembungkus */
    .product-image-wrapper img {
        width: 100%; /* Gambar mengisi lebar wadah */
        height: 100%; /* Gambar mengisi tinggi wadah */
        object-fit: cover; /* Penting: agar gambar mengisi penuh tanpa 'gap', bisa terpotong */
        transition: transform 0.3s ease; /* Efek zoom saat hover */
    }

    .product-card:hover .product-image-wrapper img {
        transform: scale(1.05); /* Efek zoom saat hover pada card */
    }

    .product-card .card-title {
        font-size: 0.95rem;
        margin-bottom: 6px;
    }

    .product-card .card-text {
        font-size: 0.85rem;
        margin-bottom: 10px;
    }

    .product-card .text-success {
        font-size: 0.85rem;
    }

    .product-card .btn-sm {
        font-size: 0.75rem;
        padding: 5px 12px;
    }

    @media (max-width: 576px) {
        .product-image-wrapper {
            height: 150px; /* Sesuaikan tinggi gambar untuk mobile */
        }
    }
</style>
@endpush

@endsection
