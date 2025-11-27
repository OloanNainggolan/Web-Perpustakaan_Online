@extends('layout.master')

@section('section-title')
    Halaman Edit Buku
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card border-0 shadow rounded-4">
            <div class="card-header text-white text-center py-4"
                style="background: linear-gradient(135deg, #14532d, #1abc9c);" border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h3 class="mb-0">Form Tambah Buku</h3>
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
                        <label for="genres_id" class="form-label fw-semibold text-dark">Genre Buku</label>
                        <select name="genres_id" id="genres_id"
                            class="form-select form-select-lg border border-success rounded-3">
                            <option value="">-- Pilih Genre --</option>
                            @forelse ($genres as $item)
                                @if($item->id === $book->genres_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @endif
                            @empty
                                <option value="">Tidak ada genre</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold text-dark">Judul Buku</label>
                        <input type="text" class="form-control form-control-lg border border-success rounded-3"
                            id="title" name="title" value="{{ old('title', $book->title) }}" placeholder="Masukkan judul buku">
                    </div>

                    <div class="mb-4">
                        <label for="summary" class="form-label fw-semibold text-dark">Deskripsi Buku</label>
                        <textarea class="form-control form-control-lg border border-success rounded-3" id="summary"
                            name="summary" rows="5" placeholder="Masukkan deskripsi buku">{{ old('summary', $book->summary) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="stok" class="form-label fw-semibold text-dark">Stok</label>
                        <input type="number" class="form-control form-control-lg border border-success rounded-3"
                            id="stok" name="stok" value="{{ old('stok', $book->stok) }}" placeholder="Masukkan jumlah stok">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold text-dark">Gambar Buku</label>
                        <input type="file" class="form-control form-control-lg border border-success rounded-3"
                            id="image" name="image">
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="btn btn-lg w-50 text-white fw-semibold shadow-sm"
                            style="background: linear-gradient(135deg, #14532d, #1abc9c); transition: 0.3s;">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
