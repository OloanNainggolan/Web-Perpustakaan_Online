@extends('layout.master')

@section('title')
    Register
@endsection

@section('section-title')
    HALAMAN Dashboard
@endsection

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-3 text-primary">Selamat Datang, {{ $fullName }}!</h1>
            <h2 class="h4 text-secondary">Terima Kasih telah Bergabung di SanberBook. Social Media Kita Bersama!</h2>
        </div>

        <div class="text-center mb-5">
            <i class="bi bi-person-circle" style="font-size: 100px; color: #007bff;"></i>
        </div>

        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h4 class="card-title">Welcome to SanberBook</h4>
                <p class="card-text">
                    Kami sangat senang kamu bergabung dengan komunitas developer terbaik. Di SanberBook, kamu bisa berbagi pengetahuan, mendapatkan motivasi, dan terus berkembang bersama sesama developer.
                    Jangan ragu untuk mulai menjelajahi dan berinteraksi dengan fitur-fitur yang kami sediakan.
                </p>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="/explore" class="btn btn-primary btn-lg">Mulai Eksplorasi</a>
        </div>
    </div>
@endsection
