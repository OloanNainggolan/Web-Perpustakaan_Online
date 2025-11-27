@extends('layout.master')

@section('title')
    Tampil Buku
@endsection

@section('section-title')
    <h1 class="fw-bold text-success text-center mb-5">📚 Daftar Buku</h1>
@endsection

@section('content')
    @auth
        @if (auth()->user()->role === 'admin')
            <div class="text-center mb-4">
                <a href="{{ url('books/create') }}" class="btn btn-success px-5 py-2 fw-semibold shadow rounded-pill"
                   style="background: linear-gradient(135deg, #14532d, #1abc9c);">
                    ➕ Tambah Buku
                </a>
            </div>
        @endif
    @endauth

    <div class="row g-4">
        @forelse($books as $book)
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="card shadow-sm border-0 rounded-4 w-100 h-100 book-card">
                    <img src="{{ asset('images/' . $book->image) }}"
                         class="card-img-top rounded-top-4 object-fit-cover"
                         style="height: 220px; width: 100%; object-fit: cover;" 
                         alt="{{ $book->title }}">

                    <div class="card-body d-flex flex-column justify-content-between p-4" style="background-color: #fcfcfc;">
                        <h5 class="card-title fw-bold text-success" style="font-size: 1.25rem;">
                            {{ $book->title }}
                        </h5>

                        <p class="card-text text-muted mb-3" style="text-align: justify;">
                            {{ Str::limit($book->summary, 100) }}
                        </p>

                        <div class="d-grid gap-2 mt-auto">
                            <a href="/books/{{ $book->id }}" class="btn btn-outline-success rounded-pill fw-semibold">
                                📘 Detail
                            </a>
                            @auth
                                    @if (auth()->user()->role === 'admin')

                                <a href="/books/{{ $book->id }}/edit" class="btn btn-outline-warning rounded-pill fw-semibold">
                                    ✏️ Edit
                                </a>
                                <form action="/books/{{ $book->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger rounded-pill fw-semibold">
                                        🗑️ Hapus
                                    </button>
                                </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5">
                <h4>📚 Tidak ada buku yang tersedia saat ini</h4>
            </div>
        @endforelse
    </div>

    <style>
        .book-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.02);
            opacity: 0.92;
        }

        @media (max-width: 576px) {
            .card-title {
                font-size: 1rem;
            }
            .card-text {
                font-size: 0.9rem;
            }
        }
    </style>
@endsection