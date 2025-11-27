@extends('layout.master')

@section('title')
    Register
@endsection
@section('section-title')
    <h2 class="text-center text-dark fw-bold"> HALAMAN REGISTER PENGGUNA</h2>
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header text-white text-center py-4"
                        style="background: linear-gradient(135deg, #14532d, #1abc9c);">
                        <h3 class="mb-0 fw-bold">Form Register Pengguna</h3>
                    </div>

                    <div class="card-body px-5 py-4 bg-light">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="/register" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold text-dark">Username</label>
                                <input type="text" name="name" id="name"
                                    class="form-control form-control-lg border border-success rounded-3 shadow-sm"
                                    value="{{ old('name') }}"
                                    placeholder="Masukkan username">
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-dark">Email</label>
                                <input name="email" id="email" type="email"
                                    class="form-control form-control-lg border border-success rounded-3 shadow-sm"
                                    placeholder="Masukkan email">
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-dark">Password</label>
                                <input name="password" id="password" type="password"
                                    class="form-control form-control-lg border border-success rounded-3 shadow-sm"
                                    placeholder="Masukkan password">
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold text-dark">Konfirmasi Password</label>
                                <input name="password_confirmation" id="password_confirmation" type="password"
                                    class="form-control form-control-lg border border-success rounded-3 shadow-sm"
                                    placeholder="Masukkan konfirmasi password">
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit"
                                    class="btn btn-lg px-5 py-2 text-white fw-semibold shadow-sm"
                                   style="background: linear-gradient(135deg, #14532d, #1abc9c); border-radius: 2rem;">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn:hover {
            background-color: #219150 !important;
            transform: scale(1.03);
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: #27ae60;
            box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
        }

        body {
            background-color: #f4f7f6;
        }
    </style>
@endsection
