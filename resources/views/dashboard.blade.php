@extends('layouts.app')

@section('title', 'Dashboard Admin | Tigatra Adikara')

@section('content')
<div class="container-fluid py-4">
    <h3 class="mb-3 text-dark fw-bold">Selamat Datang, {{ session('user')->nama }}!</h3>
    <p class="text-muted mb-4">Kelola semua konten website melalui dashboard ini.</p>

    {{-- Statistik Card --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-wrench display-6 text-primary me-3"></i>
                    <div>
                        <h6 class="text-muted mb-1">Service Center</h6>
                        <h4 class="fw-bold mb-0">{{ \App\Models\ServiceCenter::count() }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-truck display-6 text-success me-3"></i>
                    <div>
                        <h6 class="text-muted mb-1">Vendor</h6>
                        <h4 class="fw-bold mb-0">{{ \App\Models\Vendor::count() }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-folder-fill display-6 text-warning me-3"></i>
                    <div>
                        <h6 class="text-muted mb-1">Proyek</h6>
                        <h4 class="fw-bold mb-0">{{ \App\Models\Project::count() }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grid Akses Cepat --}}
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body">
            <h5 class="fw-bold text-dark mb-4">Akses Cepat</h5>
            <div class="row g-3">
                @php
                    $menu = [
                        ['icon' => 'wrench', 'label' => 'Service Center', 'url' => '/service'],
                        ['icon' => 'info-circle', 'label' => 'Tentang Kami', 'url' => route('about_backend.index')],
                        ['icon' => 'person-badge', 'label' => 'Struktur Organisasi', 'url' => route('admin.organization-members.index')],
                        ['icon' => 'building', 'label' => 'Info Perusahaan', 'url' => route('admin.company_info.index')],
                        ['icon' => 'gear-fill', 'label' => 'Kelola Solusi', 'url' => route('admin.solution.index')],
                        ['icon' => 'envelope', 'label' => 'Pesan Masuk', 'url' => route('contact_messages.index')],
                        ['icon' => 'truck', 'label' => 'Kelola Vendor', 'url' => route('admin.vendors.index')],
                        ['icon' => 'newspaper', 'label' => 'News & Event', 'url' => route('admin.news.index')],
                        ['icon' => 'folder-fill', 'label' => 'Kelola Proyek', 'url' => route('admin.projects.index')],
                        ['icon' => 'people', 'label' => 'Kelola Admin', 'url' => route('users.index'), 'role' => 'superadmin'],
                    ];
                @endphp

                @foreach ($menu as $item)
                    @if (!isset($item['role']) || session('user')->role === $item['role'])
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <a href="{{ $item['url'] }}" class="text-decoration-none">
                                <div class="bg-white border rounded-lg p-3 d-flex align-items-center shadow-sm hover-effect">
                                    <i class="bi bi-{{ $item['icon'] }} fs-4 text-primary me-3"></i>
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
