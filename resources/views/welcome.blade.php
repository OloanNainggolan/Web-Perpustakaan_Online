@extends('layout.master')

@section('title')
     Home
@endsection

@section('content')
<div class="container py-5">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif


@auth
            <h1>Selamat Datang, {{auth()->user()->name}} 
                @if (Auth()->user()->profile)
                ({{Auth()->user()->profile->age}}Tahun)
                @else
                
                @endif
            

            </h1>

@endauth
    <div class="text-center mb-5">
        <h1 class="display-3 text-primary">SanberBook</h1>
        <h2 class="h3 text-secondary">Social Media Developer Santai Berkualitas</h2>
        <p class="lead text-muted">Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>
    </div>
>
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h3 class="text-center mb-4">Benefit Join di SanberBook</h3>
            <ul class="list-group">
                <li class="list-group-item"><i class="bi bi-check-circle text-success"></i> Mendapatkan motivasi dari sesama developer</li>
                <li class="list-group-item"><i class="bi bi-check-circle text-success"></i> Sharing knowledge seputar dunia programming</li>
                <li class="list-group-item"><i class="bi bi-check-circle text-success"></i> Dibuat oleh calon web developer terbaik</li>
            </ul>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center mb-4">Cara Bergabung ke SanberBook</h3>
            <ol class="list-group">
                <li class="list-group-item"><i class="bi bi-arrow-right-circle text-info"></i> Mengunjungi website ini</li>
                <li class="list-group-item"><i class="bi bi-arrow-right-circle text-info"></i> Mendaftar di <a href="/register" class="text-primary">Form Sign Up</a></li>
                <li class="list-group-item"><i class="bi bi-arrow-right-circle text-info"></i> Selesai!</li>
            </ol>
        </div>
    </div>
</div>

@endsection
