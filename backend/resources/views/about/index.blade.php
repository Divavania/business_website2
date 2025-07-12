@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')
<div class="container-fluid mt-4">
    <h4 class="text-primary mb-4">Tentang Kami</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="/about/update" method="POST" class="bg-white p-4 shadow rounded">
        @csrf
        <div class="mb-3">
            <label for="sejarah" class="form-label">Sejarah</label>
            <textarea name="sejarah" class="form-control" rows="4" required>{{ $about->sejarah ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="visi" class="form-label">Visi</label>
            <textarea name="visi" class="form-control" rows="3" required>{{ $about->visi ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="misi" class="form-label">Misi</label>
            <textarea name="misi" class="form-control" rows="3" required>{{ $about->misi ?? '' }}</textarea>
        </div>
        <button class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
