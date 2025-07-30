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

        {{-- Filter & Search Bar --}}
        <div class="row mb-4 justify-content-between align-items-center" data-aos="fade-up" data-aos-delay="50">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <div class="btn-group btn-group-toggle" role="group" aria-label="Filter Produk">
                    <button type="button" class="btn btn-outline-primary active filter-btn" data-filter="all">All</button>
                    <button type="button" class="btn btn-outline-primary filter-btn" data-filter="hardware">Hardware</button>
                    <button type="button" class="btn btn-outline-primary filter-btn" data-filter="software">Software</button>
                </div>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <form action="{{ url('/products') }}" method="GET" class="d-flex justify-content-md-end justify-content-center gap-2">
                    <div class="input-group" style="max-width: 350px;">
                        <input type="text" class="form-control rounded-pill border-0 shadow-sm" placeholder="Cari produk..." name="search" value="{{ request('search') }}">
                        <button class="btn btn-outline-primary rounded-pill ms-2" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Produk List --}}
        <div class="row gy-4">
            @forelse($products as $product)
            @php
                $kategoriClass = strtolower($product->kategori); // hardware atau software
            @endphp
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 filter-item {{ $kategoriClass }}" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 shadow-sm border-0 rounded-lg product-card">
                        <div class="product-image-wrapper text-center" style="height: 180px; background-color: #f0f2f5;">
                            <img src="{{ asset('storage/' . $product->gambar) }}"
                                 alt="{{ $product->nama }}"
                                 class="img-fluid">
                        </div>
                        {{-- Detail Produk --}}
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
        padding: 8px;
        border: 1px solid #e0e0e0;
        background-color: #ffffff; /* Latar putih */
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
    }

    .product-image-wrapper {
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 12px 12px 0 0;
        margin-bottom: 8px;
        background-color: transparent; /* Hapus latar abu */
    }

    .product-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image-wrapper img {
        transform: scale(1.05);
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
            height: 150px;
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

@endpush


@endsection
