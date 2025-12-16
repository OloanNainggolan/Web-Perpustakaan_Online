@extends('layout.master')

@section('title')
    Halaman Detail Genre
@endsection

@section('section-title') 
    Detail Genre
@endsection

@section('content')
    <div class="container mt-4">
        {{-- Back Button --}}
        <div class="mb-3">
            <a href="/genres" class="btn btn-outline-primary rounded-pill">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Genre
            </a>
        </div>

        {{-- Genre Header Card --}}
        <div class="card border-0 shadow-lg rounded-4 mb-4 overflow-hidden">
            <div class="card-body p-5 text-center" style="background: linear-gradient(135deg, #0d6efd, #0dcaf0);">
                <div class="mb-3">
                    <div class="bg-white bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center" 
                         style="width: 100px; height: 100px;">
                        <i class="bi bi-bookmark-star-fill text-white" style="font-size: 3rem;"></i>
                    </div>
                </div>
                <h1 class="text-white fw-bold mb-3">{{ $genres->name }}</h1>
                <p class="text-white-50 lead mb-4" style="max-width: 800px; margin: 0 auto;">
                    {{ $genres->description }}
                </p>
                <div class="d-inline-flex align-items-center gap-3">
                    <div class="bg-white bg-opacity-25 rounded-pill px-4 py-2">
                        <i class="bi bi-book text-white me-2"></i>
                        <strong class="text-white">{{ $genres->books->count() }} Buku</strong>
                    </div>
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="/genres/{{ $genres->id }}/edit" class="btn btn-warning rounded-pill px-4">
                                <i class="bi bi-pencil me-2"></i>Edit Genre
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>

        {{-- Books Grid --}}
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-light border-0 py-4">
                <h4 class="mb-0 text-dark fw-bold">
                    <i class="bi bi-collection-fill me-2 text-primary"></i>Koleksi Buku
                </h4>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    @forelse ($genres->books as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card shadow-sm border-0 rounded-4 h-100 book-card position-relative overflow-hidden">
                                {{-- Stock Badge --}}
                                <div class="position-absolute top-0 end-0 m-3" style="z-index: 1;">
                                    @if($item->stok > 0)
                                        <span class="badge bg-success px-3 py-2 rounded-pill shadow">
                                            <i class="bi bi-check-circle me-1"></i>Tersedia
                                        </span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2 rounded-pill shadow">
                                            <i class="bi bi-x-circle me-1"></i>Habis
                                        </span>
                                    @endif
                                </div>

                                {{-- Book Image --}}
                                <div class="position-relative" style="height: 250px; overflow: hidden;">
                                    <img src="{{ asset('images/' . $item->image) }}"
                                         class="card-img-top h-100 w-100"
                                         style="object-fit: cover; transition: transform 0.4s ease;" 
                                         alt="{{ $item->title }}"
                                         onmouseover="this.style.transform='scale(1.1)'"
                                         onmouseout="this.style.transform='scale(1)'">
                                </div>

                                {{-- Card Body --}}
                                <div class="card-body d-flex flex-column p-4">
                                    <h5 class="card-title fw-bold text-primary mb-2" style="min-height: 50px; font-size: 1.1rem;">
                                        {{ Str::limit($item->title, 45) }}
                                    </h5>

                                    <p class="card-text text-muted small mb-3 flex-grow-1" style="min-height: 60px;">
                                        {{ Str::limit($item->summary, 80) }}
                                    </p>

                                    <a href="/books/{{ $item->id }}" class="btn btn-primary rounded-pill fw-semibold w-100">
                                        <i class="bi bi-eye-fill me-2"></i>Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card border-0 bg-light text-center py-5 rounded-4">
                                <div class="card-body">
                                    <i class="bi bi-inbox text-muted d-block mb-3" style="font-size: 4rem;"></i>
                                    <h5 class="text-muted mb-2">Belum Ada Buku</h5>
                                    <p class="text-muted small">Belum ada buku dalam genre ini. Tunggu update selanjutnya!</p>
                                    @auth
                                        @if(auth()->user()->role === 'admin')
                                            <a href="/books/create" class="btn btn-primary mt-3 rounded-pill px-4">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Buku
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

<style>
    .book-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .book-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2) !important;
    }
    .btn {
        transition: all 0.2s ease;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
</style>
@endsection
