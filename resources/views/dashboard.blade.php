@extends('layouts.app')

@section('title', 'Dashboard Admin | Tigatra Adikara')

@section('content')
<div class="container-fluid py-4">
    <h3 class="mb-3 text-dark fw-bold">Selamat Datang, {{ session('user')->nama }}!</h3>
    <p class="text-muted mb-4">Kelola semua konten website melalui dashboard ini.</p>

    {{-- Kartu Statistik Singkat --}}
    {{-- <div class="row g-4 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0 rounded-lg h-100">
                <div class="card-body text-center">
                    <i class="bi bi-geo-alt-fill fs-2 text-info mb-2"></i>
                    <h6 class="fw-bold text-dark">Service Center</h6>
                    <p class="fs-5 fw-bold mb-2">{{ $totalService }}</p>
                    <a href="/service" class="btn btn-sm btn-outline-info w-100">Kelola Lokasi</a>
                </div>
            </div>
        </div> --}}
        {{-- Tambah card lain di sini jika ingin --}}
    {{-- </div> --}}

    {{-- Grid Akses Cepat --}}
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body">
            <h5 class="fw-bold text-dark mb-3">Akses Cepat</h5>
            <div class="row g-3">
                @php
                    $menu = [
                        ['icon' => 'bi-tools', 'label' => 'Service Center', 'url' => '/service'], // Keep as is if no named route exists
                        ['icon' => 'bi-info-circle', 'label' => 'Tentang Kami', 'url' => route('about_backend.index')],
                        ['icon' => 'bi-diagram-3', 'label' => 'Struktur Organisasi', 'url' => route('admin.organization-members.index')],
                        ['icon' => 'bi-building', 'label' => 'Info Perusahaan', 'url' => route('admin.company_info.index')],
                        ['icon' => 'bi-gear', 'label' => 'Kelola Solusi', 'url' => route('admin.solution.index')],
                        ['icon' => 'bi-envelope', 'label' => 'Pesan Masuk', 'url' => route('contact_messages.index')],
                        ['icon' => 'bi-truck', 'label' => 'Kelola Vendor', 'url' => route('admin.vendors.index')],
                        ['icon' => 'bi-megaphone', 'label' => 'News & Event', 'url' => route('admin.news.index')],
                        ['icon' => 'bi-folder2-open', 'label' => 'Kelola Proyek', 'url' => route('admin.projects.index')],
                        ['icon' => 'bi-person-gear', 'label' => 'Kelola Admin', 'url' => route('users.index'), 'role' => 'superadmin'],
                    ];
                @endphp

                @foreach ($menu as $item)
                    @if (!isset($item['role']) || session('user')->role === $item['role'])
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <a href="{{ $item['url'] }}" class="text-decoration-none">
                                <div class="border rounded-lg p-3 h-100 d-flex align-items-center shadow-sm hover-shadow transition">
                                    <i class="bi {{ $item['icon'] }} fs-3 text-primary me-3"></i>
                                    <span class="fw-semibold text-dark">{{ $item['label'] }}</span>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection