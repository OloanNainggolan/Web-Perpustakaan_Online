@extends('layout.master')

@section('title')
    Tampil Buku
@endsection

@section('section-title')
    <h1 class="fw-bold text-success text-center mb-5">📚 Daftar Buku</h1>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div><strong>Berhasil!</strong> {{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Statistics Section --}}
    @if(count($books) > 0)
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center py-3" style="background: linear-gradient(135deg, #e3f2fd, #bbdefb);">
                    <div class="card-body">
                        <i class="bi bi-journals text-primary fs-1 mb-2"></i>
                        <h3 class="fw-bold mb-0 text-primary">{{ count($books) }}</h3>
                        <p class="text-muted mb-0 small">Total Buku</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center py-3" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
                    <div class="card-body">
                        <i class="bi bi-bookmark-star text-success fs-1 mb-2"></i>
                        <h3 class="fw-bold mb-0 text-success">{{ \App\Models\Genre::count() }}</h3>
                        <p class="text-muted mb-0 small">Kategori Genre</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center py-3" style="background: linear-gradient(135deg, #fff3e0, #ffe0b2);">
                    <div class="card-body">
                        <i class="bi bi-chat-dots text-warning fs-1 mb-2"></i>
                        <h3 class="fw-bold mb-0 text-warning">{{ \App\Models\Comment::count() }}</h3>
                        <p class="text-muted mb-0 small">Total Review</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @auth
        @if (auth()->user()->role === 'admin')
            <div class="text-center mb-4">
                <a href="{{ url('books/create') }}" class="btn btn-success btn-lg px-5 py-3 fw-semibold shadow-lg rounded-pill"
                   style="background: linear-gradient(135deg, #198754, #20c997);">
                    <i class="bi bi-plus-circle-fill me-2"></i>Tambah Buku Baru
                </a>
            </div>
        @endif
    @endauth

    <div class="row g-4">
        @forelse($books as $book)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card shadow-sm border-0 rounded-4 h-100 book-card position-relative overflow-hidden">
                    {{-- Genre Badge --}}
                    <div class="position-absolute top-0 start-0 m-3" style="z-index: 1;">
                        <span class="badge bg-success px-3 py-2 rounded-pill shadow">
                            <i class="bi bi-bookmark-fill me-1"></i>{{ $book->genre->name }}
                        </span>
                    </div>

                    {{-- Book Image --}}
                    <div class="position-relative" style="height: 280px; overflow: hidden;">
                        <img src="{{ asset('images/' . $book->image) }}"
                             class="card-img-top h-100 w-100"
                             style="object-fit: cover; transition: transform 0.4s ease;" 
                             alt="{{ $book->title }}"
                             onmouseover="this.style.transform='scale(1.1)'"
                             onmouseout="this.style.transform='scale(1)'">
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title fw-bold text-success mb-2" style="min-height: 50px; font-size: 1.1rem;">
                            {{ Str::limit($book->title, 45) }}
                        </h5>

                        <p class="card-text text-muted small mb-3 flex-grow-1" style="min-height: 60px;">
                            {{ Str::limit($book->summary, 80) }}
                        </p>

                        {{-- Stock Badge --}}
                        <div class="mb-3">
                            @if($book->stok > 0)
                                <span class="badge bg-success-subtle text-success">
                                    <i class="bi bi-check-circle me-1"></i>Stok: {{ $book->stok }}
                                </span>
                            @else
                                <span class="badge bg-danger-subtle text-danger">
                                    <i class="bi bi-x-circle me-1"></i>Stok Habis
                                </span>
                            @endif
                        </div>

                        {{-- Action Buttons --}}
                        <div class="d-grid gap-2 mt-auto">
                            <a href="/books/{{ $book->id }}" class="btn btn-success rounded-pill fw-semibold">
                                <i class="bi bi-eye-fill me-2"></i>Lihat Detail
                            </a>
                            
                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <div class="d-flex gap-2">
                                        <a href="/books/{{ $book->id }}/edit" class="btn btn-warning rounded-pill fw-semibold flex-fill">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form action="/books/{{ $book->id }}" method="POST" class="flex-fill" 
                                              onsubmit="return confirm('⚠️ Yakin ingin menghapus buku ini?\nData tidak dapat dikembalikan!')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-pill fw-semibold w-100">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
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
                        <h4 class="text-muted mb-3">Belum Ada Buku Tersedia</h4>
                        <p class="text-muted mb-4">Saat ini belum ada buku dalam koleksi kami</p>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="/books/create" class="btn btn-success btn-lg rounded-pill px-4">
                                    <i class="bi bi-plus-circle me-2"></i>Tambah Buku Pertama
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <style>
        .book-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .book-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2) !important;
        }

        .btn {
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 576px) {
            .card-title {
                font-size: 1rem;
            }
            .card-text {
                font-size: 0.85rem;
            }
        }
    </style>
@endsection