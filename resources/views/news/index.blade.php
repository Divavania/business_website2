@extends('layouts.app')

@section('title', 'Manajemen Berita')

@section('content')
<div class="container py-4 py-md-5">
    <div class="bg-white shadow-sm rounded-3 p-3 p-md-4">
        <div class="d-flex justify-content-between align-items-center mb-3 mb-md-4 flex-column flex-md-row gap-3 gap-md-0">
            <h4 class="fw-bold mb-0 text-dark">Manajemen Berita</h4>
            <a href="{{ route('admin.news.create') }}" class="btn btn-sm shadow-sm" style="background-color: #4797ec; color: white;">
                <i class="bi bi-plus-circle me-1"></i> Tambah Berita
            </a>
        </div>

        {{-- SweetAlert Flash Message --}}
        @foreach (['success' => 'success', 'error' => 'error', 'deleted' => 'warning'] as $key => $type)
            @if(session($key))
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    Swal.fire({
                        icon: '{{ $type }}',
                        title: '{{ ucfirst($key) }}!',
                        text: @json(session($key)),
                        showConfirmButton: {{ $key == 'error' ? 'true' : 'false' }},
                        confirmButtonText: 'OK',
                        timer: {{ $key == 'error' ? 'null' : '2000' }},
                        timerProgressBar: true,
                        toast: true,
                        position: 'top-end',
                        showClass: { popup: 'animate__animated animate__fadeIn' },
                        hideClass: { popup: 'animate__animated animate__fadeOut' }
                    });
                });
            </script>
            @endif
        @endforeach

        <div class="mb-4">
            <form action="{{ route('admin.news.index') }}" method="GET" class="d-flex flex-column flex-md-row gap-2 align-items-md-center">
                <div class="input-group input-group-sm w-100 w-md-auto">
                    <input type="text" name="search" class="form-control rounded-start" 
                           placeholder="Cari berita..." value="{{ request('search') }}" 
                           aria-label="Cari berita">
                    <button type="submit" class="btn rounded-end" style="background-color: #4797ec; color: white;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="btn-group flex-wrap">
                    <a href="{{ route('admin.news.index') }}"
                       class="btn btn-sm fw-semibold {{ !request('status') ? 'text-white' : 'text-dark' }}"
                       style="background-color: {{ !request('status') ? '#014a79' : 'white' }}; border: 1px solid #014a79;">
                        Semua Status
                    </a>
                    <a href="{{ route('admin.news.index', ['status' => 'published']) }}"
                       class="btn btn-sm fw-semibold {{ request('status') == 'published' ? 'text-white' : 'text-dark' }}"
                       style="background-color: {{ request('status') == 'published' ? '#014a79' : 'white' }}; border: 1px solid #014a79;">
                        Published
                    </a>
                    <a href="{{ route('admin.news.index', ['status' => 'draft']) }}"
                       class="btn btn-sm fw-semibold {{ request('status') == 'draft' ? 'text-white' : 'text-dark' }}"
                       style="background-color: {{ request('status') == 'draft' ? '#014a79' : 'white' }}; border: 1px solid #014a79;">
                        Draft
                    </a>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
            <div class="text-muted small">
                Total Berita: <strong>{{ $news->total() }}</strong>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead style="background-color: #014a79; color: white;">
                    <tr>
                        <th class="d-none d-md-table-cell">No</th>
                        <th>Judul</th>
                        <th class="d-none d-lg-table-cell">Rubrik</th>
                        <th class="d-none d-md-table-cell">Status</th>
                        <th class="d-none d-lg-table-cell">Tgl Dibuat</th>
                        <th class="d-none d-lg-table-cell">Tgl Publish</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $i => $n)
                    <tr class="table-row-hover">
                        <td class="d-none d-md-table-cell">{{ $news->firstItem() + $i }}</td>
                        <td>
                            <span class="fw-medium">{{ $n->judul }}</span>
                            <div class="d-md-none small text-muted mt-1">
                                <div>Rubrik: {{ $n->rubrik->nama ?? '-' }}</div>
                                <div>Status: 
                                    @if ($n->status === 'published')
                                        <span class="badge bg-success">Published</span>
                                    @elseif ($n->status === 'draft')
                                        <span class="badge bg-secondary">Draft</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ ucfirst($n->status) }}</span>
                                    @endif
                                </div>
                                <div>Tgl Dibuat: {{ \Carbon\Carbon::parse($n->tanggal_dibuat)->translatedFormat('d M Y H:i') }}</div>
                                <div>Tgl Publish: {{ $n->tanggal_publish ? \Carbon\Carbon::parse($n->tanggal_publish)->translatedFormat('d M Y H:i') : '-' }}</div>
                            </div>
                        </td>
                        <td class="d-none d-lg-table-cell">{{ $n->rubrik->nama ?? '-' }}</td>
                        <td class="d-none d-md-table-cell">
                            @if ($n->status === 'published')
                                <span class="badge bg-success">Published</span>
                            @elseif ($n->status === 'draft')
                                <span class="badge bg-secondary">Draft</span>
                            @else
                                <span class="badge bg-warning text-dark">{{ ucfirst($n->status) }}</span>
                            @endif
                        </td>
                        <td class="d-none d-lg-table-cell">{{ \Carbon\Carbon::parse($n->tanggal_dibuat)->translatedFormat('d M Y H:i') }}</td>
                        <td class="d-none d-lg-table-cell">{{ $n->tanggal_publish ? \Carbon\Carbon::parse($n->tanggal_publish)->translatedFormat('d M Y H:i') : '-' }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.news.edit', $n->id) }}"
                                   class="btn btn-sm btn-outline-primary" title="Edit"
                                   style="border-color: #4797ec; color: #4797ec;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $n->id) }}" method="POST" class="d-inline delete-news-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-delete-news" data-title="{{ $n->judul }}"
                                            style="border-color: #dc3545; color: #dc3545;">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center justify-content-md-end">
            {{ $news->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@push('styles')
<style>
    .table {
        border-radius: 0.5rem;
        overflow: hidden;
        border: 1px solid #dee2e6;
    }
    .table-row-hover:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease-in-out;
    }
    .btn, .btn-outline-primary, .btn-outline-danger {
        transition: all 0.3s ease;
    }
    .btn:hover, .btn-outline-primary:hover, .btn-outline-danger:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .badge {
        padding: 0.5em 0.8em;
        font-size: 0.85rem;
    }
    .input-group-sm {
        max-width: 300px;
    }
    .input-group:focus-within {
        box-shadow: 0 0 0 0.2rem rgba(71, 151, 236, 0.25);
    }

    @media (max-width: 767.98px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .table {
            font-size: 0.85rem;
        }
        .table td {
            padding: 0.5rem;
        }
        .btn-group .btn {
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem;
        }
        .input-group-sm {
            max-width: 100%;
        }
        .badge {
            font-size: 0.75rem;
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .table {
            font-size: 0.9rem;
        }
        .table td, .table th {
            padding: 0.75rem;
        }
        .input-group-sm {
            max-width: 250px;
        }
    }

    @media (min-width: 992px) {
        .table {
            font-size: 0.95rem;
        }
        .table td, .table th {
            padding: 1rem;
        }
        .input-group-sm {
            max-width: 300px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.btn-delete-news').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-news-form');
            const title = this.dataset.title;

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                html: `Berita <strong>${title}</strong> akan dihapus secara permanen.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                showClass: { popup: 'animate__animated animate__fadeIn' },
                hideClass: { popup: 'animate__animated animate__fadeOut' }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endpush
@endsection