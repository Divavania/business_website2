@extends('layouts.frontend')

@section('content')
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Vendor</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="current">Vendor</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5">
    <h2 class="text-center fw-bold text-dark mb-4">Partner Kami</h2>

    @if(isset($categories) && $categories->count() > 0)
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-4 d-none d-md-flex">
        {{-- Visible on medium and larger screens --}}
        <button class="filter-btn btn btn-white border-dark text-secondary rounded-pill px-4 py-2" data-category-id="all">Semua</button>
        @foreach($categories as $category)
        <button class="filter-btn btn btn-white border-dark text-secondary rounded-pill px-4 py-2" data-category-id="{{ $category->id }}">
            {{ $category->name }}
        </button>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mb-4 d-md-none">
        {{-- Visible on small screens --}}
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle rounded-pill px-4 py-2 text-white" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Semua
            </button>
            <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                <li><a class="dropdown-item filter-btn active" href="#" data-category-id="all">Semua</a></li>
                @foreach($categories as $category)
                <li><a class="dropdown-item filter-btn" href="#" data-category-id="{{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    @if(isset($vendors) && $vendors->count() > 0)
    <div id="vendor-list" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
        @foreach($vendors as $vendor)
        <div class="col vendor-card" data-category-id="{{ $vendor->vendor_category_id ?? '' }}">
            <div class="card h-100 border-0 text-center p-3 transition">
                @php
                    $logoUrl = $vendor->logo_path ? asset('storage/' . $vendor->logo_path) : null;
                    $altText = $vendor->alt_text ?? $vendor->name;
                    $websiteUrl = $vendor->website_url ?? '';
                @endphp
                
                @if($logoUrl)
                    @if($websiteUrl)
                        <a href="{{ $websiteUrl }}" target="_blank" rel="noopener noreferrer" class="d-flex h-100 align-items-center justify-content-center">
                            <img src="{{ $logoUrl }}" alt="{{ $altText }}" class="img-fluid" style="max-height: 80px; object-fit: contain;">
                        </a>
                    @else
                        <img src="{{ $logoUrl }}" alt="{{ $altText }}" class="img-fluid mx-auto d-block" style="max-height: 80px; object-fit: contain;">
                    @endif
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
    <div class="text-center py-5 mt-5">
        <div class="fs-1 mb-3">📦</div>
        <h4 class="text-muted">Belum Ada Vendor</h4>
        <p class="text-secondary">Vendor akan ditampilkan di sini setelah ditambahkan oleh administrator.</p>
    </div>
    @endif
</div>

@if(isset($categories) && $categories->count() > 0 && isset($vendors) && $vendors->count() > 0)
<style>
    /* Default state for filter buttons */
    .filter-btn {
        background-color: white !important;
        border: 1px solid #343a40 !important; /* border-dark */
        color: #6c757d !important; /* text-secondary */
        transition: all 0.2s ease-in-out;
    }

    /* Hover and Active state for filter buttons */
    .filter-btn:hover,
    .filter-btn.active {
        background-color: #6c757d !important; /* bg-secondary */
        border-color: #6c757d !important; /* border-secondary */
        color: white !important; /* text-white */
    }

    /* Adjust dropdown item colors specifically for hover/active */
    .dropdown-item.filter-btn:hover,
    .dropdown-item.filter-btn.active {
        background-color: #6c757d !important; /* bg-secondary */
        color: white !important; /* text-white */
    }

    /* Specific style for the dropdown button on mobile */
    .d-md-none .dropdown button#categoryDropdown {
        background-color: #6c757d !important; /* bg-secondary */
        border-color: #6c757d !important; /* border-secondary */
        color: white !important; /* text-white */
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const vendorCards = document.querySelectorAll('.vendor-card');
        const categoryDropdown = document.getElementById('categoryDropdown');

        // Function to handle filtering
        function filterVendors(categoryId) {
            vendorCards.forEach(card => {
                const cardCategoryId = card.dataset.categoryId;
                if (categoryId === 'all' || cardCategoryId === categoryId || (categoryId === '' && cardCategoryId === '')) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Initial filter to show all vendors
        filterVendors('all');

        // Set 'Semua' as active by default for both button group and dropdown
        // For regular buttons (desktop)
        const allDesktopButton = document.querySelector('.d-none.d-md-flex .filter-btn[data-category-id="all"]');
        if (allDesktopButton) {
            allDesktopButton.classList.add('active');
        }
        
        // For dropdown item (mobile) and update dropdown button text
        const allDropdownItem = document.querySelector('.dropdown-item.filter-btn[data-category-id="all"]');
        if (allDropdownItem) {
            allDropdownItem.classList.add('active');
            categoryDropdown.textContent = allDropdownItem.textContent;
        }


        filterButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default link behavior for dropdown items
                
                // Remove active states from all filter buttons/items
                filterButtons.forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Set the clicked button/item as active
                button.classList.add('active');

                // Update dropdown button text if it's a dropdown item
                if (button.tagName === 'A' && button.closest('.dropdown-menu')) {
                    categoryDropdown.textContent = button.textContent;
                }

                const categoryId = button.dataset.categoryId;
                filterVendors(categoryId);
            });
        });
    });
</script>
@endif

@endsection