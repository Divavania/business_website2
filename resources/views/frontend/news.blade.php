@extends('layouts.frontend')

@section('title', 'News & Event')

@section('content')

<!-- Page Title -->
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">News & Event</h1> 
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">News & Event</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<section class="pb-5">
  <div class="container">
    <div class="row">
      <!-- Berita Utama -->
      <div class="col-lg-8">
        {{-- <h2 class="mb-4 fw-semibold text-dark">Berita Terbaru</h2> --}}

        <!-- Filter Rubrik & Search -->
        <form action="{{ route('frontend.news.index') }}" method="GET" class="mb-4">
          <div class="row g-3 align-items-center">
            <div class="col-md-4">
              <select name="rubrik" class="form-select shadow-sm border-light" onchange="this.form.submit()">
                <option value="">Semua Rubrik</option>
                @foreach($rubriks as $rubrik)
                  <option value="{{ $rubrik->id }}" {{ request('rubrik') == $rubrik->id ? 'selected' : '' }}>
                    {{ $rubrik->nama }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-8">
              <div class="input-group shadow-sm border-light">
                <input type="text" name="search" class="form-control" placeholder="Cari berita atau event..." value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </div>
          </div>
        </form>

        <!-- Daftar Berita -->
        <div class="row g-4">
          @forelse($news as $item)
            <div class="col-md-6">
              <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden news-card">
                @if($item->gambar)
                  <a href="{{ route('frontend.news.show', $item->id) }}">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->deskripsi_gambar }}" class="img-fluid w-100" style="height: 220px; object-fit: cover;">
                  </a>
                @endif
                <div class="card-body px-4 py-3">
                  <span class="d-block text-muted small mb-2">
                    <i class="bi bi-calendar-event me-1"></i> {{ \Carbon\Carbon::parse($item->tanggal_publish)->translatedFormat('d F Y') }}
                  </span>
                  <h5 class="fw-semibold mb-2">
                    <a href="{{ route('frontend.news.show', $item->id) }}" class="text-dark text-decoration-none hover-primary">
                      {{ $item->judul }}
                    </a>
                  </h5>
                  <div class="d-flex align-items-center text-muted small mb-2">
                    <i class="bi bi-folder me-1"></i> {{ $item->rubrik->nama ?? 'Event' }}
                    <span class="mx-2">•</span>
                    <i class="bi bi-person-circle me-1"></i> Admin
                  </div>
                  <p class="text-muted small mb-0">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->konten), 100) }}
                  </p>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12">
              <div class="alert alert-secondary text-center">Belum ada berita atau event yang tersedia.</div>
            </div>
          @endforelse
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4 mt-5 mt-lg-0">
        <div class="p-4 border bg-white shadow-sm rounded-4">
          <h5 class="fw-semibold mb-3 text-dark">Latest Posts</h5>
          @foreach($latestPosts as $post)
            <div class="mb-4 pb-3 border-bottom">
              <div class="text-muted small mb-1">
                <i class="bi bi-calendar-event me-1"></i> {{ \Carbon\Carbon::parse($post->tanggal_publish)->format('d.m.Y') }}
              </div>
              <a href="{{ route('frontend.news.show', $post->id) }}" class="fw-semibold text-dark text-decoration-none hover-primary d-block">
                {{ $post->judul }}
              </a>
              <div class="small text-muted">
                {{ \Illuminate\Support\Str::limit(strip_tags($post->konten), 80) }}
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Custom Styles -->
<style>
  .hover-primary:hover {
    color: #0d6efd;
    transition: color 0.2s ease-in-out;
  }

  .news-card:hover {
    box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
    transition: box-shadow 0.3s ease;
  }

  .form-select,
  .form-control,
  .btn {
    border-radius: 0.5rem;
  }

  .breadcrumb-item + .breadcrumb-item::before {
    color: #6c757d;
  }
</style>

@endsection
