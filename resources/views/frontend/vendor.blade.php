@extends('layouts.frontend')

@section('content')
<div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Our Vendor</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Our Vendor</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">Our Vendor</h1>

    @if(isset($categories) && $categories->count() > 0)
    <!-- Filter Kategori -->
    <div class="flex flex-wrap justify-center gap-4 mb-10">
        <button class="filter-btn px-6 py-2 bg-blue-500 text-white rounded-full font-semibold transition hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" data-category-id="all">
            Semua
        </button>
        @foreach($categories as $category)
        <button class="filter-btn px-6 py-2 bg-gray-200 text-gray-700 rounded-full font-semibold transition hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300" data-category-id="{{ $category->id }}">
            {{ $category->name }}
        </button>
        @endforeach
    </div>
    @endif

    <!-- Daftar Vendor -->
    @if(isset($vendors) && $vendors->count() > 0)
    <div id="vendor-list" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach($vendors as $vendor)
        <div class="vendor-card p-4 rounded-lg shadow-md bg-white flex flex-col items-center justify-center h-48 transition-transform transform hover:scale-105 hover:shadow-lg" data-category-id="{{ $vendor->vendor_category_id ?? '' }}">
            @if($vendor->logo_path)
                <img src="{{ asset('storage/' . $vendor->logo_path) }}" 
                     alt="{{ $vendor->alt_text ?? $vendor->name }}" 
                     class="max-h-24 max-w-full object-contain mb-2"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div class="w-full h-24 bg-gray-200 flex items-center justify-center text-gray-500 rounded-md text-sm" style="display: none;">
                    Logo tidak tersedia
                </div>
            @else
            <div class="w-full h-24 bg-gray-200 flex items-center justify-center text-gray-500 rounded-md text-sm">
                Logo tidak tersedia
            </div>
            @endif
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-16">
        <div class="text-gray-500 text-xl mb-4">
            📦
        </div>
        <h3 class="text-2xl font-semibold text-gray-600 mb-2">Belum Ada Vendor</h3>
        <p class="text-gray-500">Vendor akan ditampilkan di sini setelah ditambahkan oleh administrator.</p>
    </div>
    @endif
</div>

@if(isset($categories) && $categories->count() > 0 && isset($vendors) && $vendors->count() > 0)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const vendorCards = document.querySelectorAll('.vendor-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Reset semua tombol
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-blue-500', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });
                
                // Aktifkan tombol yang diklik
                button.classList.remove('bg-gray-200', 'text-gray-700');
                button.classList.add('bg-blue-500', 'text-white');

                const categoryId = button.dataset.categoryId;

                vendorCards.forEach(card => {
                    const cardCategoryId = card.dataset.categoryId;
                    
                    if (categoryId === 'all' || cardCategoryId === categoryId || (categoryId === '' && cardCategoryId === '')) {
                        card.style.display = 'flex';
                        // Animasi fade in
                        card.style.opacity = '0';
                        setTimeout(() => {
                            card.style.opacity = '1';
                        }, 50);
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endif
@endsection