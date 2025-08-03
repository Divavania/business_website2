@extends('layouts.frontend')

@section('content')
<!-- Breadcrumb & Title -->
<div class="bg-light border-bottom py-4 mb-5">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
        <h1 class="mb-2 mb-md-0 h4 fw-bold text-dark">Our Vendor</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our Vendor</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Page Container -->
<div class="container mb-5">
    <h2 class="text-center fw-bold text-dark mb-4">Partner Kami</h2>

    @if(isset($categories) && $categories->count() > 0)
    <!-- Filter Buttons -->
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
        <button class="filter-btn btn btn-primary rounded-pill px-4 py-2" data-category-id="all">Semua</button>
        @foreach($categories as $category)
        <button class="filter-btn btn btn-outline-secondary rounded-pill px-4 py-2" data-category-id="{{ $category->id }}">
            {{ $category->name }}
        </button>
        @endforeach
    </div>
    @endif

    <!-- Vendor Grid -->
    @if(isset($vendors) && $vendors->count() > 0)
    <div id="vendor-list" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
        @foreach($vendors as $vendor)
        <div class="col vendor-card" data-category-id="{{ $vendor->vendor_category_id ?? '' }}">
            <div class="card h-100 border-0 shadow-sm text-center p-3 transition hover-shadow">
                @if($vendor->logo_path)
                    <img src="{{ asset('storage/' . $vendor->logo_path) }}" 
                         alt="{{ $vendor->alt_text ?? $vendor->name }}" 
                         class="img-fluid mx-auto d-block" style="max-height: 80px; object-fit: contain;"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="bg-light d-none align-items-center justify-content-center rounded" style="height: 80px;">
                        <span class="text-muted small">Logo tidak tersedia</span>
                    </div>
                @else
                <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 80px;">
                    <span class="text-muted small">Logo tidak tersedia</span>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- Empty State -->
    <div class="text-center py-5 mt-5">
        <div class="fs-1 mb-3">📦</div>
        <h4 class="text-muted">Belum Ada Vendor</h4>
        <p class="text-secondary">Vendor akan ditampilkan di sini setelah ditambahkan oleh administrator.</p>
    </div>
    @endif
</div>

<!-- Filtering Script -->
@if(isset($categories) && $categories->count() > 0 && isset($vendors) && $vendors->count() > 0)
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const vendorCards = document.querySelectorAll('.vendor-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => {
                    btn.classList.remove('btn-primary');
                    btn.classList.add('btn-outline-secondary');
                });
                button.classList.remove('btn-outline-secondary');
                button.classList.add('btn-primary');

                const categoryId = button.dataset.categoryId;

                vendorCards.forEach(card => {
                    const cardCategoryId = card.dataset.categoryId;

                    if (categoryId === 'all' || cardCategoryId === categoryId || (!categoryId && !cardCategoryId)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endif

<!-- Optional Hover Effect -->
<style>
    .hover-shadow:hover {
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.08) !important;
        transform: translateY(-3px);
        transition: all 0.2s ease;
    }
</style>
@endsection
