@extends('layouts.app')

@section('title', 'Pesan Masuk | Tigatra Adikara')

@section('content')
<div class="container-fluid mt-4">
    {{-- SweetAlert Flash Message --}}
    @foreach (['success' => 'success', 'error' => 'error', 'deleted' => 'warning'] as $key => $type)
    @if(session($key))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: '{{ $type }}',
                title: '{{ ucfirst($key) }}!',
                text: @json(session($key)),
                showConfirmButton: {
                    {
                        $key == 'error' ? 'true' : 'false'
                    }
                },
                confirmButtonText: 'OK',
                timer: {
                    {
                        $key == 'error' ? 'null' : '1600'
                    }
                },
                timerProgressBar: true,
                toast: false,
                position: 'center'
            });
        });
    </script>
    @endif
    @endforeach

    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">Manajemen Pesan Masuk</h5>
                    <p class="text-muted mb-0">Kelola semua pesan yang masuk dari pengunjung website.</p>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <span class="text-muted">Total Pesan:</span>
                        <span class="fw-bold ">{{ $totalMessages }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Form Pencarian --}}
            <div class="row mb-4">
                <div class="col-md-6 offset-md-3">
                    <form action="{{ route('contact_messages.index') }}" method="GET" class="d-flex">
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted border-end-0 rounded-start-pill"><i class="bi bi-search"></i></span>
                            <input type="text" name="search" class="form-control border-start-0 rounded-end-pill" placeholder="Cari berdasarkan nama, email, alamat, atau pesan..." value="{{ request('search') }}">
                            <button class="btn btn-primary rounded-pill ms-2" type="submit">Cari</button>
                            @if(request('search'))
                            <a href="{{ route('contact_messages.index') }}" class="btn btn-outline-secondary rounded-pill ms-2">Reset</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="bg-info text-white">
                        <tr>
                            <th scope="col" style="width: 5%;">#</th>
                            <th scope="col" style="width: 15%;">Nama Pengirim</th>
                            <th scope="col" style="width: 20%;">Email</th>
                            <th scope="col" style="width: 20%;">Alamat</th>
                            <th scope="col" style="width: 15%;">Pesan</th> {{-- Sesuaikan lebar agar tidak terlalu besar --}}
                            <th scope="col" style="width: 10%;">Status</th>
                            <th scope="col" style="width: 15%;">Aksi</th> {{-- Lebar aksi disesuaikan --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contactMessages as $message)
                        <tr class="{{ $message->is_read ? 'table-light' : 'fw-bold' }}">
                            <td>{{ $loop->iteration + ($contactMessages->currentPage() - 1) * $contactMessages->perPage() }}</td>
                            <td>{{ $message->first_name }} {{ $message->last_name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>
                                {{ Str::limit($message->address, 30, '...') ?: '-' }}
                                @if ($message->city)
                                , {{ $message->city }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('contact_messages.show', $message->id) }}" class="text-primary text-decoration-underline fw-normal" title="Lihat detail pesan">
                                    Baca Selengkapnya
                                </a>

                            </td>
                            <td>
                                <span class="badge {{ $message->is_read ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $message->is_read ? 'Sudah Dibaca' : 'Belum Dibaca' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('contact_messages.show', $message->id) }}" class="btn btn-sm btn-outline-primary" title="Lihat Detail"> {{-- KOREKSI RUTE: tambahkan '' --}}
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('contact_messages.destroy', $message->id) }}"
                                    method="POST"
                                    class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Pesan">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Tidak ada pesan masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $contactMessages->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.form-delete').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); 

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
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