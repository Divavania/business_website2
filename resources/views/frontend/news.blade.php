@extends('layouts.frontend')

@section('title', 'News & Event')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Berita Terbaru</h2>
        <div class="row">
            @forelse($news as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($item->gambar)
                            <a href="{{ route('frontend.news.show', $item->id) }}">
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->deskripsi_gambar }}">
                            </a>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('frontend.news.show', $item->id) }}" class="text-decoration-none text-dark">
                                    {{ $item->judul }}
                                </a>
                            </h5>
                            <p class="text-muted">{{ date('d M Y', strtotime($item->tanggal_publish)) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>Tidak ada berita yang tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
