@extends('layout.master')

@section('title')
    Register
@endsection

@section('section-title')
    <span class="fw-bold text-dark display-6">HALAMAN EDIT GENRE</span>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center py-4"
                 style="background: linear-gradient(135deg, #14532d, #1abc9c); border-top-left-radius: 1.5rem; border-top-right-radius: 1.5rem;">
                <h3 class="mb-0">Form Edit Genre</h3>
            </div>

            <div class="card-body px-5 py-4 bg-light rounded-bottom-4">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="/genres/{{ $genres->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold text-dark">Nama Genre</label>
                        <input type="text" name="name" id="name"
                               class="form-control form-control-lg border border-success rounded-3 shadow-sm"
                               value="{{ old('name', $genres->name) }}"
                               placeholder="Masukkan nama genre">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold text-dark">Deskripsi Genre</label>
                        <textarea name="description" id="description" rows="4"
                                  class="form-control form-control-lg border border-success rounded-3 shadow-sm"
                                  placeholder="Masukkan deskripsi genre">{{ old('description', $genres->description) }}</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                                class="btn btn-lg px-5 text-white fw-semibold shadow-sm"
                                style="background: linear-gradient(135deg, #14532d, #1abc9c); border-radius: 2rem;">
                            Simpan Perubahan
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
