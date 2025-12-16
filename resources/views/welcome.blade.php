@extends('layout.master')

@section('title')
     Home
@endsection

@section('content')
<div class="container py-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @auth
        <!-- Dashboard untuk User yang Sudah Login -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #198754, #20c997);">
                    <div class="card-body p-4 text-white">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="fw-bold mb-2">
                                    <i class="bi bi-emoji-smile me-2"></i>Selamat Datang Kembali, {{auth()->user()->name}}!
                                </h2>
                                <p class="mb-2 opacity-90">
                                    <i class="bi bi-shield-check me-2"></i>Role: 
                                    <span class="badge bg-white text-success px-3 py-2">
                                        {{ ucfirst(auth()->user()->role) }}
                                    </span>
                                    @if (Auth()->user()->profile)
                                        <span class="badge bg-white text-info px-3 py-2 ms-2">
                                            <i class="bi bi-person me-1"></i>{{Auth()->user()->profile->age}} Tahun
                                        </span>
                                    @else
                                        <a href="/profile" class="badge bg-warning text-dark px-3 py-2 ms-2 text-decoration-none">
                                            <i class="bi bi-exclamation-triangle me-1"></i>Lengkapi Profil
                                        </a>
                                    @endif
                                </p>
                                <p class="mb-0 small opacity-75">
                                    <i class="bi bi-clock me-1"></i>Login terakhir: {{ now()->format('d F Y, H:i') }}
                                </p>
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="bi bi-person-circle" style="font-size: 5rem; opacity: 0.3;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(auth()->user()->role === 'admin')
            <!-- Admin Statistics -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-book-fill fs-1 text-primary mb-3"></i>
                            <h3 class="fw-bold mb-1">{{ \App\Models\Book::count() }}</h3>
                            <p class="text-muted mb-0">Total Buku</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-bookmark-star-fill fs-1 text-success mb-3"></i>
                            <h3 class="fw-bold mb-1">{{ \App\Models\Genre::count() }}</h3>
                            <p class="text-muted mb-0">Total Genre</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-people-fill fs-1 text-info mb-3"></i>
                            <h3 class="fw-bold mb-1">{{ \App\Models\User::count() }}</h3>
                            <p class="text-muted mb-0">Total User</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-chat-dots-fill fs-1 text-warning mb-3"></i>
                            <h3 class="fw-bold mb-1">{{ \App\Models\Comment::count() }}</h3>
                            <p class="text-muted mb-0">Total Komentar</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions for Admin -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-light py-3">
                            <h5 class="mb-0 fw-bold">
                                <i class="bi bi-lightning-charge-fill text-warning me-2"></i>Quick Actions
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <a href="/books/create" class="btn btn-success w-100 py-3 rounded-3">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Buku
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/genres/create" class="btn btn-primary w-100 py-3 rounded-3">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Genre
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/books" class="btn btn-outline-success w-100 py-3 rounded-3">
                                        <i class="bi bi-list-ul me-2"></i>Kelola Buku
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/genres" class="btn btn-outline-primary w-100 py-3 rounded-3">
                                        <i class="bi bi-list-ul me-2"></i>Kelola Genre
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Latest Books Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold mb-0">
                        <i class="bi bi-stars text-warning me-2"></i>Buku Terbaru
                    </h3>
                    <a href="/books" class="btn btn-outline-success rounded-pill">
                        Lihat Semua <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            @php
                $latestBooks = \App\Models\Book::latest()->take(3)->get();
            @endphp
            
            @forelse($latestBooks as $book)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 hover-card">
                        <img src="{{ asset('images/' . $book->image) }}" 
                             class="card-img-top" 
                             style="height: 250px; object-fit: cover;" 
                             alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-success">{{ $book->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($book->summary, 100) }}</p>
                            <a href="/books/{{ $book->id }}" class="btn btn-success rounded-pill w-100">
                                <i class="bi bi-eye me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                    <h5 class="text-muted">Belum ada buku tersedia</h5>
                    @if(auth()->user()->role === 'admin')
                        <a href="/books/create" class="btn btn-success mt-3">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Buku Pertama
                        </a>
                    @endif
                </div>
            @endforelse
        </div>

    @else
        <!-- Landing Page untuk Guest -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-3 fw-bold text-success mb-3">
                    <i class="bi bi-book-half me-2"></i>BookZone
                </h1>
                <h2 class="h3 text-secondary mb-3">Platform Review Buku Terlengkap</h2>
                <p class="lead text-muted mb-4">
                    Temukan, baca, dan bagikan review buku favorit Anda. Bergabunglah dengan komunitas pecinta buku!
                </p>
                
                <div class="d-flex gap-2 flex-wrap">
                    <a href="/register" class="btn btn-success btn-lg px-4 rounded-pill">
                        <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                    </a>
                    <a href="/login" class="btn btn-outline-success btn-lg px-4 rounded-pill">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </a>
                    <a href="/books" class="btn btn-outline-primary btn-lg px-4 rounded-pill">
                        <i class="bi bi-book me-2"></i>Lihat Buku
                    </a>
                </div>
            </div>
            
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=800&h=600&fit=crop" 
                     alt="Books" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>

        <!-- Features Section -->
        <div class="row g-4 mb-5">
            <div class="col-12">
                <h3 class="text-center fw-bold mb-4">
                    <i class="bi bi-star-fill text-warning me-2"></i>Keunggulan BookZone
                </h3>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 hover-card">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="bi bi-chat-quote fs-1 text-success"></i>
                        </div>
                        <h5 class="card-title fw-bold">Review & Komentar</h5>
                        <p class="card-text text-muted">
                            Baca dan bagikan review buku dari komunitas pembaca aktif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 hover-card">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="bi bi-collection fs-1 text-primary"></i>
                        </div>
                        <h5 class="card-title fw-bold">Koleksi Lengkap</h5>
                        <p class="card-text text-muted">
                            Akses ribuan buku dari berbagai genre dan kategori
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 hover-card">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="bi bi-people fs-1 text-info"></i>
                        </div>
                        <h5 class="card-title fw-bold">Komunitas Aktif</h5>
                        <p class="card-text text-muted">
                            Bergabung dengan ribuan pecinta buku di seluruh Indonesia
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works Section - Only for Guest -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-gradient text-white text-center py-4" 
                         style="background: linear-gradient(135deg, #198754, #20c997);">
                        <h3 class="mb-0 fw-bold">
                            <i class="bi bi-lightbulb me-2"></i>Cara Bergabung
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="flex-shrink-0">
                                <span class="badge bg-success rounded-circle p-3 fs-5">1</span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold">Kunjungi Website</h5>
                                <p class="text-muted mb-0">Anda sudah berada di tempat yang tepat!</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-3">
                            <div class="flex-shrink-0">
                                <span class="badge bg-success rounded-circle p-3 fs-5">2</span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold">Daftar Akun</h5>
                                <p class="text-muted mb-0">
                                    Daftar gratis melalui <a href="/register" class="text-success fw-bold">Form Registrasi</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <span class="badge bg-success rounded-circle p-3 fs-5">3</span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold">Mulai Membaca</h5>
                                <p class="text-muted mb-0">Jelajahi koleksi buku dan bagikan review Anda!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</div>

<style>
    .hover-card {
        transition: all 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
    }
    .bg-gradient {
        background: linear-gradient(135deg, #198754, #20c997);
    }
</style>

@endsection
