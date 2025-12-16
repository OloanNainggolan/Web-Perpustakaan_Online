@extends('layout.master')

@section('title')
    Register
@endsection

@section('section-title')
    Tambah Genre Baru
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center py-4"
                 style="background: linear-gradient(135deg, #198754, #20c997);">
                <h3 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Form Tambah Genre</h3>
            </div>

            <div class="card-body px-5 py-4 bg-light rounded-bottom-4">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="/genres/store" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold text-dark">
                            <i class="bi bi-bookmark-star me-2"></i>Nama Genre
                        </label>
                        <input type="text" name="name" id="name" required
                               class="form-control form-control-lg border-2 border-success rounded-3 shadow-sm"
                               value="{{ old('name') }}"
                               placeholder="Contoh: Fantasy, Romance, Thriller">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold text-dark">
                            <i class="bi bi-card-text me-2"></i>Deskripsi Genre
                        </label>
                        <textarea name="description" id="description" rows="4" required
                                  class="form-control form-control-lg border-2 border-success rounded-3 shadow-sm"
                                  placeholder="Jelaskan karakteristik genre ini...">{{ old('description') }}</textarea>
                    </div>

                    <div class="d-flex gap-2 justify-content-center">
                        <a href="/genres" class="btn btn-outline-secondary btn-lg px-5 rounded-pill">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit"
                                class="btn btn-lg px-5 text-white fw-semibold shadow-sm rounded-pill"
                                style="background: linear-gradient(135deg, #198754, #20c997);">
                            <i class="bi bi-check-circle me-2"></i>Simpan Genre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .btn:hover {
            background-color: #219150 !important;
        }
        .form-control:focus {
            border-color: #27ae60;
            box-shadow: 0 0 0 0.15rem rgba(39, 174, 96, 0.25);
        }
    </style>
@endsection
