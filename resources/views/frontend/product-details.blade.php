@extends('layouts.frontend')

@section('title', 'Tigatra Adikara')
@section('description', Str::limit($product->deskripsi, 150))
@section('keywords', 'Tigatra Adikara, produk, ' . $product->nama . ', ' . $product->kategori)

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Detail Produk</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('frontend.products.index') }}">Produk</a></li>
                    <li class="current">{{ $product->nama }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Product Details -->
    <section id="product-details" class="section py-5">
        <div class="container" data-aos="fade-up">
            <div class="row g-5 align-items-start">

                <!-- Product Image -->
                <div class="col-lg-7">
                    <div class="bg-white shadow-sm rounded-4 overflow-hidden p-3 text-center">
                        @if($product->gambar)
                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}"
                                class="img-fluid" style="max-height: 450px; object-fit: contain;"
                                onerror="this.onerror=null;this.src='https://placehold.co/800x600/E0E0E0/333333?text=No+Image';">
                        @else
                            <img src="https://placehold.co/800x600/E0E0E0/333333?text=No+Image"
                                class="img-fluid" alt="No Image Available">
                        @endif
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-5">
                    <div class="bg-light rounded-4 shadow-sm p-4">
                        <h2 class="text-primary mb-3">{{ $product->nama }}</h2>
                        <ul class="list-unstyled small mb-4">
                            <li class="mb-2"><i class="bi bi-box-seam me-2 text-secondary"></i><strong>Kategori:</strong> {{ ucfirst($product->kategori) }}</li>
                        </ul>

                        <a href="{{ route('frontend.contact.index') }}" class="btn btn-primary rounded-pill px-4 py-2 mt-2 w-100">
                            <i class="bi bi-whatsapp me-1"></i> Hubungi Kami untuk Pembelian
                        </a>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mt-4">
                        <h5 class="text-dark fw-bold mb-2">Deskripsi Produk</h5>
                        <p class="text-muted">{!! nl2br(e($product->deskripsi)) !!}</p>
                    </div>

                    @if($product->spesifikasi)
                        <div class="mt-4">
                            <h5 class="text-dark fw-bold mb-2">Spesifikasi Teknis</h5>
                            <p class="text-muted">{!! nl2br(e($product->spesifikasi)) !!}</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
</main>
@endsection

@push('styles')
<style>
    #product-details h2,
    #product-details h5 {
        color: #0d6efd;
    }

    #product-details p {
        line-height: 1.7;
        font-size: 0.95rem;
    }

    #product-details ul li {
        font-size: 0.95rem;
    }

    .product-details-image img {
        transition: transform 0.3s ease;
    }

    .product-details-image img:hover {
        transform: scale(1.02);
    }

    .btn-primary {
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .btn {
            font-size: 0.9rem;
        }
    }
</style>
@endpush
