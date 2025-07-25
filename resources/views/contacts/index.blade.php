@extends('layouts.app')

@section('title', 'Pesan Masuk | Tigatra Adikara')

@section('content')
<div class="container-fluid py-4">
    {{-- Header Halaman: Judul, Deskripsi, dan Statistik Total Pesan --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0 text-primary fw-bold">Pesan Kontak Masuk</h3>
            <p class="text-muted mb-0">Kelola semua pesan yang masuk dari pengunjung situs web Anda.</p>
        </div>
        {{-- Total Pesan (Di sisi kanan atas) - DIKECILKAN --}}
        <div class="card bg-primary text-white shadow-sm border-0 rounded-pill px-3 py-1"> {{-- px-3 dan py-1 lebih kecil --}}
            <h6 class="mb-0 fw-bold small"> {{-- h6 dan small untuk tulisan lebih kecil --}}
                <i class="bi bi-inbox-fill me-2"></i>Total Pesan: {{ $totalContacts ?? 0 }}
            </h6>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-lg shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- KONTROL FILTER & SEARCH --}}
    <div class="card shadow-sm border-0 rounded-lg mb-4">
        <div class="card-body py-3">
            <form id="filterForm" action="{{ route('contacts.index') }}" method="GET" class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                {{-- Filter Dropdowns (kiri) --}}
                <div class="d-flex flex-wrap gap-2">
                    <select name="status" class="form-select rounded-pill shadow-sm" style="width: auto; min-width: 150px;" onchange="this.form.submit()">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                        <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                    </select>

                    <select name="sort_date" class="form-select rounded-pill shadow-sm" style="width: auto; min-width: 150px;" onchange="this.form.submit()">
                        <option value="">Urutkan Tanggal</option>
                        <option value="desc" {{ request('sort_date') == 'desc' ? 'selected' : '' }}>Terbaru</option>
                        <option value="asc" {{ request('sort_date') == 'asc' ? 'selected' : '' }}>Terlama</option>
                    </select>
                </div>

                {{-- Search Input (kanan) --}}
                <div class="input-group flex-grow-1" style="max-width: 280px;">
                    <input type="text" class="form-control rounded-pill border-0 shadow-sm" placeholder="Cari pesan..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary rounded-pill ms-2" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    {{-- Informasi Ringkasan Pagination (Dikeluarkan dari Card) --}}
    @if(isset($contacts) && $contacts instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
    <div class="mb-3 text-muted small text-end">
        Menampilkan {{ $contacts->firstItem() ?? 0 }} - {{ $contacts->lastItem() ?? 0 }} dari **{{ $contacts->total() ?? 0 }}** pesan.
    </div>
    @endif

    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light text-secondary text-uppercase fw-semibold">
                        <tr>
                            <th class="py-3 px-4" style="width: 50px;">No.</th>
                            <th class="py-3 px-4">Nama</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Subjek</th>
                            <th class="py-3 px-4">Pesan</th>
                            <th class="py-3 px-4">Tanggal</th>
                            <th class="py-3 px-4 text-center" style="width: 170px;">Status & Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $i => $c)
                            <tr class="{{ !$c->is_read ? 'table-warning fw-semibold' : '' }}">
                                <td class="align-middle px-4">{{ ($contacts->currentPage() - 1) * $contacts->perPage() + $i + 1 }}</td>
                                <td class="align-middle px-4">{{ $c->nama }}</td>
                                <td class="align-middle px-4">{{ $c->email }}</td>
                                <td class="align-middle px-4">{{ $c->subjek }}</td>
                                <td class="align-middle px-4">
                                    {{ Str::limit($c->pesan, 60) }}
                                    @if(strlen($c->pesan) > 60)
                                        <a href="#" class="text-primary text-decoration-none small" data-bs-toggle="modal" data-bs-target="#detailPesanModal{{ $c->id }}">Baca Selengkapnya</a>
                                    @endif
                                </td>
                                <td class="align-middle px-4 text-muted small">{{ \Carbon\Carbon::parse($c->created_at)->format('d M Y, H:i') }}</td>
                                <td class="align-middle text-center px-4">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        @if(!$c->is_read)
                                            <span class="badge bg-danger rounded-pill px-3 py-2">Baru</span>
                                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#markAsReadModal{{ $c->id }}" title="Tandai Sudah Dibaca"><i class="bi bi-check-circle"></i></button>
                                        @else
                                            <span class="badge bg-success-subtle text-success border border-success rounded-pill px-3 py-2">Dibaca</span>
                                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#detailPesanModal{{ $c->id }}" title="Lihat Detail"><i class="bi bi-eye"></i></button>
                                        @endif
                                        <button type="button" class="btn btn-sm btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#hapusPesanModal{{ $c->id }}" title="Hapus Pesan"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox me-2"></i>Belum ada pesan masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if(isset($contacts) && $contacts instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $contacts->hasPages())
            <div class="card-footer bg-light border-0">
                {{ $contacts->appends(request()->input())->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

    {{-- MODAL DETAIL PESAN --}}
    @foreach($contacts as $c)
    <div class="modal fade" id="detailPesanModal{{ $c->id }}" tabindex="-1" aria-labelledby="detailPesanModalLabel{{ $c->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-lg border-0">
                <div class="modal-header bg-primary text-white p-4 rounded-top-lg">
                    <h5 class="modal-title" id="detailPesanModalLabel{{ $c->id }}"><i class="bi bi-envelope-open me-2"></i>Detail Pesan dari {{ $c->nama }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted">Nama:</div>
                        <div class="col-sm-9 fw-semibold">{{ $c->nama }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted">Email:</div>
                        <div class="col-sm-9"><a href="mailto:{{ $c->email }}">{{ $c->email }}</a></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted">Nomor HP:</div>
                        <div class="col-sm-9">{{ $c->nomor_hp ?: '-' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted">Subjek:</div>
                        <div class="col-sm-9 fw-semibold text-primary">{{ $c->subjek }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted">Tanggal:</div>
                        <div class="col-sm-9">{{ \Carbon\Carbon::parse($c->created_at)->format('d F Y, H:i') }}</div>
                    </div>
                    <hr>
                    <div class="mb-2 fw-semibold text-secondary">Isi Pesan:</div>
                    <div class="card card-body bg-light border-0 shadow-sm p-3">
                        <p class="mb-0 text-break">{{ $c->pesan }}</p>
                    </div>
                </div>
                <div class="modal-footer p-3 bg-light border-top rounded-bottom-lg">
                    @if(!$c->is_read)
                        <a href="{{ route('contacts.markAsRead', $c->id) }}" class="btn btn-primary fw-semibold"><i class="bi bi-check-circle me-2"></i>Tandai Sudah Dibaca</a>
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL KONFIRMASI TANDAI SUDAH DIBACA --}}
    @if(!$c->is_read)
    <div class="modal fade" id="markAsReadModal{{ $c->id }}" tabindex="-1" aria-labelledby="markAsReadModalLabel{{ $c->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content shadow-lg rounded-lg border-0">
                <div class="modal-header bg-primary text-white p-3 rounded-top-lg">
                    <h5 class="modal-title" id="markAsReadModalLabel{{ $c->id }}"><i class="bi bi-envelope-check me-2"></i>Tandai Pesan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="mb-4">Tandai pesan dari <strong class="text-primary">{{ $c->nama }}</strong> ini sebagai sudah dibaca?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <a href="{{ route('contacts.markAsRead', $c->id) }}" class="btn btn-primary fw-semibold px-4"><i class="bi bi-check-lg me-2"></i>Ya, Tandai</a>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- MODAL KONFIRMASI HAPUS PESAN --}}
    <div class="modal fade" id="hapusPesanModal{{ $c->id }}" tabindex="-1" aria-labelledby="hapusPesanModalLabel{{ $c->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <form action="{{ route('contacts.destroy', $c->id) }}" method="POST" class="modal-content shadow-lg rounded-lg border-0">
                @csrf
                @method('DELETE')
                <div class="modal-header bg-danger text-white p-3 rounded-top-lg">
                    <h5 class="modal-title" id="hapusPesanModalLabel{{ $c->id }}"><i class="bi bi-trash-fill me-2"></i>Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="mb-4">Apakah Anda yakin ingin menghapus pesan dari <strong class="text-danger">{{ $c->nama }}</strong>?</p>
                    <small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
                </div>
                <div class="modal-footer d-flex justify-content-center p-3 bg-light border-top rounded-bottom-lg">
                    <button type="submit" class="btn btn-danger fw-semibold px-4"><i class="bi bi-trash me-2"></i>Ya, Hapus</button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

</div>
@endsection