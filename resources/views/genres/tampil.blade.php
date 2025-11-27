@extends('layout.master')

@section('title')
    Tampil Genre
@endsection

@section('section-title')
    <span class="fw-bold text-dark display-6">📚 Daftar Genre Buku</span>
@endsection

@section('content')
<div class="container mt-5">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #14532d, #1abc9c);">
            <h2 class="mb-0 fw-semibold">📖 Genre Buku</h2>
        </div>

        <div class="card-body p-5 bg-white">

            {{-- Tombol Tambah Genre hanya untuk admin --}}
            @auth
                @if (auth()->user()->role === 'admin')
                    <div class="d-flex justify-content-end mb-4">
                        <a href="/genres/create"
                           class="btn btn-success px-4 py-2 fw-semibold shadow-sm rounded-pill d-flex align-items-center gap-2"
                           style="background-color: #16a085;">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Genre
                        </a>
                    </div>
                @endif
            @endauth

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle rounded-3 overflow-hidden shadow-sm">
                    <thead class="text-white" style="background-color: #2c3e50;">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Nama Genre</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($genres as $item)
                            <tr>
                                <td class="text-center fw-medium">{{ $loop->iteration }}</td>
                                <td class="text-center fw-semibold">{{ $item->name }}</td>
                                <td class="text-center">

                                    @auth
                                        @if (auth()->user()->role === 'admin')
                                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                {{-- Tombol Detail --}}
                                                <a href="/genres/{{ $item->id }}" 
                                                   class="btn btn-outline-primary btn-sm rounded-pill d-flex align-items-center gap-1">
                                                    <i class="bi bi-eye-fill"></i> Detail
                                                </a>

                                                {{-- Tombol Edit --}}
                                                <a href="/genres/{{ $item->id }}/edit" 
                                                   class="btn btn-outline-warning btn-sm rounded-pill d-flex align-items-center gap-1">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>

                                                {{-- Tombol Delete --}}
                                                <form action="/genres/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-outline-danger btn-sm rounded-pill d-flex align-items-center gap-1">
                                                        <i class="bi bi-trash3-fill"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <h5 class="text-muted">🚫 Tidak ada genre tersedia.</h5>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Style tambahan --}}
<style>
    .btn {
        transition: all 0.25s ease-in-out;
    }

    .btn:hover {
        opacity: 0.92;
        transform: scale(1.02);
    }

    .table th, .table td {
        vertical-align: middle !important;
    }

    .card-body {
        background-color: #fdfefe;
    }
</style>
@endsection
