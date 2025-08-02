@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Berita</h2>

    <a href="{{ route('admin.news.create') }}" class="btn btn-success mb-3">+ Tambah Berita</a>

    <div class="mb-3">
        <a href="{{ route('admin.news.filter', 'published') }}" class="btn btn-outline-success">Published</a>
        <a href="{{ route('admin.news.filter', 'draft') }}" class="btn btn-outline-secondary">Draft</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>Rubrik</th>
                <th>Status</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Publish</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $n)
            <tr>
                <td>{{ $n->judul }}</td>
                <td>{{ $n->rubrik->nama ?? '-' }}</td>
                <td>
                    @if ($n->status === 'published')
                        <span class="badge bg-success">Published</span>
                    @elseif ($n->status === 'draft')
                        <span class="badge bg-secondary">Draft</span>
                    @else
                        <span class="badge bg-warning text-dark">{{ ucfirst($n->status) }}</span>
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($n->tanggal_dibuat)->translatedFormat('d M Y H:i') }}</td>
                <td>
                    {{ $n->tanggal_publish ? \Carbon\Carbon::parse($n->tanggal_publish)->translatedFormat('d M Y H:i') : '-' }}
                </td>

                <td>
                    <a href="{{ route('admin.news.edit', $n->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.news.destroy', $n->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada berita</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
