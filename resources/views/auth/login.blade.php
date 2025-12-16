@extends('layout.master')

@section('title')
    Login
@endsection
@section('section-title')
    Login
@endsection

@section('content')
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-header text-white text-center py-4"
                        style="background: linear-gradient(135deg, #198754, #20c997);">
                        <i class="bi bi-box-arrow-in-right fs-1 mb-2 d-block"></i>
                        <h3 class="mb-0 fw-bold">Login</h3>
                        <p class="mb-0 small">Masuk ke akun Anda</p>
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

                        <form action="/login" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-envelope me-2"></i>Email
                                </label>
                                <input name="email" id="email" type="email" required
                                    class="form-control form-control-lg border-2 border-success rounded-3"
                                    value="{{ old('email') }}"
                                    placeholder="nama@email.com">
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-dark">
                                    <i class="bi bi-lock me-2"></i>Password
                                </label>
                                <input name="password" id="password" type="password" required
                                    class="form-control form-control-lg border-2 border-success rounded-3"
                                    placeholder="Masukkan password">
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit"
                                    class="btn btn-lg text-white fw-semibold shadow-sm rounded-pill"
                                   style="background: linear-gradient(135deg, #198754, #20c997);">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                                </button>
                            </div>
                            
                            <div class="text-center">
                                <p class="mb-0 text-muted">Belum punya akun? 
                                    <a href="/register" class="text-success fw-bold">Daftar Sekarang</a>
                                </p>
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
