@extends('layout.master')

@section('section-title')
    Tambah Buku Baru
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center py-4"
                style="background: linear-gradient(135deg, #198754, #20c997);">
                <h3 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Form Tambah Buku</h3>
            </div>
            <div class="card-body px-5 py-4 bg-white rounded-bottom-4">
                <form action="/books/store" method="POST" enctype="multipart/form-data">
                    @csrf

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
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            id="title" name="title" value="{{ old('title') }}" placeholder="Contoh: Laskar Pelangi">
                    </div>

                    <div class="mb-4">
                        <label for="summary" class="form-label fw-semibold text-dark">
                            <i class="bi bi-card-text me-2"></i>Deskripsi Buku
                        </label>
                        <textarea class="form-control form-control-lg border-2 border-success rounded-3" required id="summary"
                            name="summary" rows="5" placeholder="Ceritakan tentang buku ini...">{{ old('summary') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="stok" class="form-label fw-semibold text-dark">
                            <i class="bi bi-box-seam me-2"></i>Stok
                        </label>
                        <input type="number" class="form-control form-control-lg border-2 border-success rounded-3" required min="0"
                            id="stok" name="stok" value="{{ old('stok') }}" placeholder="Contoh: 10">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold text-dark">
                            <i class="bi bi-image me-2"></i>Gambar Buku
                        </label>
                        <input type="file" class="form-control form-control-lg border-2 border-success rounded-3" required
                            id="image" name="image" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                    </div>

                    <div class="d-flex gap-2 justify-content-center">
                        <a href="/books" class="btn btn-outline-secondary btn-lg px-5 rounded-pill">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit"
                            class="btn btn-lg px-5 text-white fw-semibold shadow-sm rounded-pill"
                            style="background: linear-gradient(135deg, #198754, #20c997);">
                            <i class="bi bi-check-circle me-2"></i>Simpan Buku
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
