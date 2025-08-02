@extends('layouts.frontend')

@section('title', 'News & Event')

@section('content')

<!-- Page Title -->
<div class="page-title light-background py-4 mb-4 border-bottom">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="fw-semibold mb-2 mb-lg-0">News & Event</h1> 
    <nav class="breadcrumbs">
      <ol class="breadcrumb small mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active">News & Event</li>
      </ol>
    </nav>
  </div>
</div>

<section class="py-5">
  <div class="container">
    <div class="row">
      <!-- Berita Utama -->
      <div class="col-lg-8">
        <h2 class="mb-4 fw-semibold">Berita Terbaru</h2>
        <div class="row g-4">
          @forelse($news as $item)
            <div class="col-md-6">
              <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-shadow">
                @if($item->gambar)
                  <a href="{{ route('frontend.news.show', $item->id) }}">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->deskripsi_gambar }}" class="img-fluid" style="height: 220px; object-fit: cover;">
                  </a>
                @endif

                <div class="card-body p-4">
                  <span class="d-block text-muted small mb-1">
                    {{ \Carbon\Carbon::parse($item->tanggal_publish)->translatedFormat('d F Y') }}
                  </span>

                  <h5 class="fw-semibold mb-2">
                    <a href="{{ route('frontend.news.show', $item->id) }}" class="text-dark text-decoration-none link-hover">
                      {{ $item->judul }}
                    </a>
                  </h5>

                  <div class="d-flex align-items-center text-muted small mb-2">
                    <i class="bi bi-folder me-1"></i>
                    {{ $item->rubrik->nama ?? 'Event' }}
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
            <p class="text-muted">Belum ada berita atau event yang tersedia.</p>
          @endforelse
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        {{-- Latest Posts --}}
        <div class="border p-3 rounded">
          <h5>Latest posts</h5>
          @foreach($latestPosts as $post)
            <div class="mb-3 border-bottom pb-2">
              <div class="small text-muted">
                <i class="bi bi-calendar-event"></i>
                {{ \Carbon\Carbon::parse($post->tanggal_publish)->format('d.m.Y') }}
              </div>
              <a href="{{ route('frontend.news.show', $post->id) }}" class="fw-semibold text-dark text-decoration-none d-block">
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

<style>
  .hover-shadow:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    transition: box-shadow 0.3s ease;
  }

  .link-hover:hover {
    color: #0d6efd;
    transition: color 0.2s ease;
  }
</style>
@endsection
