@extends('layouts.frontend')

@section('content')
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Vendor</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class="current">Vendor</li>
            </ol>
        </nav>
    </div>
</div>

{{-- Padding Top 5 agar ada jarak lega dari header --}}
<div class="container py-5 mb-5">
    <h2 class="text-center fw-bold text-dark mb-4">Partner Kami</h2>

    {{-- BAGIAN FILTER: HORIZONTAL SCROLL + TOMBOL NAVIGASI --}}
    @if(isset($categories) && $categories->count() > 0)
    <div class="slider-container-wrapper mb-5 position-relative">
        
        {{-- Tombol Navigasi KIRI --}}
        <button class="nav-btn prev-btn" id="scrollLeftBtn">
            <i class="bi bi-chevron-left"></i>
        </button>

        {{-- Area Scroll --}}
        <div class="scroll-wrapper" id="categoryScroll">
            <button class="btn filter-btn active" data-category-id="all">
                Semua
            </button>
            @foreach($categories->sortBy('name') as $category)
            <button class="btn filter-btn" data-category-id="{{ $category->id }}">
                {{ $category->name }}
            </button>
            @endforeach
        </div>

        {{-- Tombol Navigasi KANAN --}}
        <button class="nav-btn next-btn" id="scrollRightBtn">
            <i class="bi bi-chevron-right"></i>
        </button>

    </div>
    @endif

    {{-- DAFTAR VENDOR (CLEAN STYLE) --}}
    @if(isset($vendors) && $vendors->count() > 0)
    {{-- 
        PERUBAHAN DI SINI:
        1. row-cols-3      -> HP jadi 3 kolom (sebelumnya row-cols-2)
        2. row-cols-md-4   -> Tablet/Laptop kecil tetap 4
        3. row-cols-lg-5   -> Desktop lebar tetap 5
        4. g-3 g-md-4      -> Jarak antar logo di HP agak rapat (g-3), di Desktop lebar (g-md-4)
    --}}
    <div id="vendor-list" class="row row-cols-3 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3 g-md-4">
        @foreach($vendors as $vendor)
        <div class="col vendor-card" data-category-id="{{ $vendor->vendor_category_id ?? '' }}">
            <div class="h-100 text-center p-2 d-flex align-items-center justify-content-center vendor-item position-relative">
                @php
                    $logoUrl = $vendor->logo_path ? asset('storage/' . $vendor->logo_path) : null;
                    $altText = $vendor->alt_text ?? $vendor->name;
                    $websiteUrl = $vendor->website_url ?? '';
                @endphp
                
                @if($logoUrl)
                    @if($websiteUrl)
                        <a href="{{ $websiteUrl }}" target="_blank" rel="noopener noreferrer" class="d-block w-100">
                            {{-- Style max-height dan object-fit menjaga logo tetap proporsional --}}
                            <img src="{{ $logoUrl }}" alt="{{ $altText }}" class="img-fluid" style="max-height: 80px; max-width: 100%; object-fit: contain; transition: transform 0.3s;">
                        </a>
                    @else
                        <img src="{{ $logoUrl }}" alt="{{ $altText }}" class="img-fluid" style="max-height: 80px; max-width: 100%; object-fit: contain; transition: transform 0.3s;">
                    @endif
                @else
                    <div class="text-muted small py-4 w-100 border rounded bg-light">
                        {{ $vendor->name }}
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

@endsection

