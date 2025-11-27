@extends('layout.master')

@section('title')
    Halaman Detail Genre
@endsection

@section('section-title') 
    <span class="fw-bold text-dark display-6">HALAMAN DETAIL GENRE</span>
@endsection

@section('content')
    @auth
        <div class="container mt-5">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header text-white text-center py-4"
                     style="background: linear-gradient(135deg, #14532d, #1abc9c); border-top-left-radius: 1.5rem; border-top-right-radius: 1.5rem;">
                    <h3 class="mb-0">Detail Genre</h3>
                </div>

                <div class="card-body px-5 py-4 bg-light rounded-bottom-4">
                    <h2 class="text-success fw-bold mb-3">{{ $genres->name }}</h2>
                    <p class="text-secondary fs-5" style="text-align: justify;">
                        {{ $genres->description }}
                    </p>

                    <hr>

                    <div class="row g-4">
                        @forelse ($genres->books as $item)
                            <div class="col-lg-4 col-md-6 d-flex">
                                <div class="card shadow-sm border-0 rounded-4 w-100 h-100 book-card">
                                    <img src="{{ asset('images/' . $item->image) }}"
                                         class="card-img-top rounded-top-4 object-fit-cover"
                                         style="height: 220px; width: 100%; object-fit: cover;" 
                                         alt="{{ $item->title }}">

                                    <div class="card-body d-flex flex-column justify-content-between p-4" style="background-color: #fcfcfc;">
                                        <h5 class="card-title fw-bold text-success" style="font-size: 1.25rem;">
                                            {{ $item->title }}
                                        </h5>

                                        <p class="card-text text-muted mb-3" style="text-align: justify;">
                                            {{ Str::limit($item->summary, 100) }}
                                        </p>

                                        <div class="d-grid gap-2 mt-auto">
                                            <a href="/books/{{ $item->id }}" class="btn btn-outline-success rounded-pill fw-semibold">
                                                📘 Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center">Tidak ada buku pada genre ini.</p>
                        @endforelse
                    </div>

                    <div class="mt-4">
                        <a href="/genres" 
                           class="btn btn-secondary px-4 py-2 fw-semibold shadow-sm rounded-pill">
                            ← Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Jika user tidak login --}}
        <div class="container mt-5">
            <div class="alert alert-warning text-center rounded-pill shadow-sm">
                ⚠️ Anda harus login untuk melihat detail genre.
            </div>
            <div class="text-center">
                <a href="/login" class="btn btn-success px-4 py-2 fw-semibold shadow-sm rounded-pill">
                    Login Sekarang
                </a>
            </div>
        </div>
    @endauth
@endsection
