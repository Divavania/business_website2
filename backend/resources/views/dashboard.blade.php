@extends('layouts.app')

@section('title', 'Dashboard | Tigatra Adikara')

@section('content')
    <div class="container-fluid py-4">
        <h3 class="mb-4 text-primary fw-bold">Selamat datang di Dashboard, {{ session('user')->nama }}!</h3>
        <p class="text-muted mb-5">Kelola semua konten website Anda dengan mudah melalui panel di sebelah kiri.</p>

        <div class="row g-4 mb-5">

            {{-- Card Jumlah Produk --}}
            <div class="col-md-6">
                <div class="card shadow-sm h-100 border-0 rounded-lg">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-box-seam text-primary fs-3 me-3"></i>
                            <h5 class="card-title mb-0 text-dark fw-bold">Jumlah Produk</h5>
                        </div>
                        <h2 class="display-4 fw-bold text-primary">{{ $totalProduk }}</h2>
                        <p class="card-text text-muted">Total produk yang terdaftar pada sistem.</p>
                        <a href="/products" class="btn btn-outline-primary btn-sm mt-3 align-self-start">Kelola Produk <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- Card Jumlah Pesan Masuk (Belum Dibaca) --}}
            <div class="col-md-6">
                <div class="card shadow-sm h-100 border-0 rounded-lg">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-fill text-success fs-3 me-3"></i>
                            <h5 class="card-title mb-0 text-dark fw-bold">Pesan Masuk Baru</h5>
                        </div>
                        <h2 class="display-4 fw-bold text-success">{{ $unreadMessages ?? 0 }}</h2>
                        <p class="card-text text-muted">Pesan dari pengunjung yang belum Anda baca.</p>
                        <a href="/contacts" class="btn btn-outline-success btn-sm mt-3 align-self-start">Lihat Pesan <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- Card Jumlah Service Center --}}
            <div class="col-md-6">
                <div class="card shadow-sm h-100 border-0 rounded-lg">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-wrench-adjustable-fill text-info fs-3 me-3"></i>
                            <h5 class="card-title mb-0 text-dark fw-bold">Service Center</h5>
                        </div>
                        <h2 class="display-4 fw-bold text-info">{{ $totalService }}</h2>
                        <p class="card-text text-muted">Jumlah lokasi service center yang terdaftar.</p>
                        <a href="/service" class="btn btn-outline-info btn-sm mt-3 align-self-start">Kelola Lokasi <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- Card Jumlah Semua Pesan --}}
            <div class="col-md-6">
                <div class="card shadow-sm h-100 border-0 rounded-lg">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-chat-dots-fill text-warning fs-3 me-3"></i>
                            <h5 class="card-title mb-0 text-dark fw-bold">Total Pesan Diterima</h5>
                        </div>
                        <h2 class="display-4 fw-bold text-warning">{{ $totalKontak }}</h2>
                        <p class="card-text text-muted">Jumlah total pesan dari semua pengunjung.</p>
                        <a href="/contacts" class="btn btn-outline-warning btn-sm mt-3 align-self-start">Arsip Pesan <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold mb-4">Akses Cepat & Tugas Penting</h5>
                        <p class="text-muted">Jelajahi pintasan ke fitur-fitur utama untuk efisiensi pengelolaan konten Anda.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-plus-circle me-3 text-success fs-5"></i>
                                {{-- PERUBAHAN DI SINI: Ubah href dari /products/create menjadi /products --}}
                                <a href="/products" class="text-decoration-none text-dark fw-semibold">Kelola Produk</a> {{-- Ubah teks agar lebih jelas --}}
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-chat-left-text me-3 text-info fs-5"></i>
                                <a href="/contacts" class="text-decoration-none text-dark fw-semibold">Cek Pesan Pelanggan</a>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-info-circle me-3 text-secondary fs-5"></i>
                                <a href="/about" class="text-decoration-none text-dark fw-semibold">Kelola Informasi "Tentang Kami"</a>
                            </li>
                             <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-people me-3 text-primary fs-5"></i>
                                <a href="/users" class="text-decoration-none text-dark fw-semibold">Manajemen Akun Admin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
