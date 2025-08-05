@extends('layouts.app')

@section('title', 'Manajemen Berita')

@section('content')
<div class="container py-4">
    <div class="bg-white shadow rounded p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0" >Manajemen Berita</h4>
            <a href="{{ route('admin.news.create') }}" class="btn" style="background-color: #4797ec; color: white;">
                <i class="bi bi-plus-circle me-1"></i> Tambah Berita
            </a>
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
            <div class="btn-group">
                <a href="{{ route('admin.news.index') }}"
                   class="btn fw-semibold {{ request()->is('admin/news') ? 'text-white' : 'text-dark' }}"
                   style="background-color: {{ request()->is('admin/news') ? '#014a79' : 'white' }};
                          border: 1px solid #014a79;">
                    Semua Status
                </a>
                <a href="{{ route('admin.news.filter', 'published') }}"
                   class="btn fw-semibold {{ request()->is('admin/news/filter/published') ? 'text-white' : 'text-dark' }}"
                   style="background-color: {{ request()->is('admin/news/filter/published') ? '#014a79' : 'white' }};
                          border: 1px solid #014a79;">
                    Published
                </a>
                <a href="{{ route('admin.news.filter', 'draft') }}"
                   class="btn fw-semibold {{ request()->is('admin/news/filter/draft') ? 'text-white' : 'text-dark' }}"
                   style="background-color: {{ request()->is('admin/news/filter/draft') ? '#014a79' : 'white' }};
                          border: 1px solid #014a79;">
                    Draft
                </a>
            </div>
            <div class="text-muted small mt-2 mt-md-0">
                Total Berita: <strong>{{ $news->count() }}</strong>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead style="background-color: #014a79; color: white;">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Rubrik</th>
                        <th>Status</th>
                        <th>Tgl Dibuat</th>
                        <th>Tgl Publish</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $i => $n)
                    <tr>
                        <td>{{ $i + 1 }}</td>
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
                        <td>{{ $n->tanggal_publish ? \Carbon\Carbon::parse($n->tanggal_publish)->translatedFormat('d M Y H:i') : '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.news.edit', $n->id) }}"
                               class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.news.destroy', $n->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
