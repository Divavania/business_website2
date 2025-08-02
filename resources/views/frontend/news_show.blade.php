@extends('layouts.frontend')

@section('title', $news->judul)

@section('content')
<section class="py-5">
    <div class="container">

        <h2 class="mb-3">{{ $news->judul }}</h2>
        <p class="text-muted">{{ date('d M Y', strtotime($news->tanggal_publish)) }}</p>

        @if($news->gambar)
            <img src="{{ asset('storage/' . $news->gambar) }}" class="img-fluid mb-4" alt="{{ $news->deskripsi_gambar }}">
        @endif

        <div class="konten-artikel">
            {!! $news->konten !!}
        </div>

    </div>
</section>

{{-- Styling ringan supaya tampilan kontennya rapi --}}
<style>
    .konten-artikel p {
        margin-bottom: 1em;
        line-height: 1.6;
    }
    .konten-artikel h1,
    .konten-artikel h2,
    .konten-artikel h3 {
        font-weight: bold;
        margin-top: 1.2em;
    }
    .konten-artikel ul, .konten-artikel ol {
        margin-left: 1.2em;
        margin-bottom: 1em;
    }
    .konten-artikel a {
        color: #007BFF;
        text-decoration: underline;
    }
</style>
@endsection
