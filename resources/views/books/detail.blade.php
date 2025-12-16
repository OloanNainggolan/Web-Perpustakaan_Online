@extends('layout.master')

@section('title')
    Detail Buku
@endsection

@section('section-title')
    <h2 class="text-center text-dark fw-bold">📖 DETAIL BUKU</h2>
@endsection

@section('content')
@if($book)
    {{-- Back Button --}}
    <div class="mb-3">
        <a href="/books" class="btn btn-outline-success rounded-pill">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Buku
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                {{-- Left Column: Book Details --}}
                <div class="col-lg-8 mb-4">
                    <!-- Book Detail Card -->
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        {{-- Book Header dengan Image Background --}}
                        <div class="position-relative">
                            <img src="{{ asset('images/' . $book->image) }}" 
                                 class="w-100" 
                                 style="height: 350px; object-fit: cover;"
                                 alt="{{ $book->title }}">
                            <div class="position-absolute bottom-0 start-0 w-100 p-4" 
                                 style="background: linear-gradient(to top, rgba(0,0,0,0.85), transparent);">
                                <h2 class="fw-bold text-white mb-2">{{ $book->title }}</h2>
                                <span class="badge bg-success px-3 py-2 me-2">
                                    <i class="bi bi-bookmark-fill me-1"></i>{{ $book->genre->name }}
                                </span>
                            </div>
                        </div>

                        {{-- Book Info --}}
                        <div class="card-body p-4">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-success-subtle rounded-3 p-3 me-3">
                                            <i class="bi bi-box-seam fs-4 text-success"></i>
                                        </div>
                                        <div>
                                            <p class="text-muted mb-0 small">Stok Tersedia</p>
                                            <h4 class="fw-bold mb-0">{{ $book->stok }} Unit</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-info-subtle rounded-3 p-3 me-3">
                                            <i class="bi bi-chat-dots fs-4 text-info"></i>
                                        </div>
                                        <div>
                                            <p class="text-muted mb-0 small">Total Review</p>
                                            <h4 class="fw-bold mb-0">{{ $book->comments->count() }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Summary --}}
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3">
                                    <i class="bi bi-file-text text-success me-2"></i>Ringkasan Buku
                                </h5>
                                <p class="text-secondary lh-lg" style="text-align: justify;">{{ $book->summary }}</p>
                            </div>

                            {{-- Admin Actions --}}
                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <div class="border-top pt-4">
                                        <h6 class="text-muted mb-3">
                                            <i class="bi bi-gear me-2"></i>Admin Actions
                                        </h6>
                                        <div class="d-flex gap-2">
                                            <a href="/books/{{ $book->id }}/edit" class="btn btn-warning rounded-pill px-4">
                                                <i class="bi bi-pencil-square me-2"></i>Edit Buku
                                            </a>
                                            <form action="/books/{{ $book->id }}" method="POST" 
                                                  onsubmit="return confirm('⚠️ Yakin ingin menghapus buku ini?\nData tidak dapat dikembalikan!')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-pill px-4">
                                                    <i class="bi bi-trash me-2"></i>Hapus Buku
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

                {{-- Right Column: Comments --}}
                <div class="col-lg-4">
                    <div class="card border-0 shadow-lg rounded-4 sticky-top" style="top: 20px;">

                        {{-- Comments Header --}}
                        <div class="card-header border-0 py-4" style="background: linear-gradient(135deg, #198754, #20c997);">
                            <h5 class="mb-0 fw-bold text-white">
                                <i class="bi bi-chat-left-quote-fill me-2"></i>Review & Komentar
                            </h5>
                            <p class="mb-0 text-white-50 small">{{ $book->comments->count() }} review</p>
                        </div>
                        
                        {{-- Comments List --}}
                        <div class="card-body p-0" style="max-height: 450px; overflow-y: auto;">
                            @if($book->comments && $book->comments->count() > 0)
                                @foreach($book->comments as $comment)
                                    <div class="p-4 border-bottom hover-bg">
                                        <div class="d-flex align-items-start mb-2">
                                            <div class="bg-success-subtle rounded-circle p-2 me-3">
                                                <i class="bi bi-person-fill text-success fs-5"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-start mb-1">
                                                    <strong class="text-success">{{ $comment->user->name ?? 'Anonymous' }}</strong>
                                                    <small class="badge bg-light text-dark">
                                                        <i class="bi bi-clock me-1"></i>{{ $comment->created_at->diffForHumans() }}
                                                    </small>
                                                </div>
                                                <p class="text-secondary mb-0 small">{{ $comment->comments }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-5">
                                    <i class="bi bi-chat-left-text text-muted" style="font-size: 3rem;"></i>
                                    <p class="text-muted mt-3 mb-0">Belum ada review</p>
                                    <p class="text-muted small">Jadilah yang pertama memberikan review!</p>
                                </div>
                            @endif
                        </div>
                        
                        {{-- Comment Form --}}
                        @auth
                            <div class="card-footer bg-light border-0 p-4">
                                <form action="/comment/{{ $book->id }}" method="POST">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                            <i class="bi bi-exclamation-triangle me-2"></i>
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label class="form-label fw-bold small text-muted">
                                            <i class="bi bi-pencil me-1"></i>Tulis Review Anda
                                        </label>
                                        <textarea name="comments" class="form-control border-0 shadow-sm" rows="4" 
                                                  placeholder="Bagikan pendapat Anda tentang buku ini..." 
                                                  required>{{ old('comments') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 rounded-pill py-2">
                                        <i class="bi bi-send-fill me-2"></i>Kirim Review
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="card-footer bg-light border-0 text-center p-4">
                                <i class="bi bi-lock fs-1 text-muted d-block mb-3"></i>
                                <p class="text-muted mb-3">Login untuk memberikan review</p>
                                <a href="/login" class="btn btn-success rounded-pill px-4">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login Sekarang
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="card border-0 shadow-sm text-center py-5 rounded-4">
        <div class="card-body">
            <i class="bi bi-exclamation-triangle text-danger" style="font-size: 5rem;"></i>
            <h3 class="text-danger mt-4">Buku Tidak Ditemukan</h3>
            <p class="text-muted mb-4">Maaf, buku yang Anda cari tidak tersedia</p>
            <a href="/books" class="btn btn-success btn-lg rounded-pill px-4">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Buku
            </a>
        </div>
    </div>
@endif

<style>
    .hover-bg:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
    }
    .sticky-top {
        position: sticky !important;
    }
</style>
@endsection
