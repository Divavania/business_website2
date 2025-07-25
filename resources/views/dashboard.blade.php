@extends('layouts.app')

@section('title', 'Dashboard | Tigatra Adikara')

@section('content')
    <div class="container-fluid py-4">
        <h3 class="mb-4 text-primary fw-bold">Selamat datang di Dashboard, {{ session('user')->nama }}!</h3>
        <p class="text-muted mb-4">Kelola semua konten website Anda dengan mudah melalui panel di sebelah kiri.</p>

        <div class="row g-4 mb-5">

            {{-- Card Jumlah Produk --}}
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card shadow-sm h-100 border-0 rounded-lg">
                    {{-- KOREKSI: Menambahkan text-center untuk meratakan semua konten --}}
                    <div class="card-body d-flex flex-column p-2 text-center">
                        {{-- KOREKSI: Mengubah d-flex menjadi d-inline-flex dan menambahkan justify-content-center --}}
                        <div class="d-inline-flex align-items-center justify-content-center mb-2">
                            <i class="bi bi-box-seam text-primary fs-3 me-3"></i>
                            <h5 class="card-title mb-0 text-dark fw-bold fs-6">Jumlah Produk</h5>
                        </div>
                        <h2 class="fs-5 fw-bold mb-2">{{ $totalProduk }}</h2>
                        <p class="card-text text-muted small flex-grow-1 mb-3">Total produk yang terdaftar pada sistem.</p>
                        {{-- KOREKSI: Menambahkan w-100 untuk tombol memanjang dan menghapus align-self-start --}}
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary btn-sm mt-auto w-100">Kelola Produk <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- Card Jumlah Pesan Masuk (Belum Dibaca) --}}
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card shadow-sm h-100 border-0 rounded-lg">
                    <div class="card-body d-flex flex-column p-2 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center mb-2">
                            <i class="bi bi-envelope-fill text-success fs-3 me-3"></i>
                            <h5 class="card-title mb-0 text-dark fw-bold fs-6">Pesan Masuk Baru</h5>
                        </div>
                        <h2 class="fs-5 fw-bold mb-2">{{ $unreadMessages ?? 0 }}</h2>
                        <p class="card-text text-muted small flex-grow-1 mb-3">Pesan dari pengunjung yang belum Anda baca.</p>
                        <a href="/contacts" class="btn btn-outline-success btn-sm mt-auto w-100">Lihat Pesan <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- Card Jumlah Service Center --}}
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card shadow-sm h-100 border-0 rounded-lg">
                    <div class="card-body d-flex flex-column p-2 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center mb-2">
                            <i class="bi bi bi-geo-alt-fill text-info fs-3 me-3"></i>
                            <h5 class="card-title mb-0 text-dark fw-bold fs-6">Service Center</h5>
                        </div>
                        <h2 class="fs-5 fw-bold mb-2">{{ $totalService }}</h2>
                        <p class="card-text text-muted small flex-grow-1 mb-3">Jumlah lokasi service center yang terdaftar.</p>
                        <a href="/service" class="btn btn-outline-info btn-sm mt-auto w-100">Kelola Lokasi <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- Card Jumlah Semua Pesan --}}
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card shadow-sm h-100 border-0 rounded-lg">
                    <div class="card-body d-flex flex-column p-2 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center mb-2">
                            <i class="bi bi-chat-dots-fill text-warning fs-3 me-3"></i>
                            <h5 class="card-title mb-0 text-dark fw-bold fs-6">Total Pesan</h5>
                        </div>
                        <h2 class="fs-5 fw-bold mb-2">{{ $totalKontak }}</h2>
                        <p class="card-text text-muted small flex-grow-1 mb-3">Jumlah total pesan dari semua pengunjung.</p>
                        <a href="/contacts" class="btn btn-outline-warning btn-sm mt-auto w-100">Arsip Pesan <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>

        {{-- Bagian "Akses Cepat & Tugas Penting" --}}
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body p-3"> {{-- KOREKSI: Menambahkan p-3 untuk padding yang lebih ringkas --}}
                        <h5 class="card-title text-dark fw-bold mb-3">Akses Cepat & Tugas Penting</h5> {{-- KOREKSI: Mengubah mb-4 menjadi mb-3 --}}
                        <p class="text-muted small mb-3">Jelajahi pintasan ke fitur-fitur utama untuk efisiensi pengelolaan konten Anda.</p> {{-- KOREKSI: Menambahkan small dan mengubah mb-4 menjadi mb-3 --}}
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center py-2"> {{-- KOREKSI: Menambahkan py-2 --}}
                                <i class="bi bi-plus-circle me-3 text-success fs-5"></i>
                                <a href="{{ route('admin.products.index') }}" class="text-decoration-none text-dark fw-semibold">Kelola Produk</a>
                            </li>
                            <li class="list-group-item d-flex align-items-center py-2"> {{-- KOREKSI: Menambahkan py-2 --}}
                                <i class="bi bi-chat-left-text me-3 text-info fs-5"></i>
                                <a href="/contacts" class="text-decoration-none text-dark fw-semibold">Cek Pesan Pelanggan</a>
                            </li>
                            <li class="list-group-item d-flex align-items-center py-2"> {{-- KOREKSI: Menambahkan py-2 --}}
                                <i class="bi bi-info-circle me-3 text-secondary fs-5"></i>
                                <a href="/about_backend" class="text-decoration-none text-dark fw-semibold">Kelola Informasi "Tentang Kami"</a>
                            </li>
                            @if(session()->has('user') && session('user')->role == 'superadmin')
                                <li class="list-group-item d-flex align-items-center py-2"> {{-- KOREKSI: Menambahkan py-2 --}}
                                    <i class="bi bi-people me-3 text-primary fs-5"></i>
                                    <a href="/users" class="text-decoration-none text-dark fw-semibold">Manajemen Akun Admin</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection