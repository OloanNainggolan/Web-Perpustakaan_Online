@extends('layout.master')

@section('section-title')
    Edit Buku
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center py-4"
                style="background: linear-gradient(135deg, #198754, #20c997);">
                <h3 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Form Edit Buku</h3>
            </div>
            <div class="card-body px-5 py-4 bg-white rounded-bottom-4">
                <form action="/books/{{ $book->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="genres_id" class="form-label fw-semibold text-dark">
                            <i class="bi bi-bookmark-star me-2"></i>Genre Buku
                        </label>
                        <select name="genres_id" id="genres_id" required
                            class="form-select form-select-lg border-2 border-success rounded-3">
                            <option value="">-- Pilih Genre --</option>
                            @forelse ($genres as $item)
                                @if($item->id === $book->genres_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @empty
                                <option value="">Tidak ada genre</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold text-dark">
                            <i class="bi bi-journal-text me-2"></i>Judul Buku
                        </label>
                        <input type="text" class="form-control form-control-lg border-2 border-success rounded-3" required
                            id="title" name="title" value="{{ old('title', $book->title) }}" placeholder="Masukkan judul buku">
                    </div>

                    <div class="mb-4">
                        <label for="summary" class="form-label fw-semibold text-dark">
                            <i class="bi bi-card-text me-2"></i>Deskripsi Buku
                        </label>
                        <textarea class="form-control form-control-lg border-2 border-success rounded-3" required id="summary"
                            name="summary" rows="5" placeholder="Masukkan deskripsi buku">{{ old('summary', $book->summary) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="stok" class="form-label fw-semibold text-dark">
                            <i class="bi bi-box-seam me-2"></i>Stok
                        </label>
                        <input type="number" class="form-control form-control-lg border-2 border-success rounded-3" required min="0"
                            id="stok" name="stok" value="{{ old('stok', $book->stok) }}" placeholder="Masukkan jumlah stok">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold text-dark">
                            <i class="bi bi-image me-2"></i>Gambar Buku
                        </label>
                        @if($book->image)
                            <div class="mb-3">
                                <img src="{{ asset('images/' . $book->image) }}" alt="Current Image" 
                                     class="img-thumbnail" style="max-width: 200px;">
                                <p class="text-muted small mt-1">Gambar saat ini</p>
                            </div>
                        @endif
                        <input type="file" class="form-control form-control-lg border-2 border-success rounded-3"
                            id="image" name="image" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    </div>

                    <div class="d-flex gap-2 justify-content-center">
                        <a href="/books" class="btn btn-outline-secondary btn-lg px-5 rounded-pill">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit"
                            class="btn btn-lg px-5 text-white fw-semibold shadow-sm rounded-pill"
                            style="background: linear-gradient(135deg, #198754, #20c997);">
                            <i class="bi bi-save me-2"></i>Update Buku
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
