@extends('layouts.frontend')

@section('title', $news->judul)

@section('content')

<!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">News & Event</h1> 
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">News & Event</li>
            <li class="current">News Show</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

<section class="py-5">
    <div class="container">
        <div class="row">

            {{-- Kolom Konten Berita --}}
            <div class="col-lg-8 mb-4">
                @if($news->gambar)
                    <img src="{{ asset('storage/' . $news->gambar) }}" class="img-fluid rounded mb-3" alt="{{ $news->deskripsi_gambar }}">
                @endif

                {{-- Info Meta --}}
                <div class="d-flex text-muted mb-2 small">
                    <div class="me-3">
                        <i class="bi bi-calendar-event"></i>
                        {{ \Carbon\Carbon::parse($news->tanggal_publish)->format('d-m-Y') }}
                    </div>
                    <div class="me-3">
                        <i class="bi bi-shield"></i>
                        {{ $news->rubrik->nama ?? 'Event' }}
                    </div>
                    <div>
                        <i class="bi bi-person-circle"></i> Admin
                    </div>
                </div>

                <h3 class="mb-3 fw-bold">{{ $news->judul }}</h3>

                <div class="konten-artikel">
                    {!! $news->konten !!}
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                {{-- Search --}}
                {{-- <div class="mb-4 border p-3 rounded">
                    <h5>Search</h5>
                    <form action="{{ route('frontend.news.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search.." />
                            <button class="btn btn-primary" type="submit">Go!</button>
                        </div>
                    </form>
                </div>

                {{-- Rubrik --}}
                {{-- <div class="mb-4 border p-3 rounded">
                    <h5>Rubrik</h5>
                    <ul class="list-unstyled">
                        @foreach($rubriks as $rubrik)
                            <li><a href="{{ route('frontend.news.rubrik', $rubrik->id) }}" class="text-decoration-none">{{ $rubrik->nama }}</a></li>
                        @endforeach
                    </ul>
                </div> --}}

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

{{-- CSS Tambahan --}}
<style>
.konten-artikel p {
    margin-bottom: 1em;
    line-height: 1.8;
}
.konten-artikel h1, .konten-artikel h2 {
    font-weight: bold;
    margin-top: 1.2em;
}
.konten-artikel ul, .konten-artikel ol {
    margin-left: 1.2em;
    margin-bottom: 1em;
}
.konten-artikel a {
    color: #007bff;
    text-decoration: underline;
}
</style>
@endsection