@push('styles')
<style>
    /* --- WRAPPER UTAMA --- */
    .slider-container-wrapper {
        position: relative;
        padding: 0 10px; 
    }

    /* --- AREA SCROLL --- */
    .scroll-wrapper {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        padding: 10px 5px; 
        scrollbar-width: none; 
        -ms-overflow-style: none; 
        scroll-behavior: smooth; 
        cursor: grab;
    }
    
    .scroll-wrapper::-webkit-scrollbar {
        display: none; 
    }

    /* --- TOMBOL NAVIGASI (PANAH) --- */
    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid #eee;
        background-color: #fff;
        color: #014a79;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        opacity: 0; 
        pointer-events: none; 
    }

    .nav-btn:hover {
        background-color: #014a79;
        color: #fff;
        box-shadow: 0 6px 12px rgba(1, 74, 121, 0.25);
    }

    .prev-btn {
        left: 0;
        background: linear-gradient(90deg, #fff 60%, rgba(255,255,255,0)); 
    }

    .next-btn {
        right: 0;
        background: linear-gradient(-90deg, #fff 60%, rgba(255,255,255,0)); 
    }

    .nav-btn.show {
        opacity: 1;
        pointer-events: auto;
    }

    /* --- TOMBOL KATEGORI --- */
    .filter-btn {
        flex: 0 0 auto;
        white-space: nowrap;
        border-radius: 50px;
        padding: 8px 24px;
        border: 1px solid #e9ecef;
        background-color: #fff;
        color: #6c757d;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.2s ease;
    }

    .filter-btn:hover {
        border-color: #014a79;
        color: #014a79;
        background-color: #f8f9fa;
    }

    .filter-btn.active {
        background-color: #014a79;
        color: #fff;
        border-color: #014a79;
        box-shadow: 0 4px 10px rgba(1, 74, 121, 0.2);
    }

    /* --- VENDOR LOGO --- */
    .vendor-item img {
        transition: transform 0.3s ease;
    }
    
    .vendor-item:hover img {
        transform: scale(1.1); 
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollContainer = document.getElementById('categoryScroll');
        const leftBtn = document.getElementById('scrollLeftBtn');
        const rightBtn = document.getElementById('scrollRightBtn');
        const filterButtons = document.querySelectorAll('.filter-btn');
        const vendorCards = document.querySelectorAll('.vendor-card');

        // --- 1. LOGIKA TOMBOL NAVIGASI ---
        function updateNavButtons() {
            const maxScrollLeft = scrollContainer.scrollWidth - scrollContainer.clientWidth;
            
            if (scrollContainer.scrollLeft > 10) {
                leftBtn.classList.add('show');
            } else {
                leftBtn.classList.remove('show');
            }

            if (scrollContainer.scrollLeft < maxScrollLeft - 5) {
                rightBtn.classList.add('show');
            } else {
                rightBtn.classList.remove('show');
            }
        }

        updateNavButtons();
        scrollContainer.addEventListener('scroll', updateNavButtons);
        window.addEventListener('resize', updateNavButtons);

        leftBtn.addEventListener('click', () => {
            scrollContainer.scrollBy({ left: -200, behavior: 'smooth' });
        });

        rightBtn.addEventListener('click', () => {
            scrollContainer.scrollBy({ left: 200, behavior: 'smooth' });
        });

        // --- 2. LOGIKA FILTER ---
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                this.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });

                const categoryId = this.getAttribute('data-category-id');
                vendorCards.forEach(card => {
                    const cardCategoryId = card.getAttribute('data-category-id');
                    if (categoryId === 'all' || cardCategoryId == categoryId) {
                        card.style.display = 'block';
                        card.style.opacity = '0';
                        setTimeout(() => card.style.opacity = '1', 50);
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // --- 3. MOUSE DRAG SCROLL ---
        let isDown = false;
        let startX;
        let scrollLeft;

        scrollContainer.addEventListener('mousedown', (e) => {
            isDown = true;
            scrollContainer.style.cursor = 'grabbing';
            startX = e.pageX - scrollContainer.offsetLeft;
            scrollLeft = scrollContainer.scrollLeft;
        });
        scrollContainer.addEventListener('mouseleave', () => {
            isDown = false;
            scrollContainer.style.cursor = 'grab';
        });
        scrollContainer.addEventListener('mouseup', () => {
            isDown = false;
            scrollContainer.style.cursor = 'grab';
        });
        scrollContainer.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - scrollContainer.offsetLeft;
            const walk = (x - startX) * 2; 
            scrollContainer.scrollLeft = scrollLeft - walk;
        });
    });
</script>
@endpush