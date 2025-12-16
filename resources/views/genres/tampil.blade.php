@extends('layout.master')

@section('title')
    Tampil Genre
@endsection

@section('section-title')
    Daftar Genre Buku
@endsection

@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #198754, #20c997);">
            <h2 class="mb-0 fw-semibold"><i class="bi bi-bookmark-star me-2"></i>Genre Buku</h2>
        </div>

        <div class="card-body p-5 bg-white">

            {{-- Tombol Tambah Genre hanya untuk admin --}}
            @auth
                @if (auth()->user()->role === 'admin')
                    <div class="d-flex justify-content-end mb-4">
                        <a href="/genres/create"
                           class="btn btn-success px-4 py-2 fw-semibold shadow-sm rounded-pill">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Genre
                        </a>
                    </div>
                @endif
            @endauth

            {{-- Genre Cards Grid --}}
            <div class="row g-4">
                @forelse ($genres as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm hover-card position-relative">
                            {{-- Number Badge --}}
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge rounded-circle bg-primary shadow" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                    <strong style="font-size: 1.2rem;">{{ $loop->iteration }}</strong>
                                </span>
                            </div>
                            
                            <div class="card-body p-4">
                                {{-- Genre Icon --}}
                                <div class="mb-3">
                                    <div class="bg-primary-subtle rounded-3 d-inline-block p-3">
                                        <i class="bi bi-bookmark-fill fs-1 text-primary"></i>
                                    </div>
                                </div>
                                
                                {{-- Genre Name --}}
                                <h4 class="card-title fw-bold text-primary mb-3">{{ $item->name }}</h4>
                                
                                {{-- Genre Description --}}
                                <p class="card-text text-muted mb-3" style="min-height: 60px;">
                                    {{ Str::limit($item->description, 120) }}
                                </p>
                                
                                {{-- Book Count --}}
                                <div class="mb-3">
                                    <span class="badge bg-success-subtle text-success px-3 py-2">
                                        <i class="bi bi-book me-1"></i>{{ $item->books->count() }} Buku
                                    </span>
                                </div>
                                
                                {{-- Action Buttons --}}
                                <div class="d-flex gap-2">
                                    <a href="/genres/{{ $item->id }}" class="btn btn-primary rounded-pill flex-fill">
                                        <i class="bi bi-eye me-2"></i>Lihat Detail
                                    </a>
                                    
                                    @auth
                                        @if (auth()->user()->role === 'admin')
                                            <a href="/genres/{{ $item->id }}/edit" class="btn btn-warning btn-sm rounded-pill" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="/genres/{{ $item->id }}" method="POST" 
                                                  onsubmit="return confirm('⚠️ Yakin ingin menghapus genre ini?\nSemua buku dengan genre ini akan terpengaruh!')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-pill" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm text-center py-5 rounded-4">
                            <div class="card-body">
                                <i class="bi bi-inbox text-muted d-block mb-3" style="font-size: 5rem;"></i>
                                <h4 class="text-muted mb-3">Belum Ada Genre Tersedia</h4>
                                <p class="text-muted mb-4">Saat ini belum ada kategori genre yang tersedia</p>
                                @auth
                                    @if(auth()->user()->role === 'admin')
                                        <a href="/genres/create" class="btn btn-success btn-lg rounded-pill px-4">
                                            <i class="bi bi-plus-circle me-2"></i>Tambah Genre Pertama
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- Style tambahan --}}
<style>
    .hover-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2) !important;
    }

    .btn {
        transition: all 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
