@extends('layout.master')

@section('title')
    Detail Buku
@endsection

@section('section-title')
    <h2 class="text-center text-dark fw-bold">📖 DETAIL BUKU</h2>
@endsection

@section('content')
@if($book)
    <div class="card border-0 shadow-lg rounded-4 p-4" style="max-width: 700px; margin: 0 auto; background-color: #ffffff;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/' . $book->image) }}" class="img-fluid rounded-3 shadow-sm" 
                 style="max-width: 70%; height: auto; object-fit: cover;">
        </div>
        <h4 class="text-success text-center fw-bold mb-3" style="font-size: 1.8rem;">{{ $book->title }}</h4>
        <p class="text-muted" style="text-align: justify; line-height: 1.6; font-size: 1.1rem;">
            {{ $book->summary }}
        </p>

        <hr>
        <h3>Buat Komentar</h3>
        @auth
          <form action="/comment/{{ $book->id }}" method="POST" enctype="multipart/form-data">
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
                        <textarea class="form-control form-control-lg border border-success rounded-3" id="summary"
                            name="comments" rows="5" placeholder="isi komentar...">{{ old('summary') }}</textarea>
                    </div>

                    

                    <div class="text-center">
                        <button type="submit"
                            class="btn btn-lg w-50 text-white fw-semibold shadow-sm"
                            style="background: linear-gradient(135deg, #14532d, #1abc9c); border-radius: 2rem; transition: 0.3s;">
                            Buat Komentar
                        </button>
                    </div>
                </form>
                @endauth
        <div class="text-center mt-4">
            <a href="{{ url('/books') }}" class="btn btn-outline-success px-4 py-2 rounded-pill fw-semibold">
                ⬅️ Kembali ke Daftar
            </a>
        </div>
    </div>
@else
    <div class="text-center py-5">
        <h3 class="text-danger">❌ Buku tidak ditemukan.</h3>
    </div>
@endif

<style>
    .card {
        background-color: #fefefe;
    }

    a.btn:hover {
        opacity: 0.9;
        transform: scale(1.03);
        transition: all 0.2s ease-in-out;
    }
</style>
@endsection
