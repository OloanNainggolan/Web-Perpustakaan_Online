@extends('layout.master')

@section('title')
    edit Profile
@endsection

@section('section-title')
    Edit Profil
@endsection

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header text-white text-center py-4"
                     style="background: linear-gradient(135deg, #198754, #20c997);">
                    <h3 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Profil</h3>
                </div>
                
                <div class="card-body p-4">
                    <!-- Display Current User Info -->
                    <div class="alert alert-info border-0 mb-4">
                        <i class="bi bi-person-circle me-2"></i>
                        <strong>{{ auth()->user()->name }}</strong><br>
                        <small class="text-muted">{{ auth()->user()->email }}</small>
                    </div>

                    <form action="/profile/{{ $profile->id }}" method="POST">
                        @csrf
                        @method("PUT")
                        
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="age" class="form-label fw-semibold text-dark">
                                <i class="bi bi-calendar-event me-2"></i>Umur
                            </label>
                            <input type="number" name="age" id="age" required min="1" max="120"
                                   class="form-control form-control-lg border-2 border-success rounded-3"
                                   value="{{ old('age', $profile->age) }}"
                                   placeholder="Masukkan umur">
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label fw-semibold text-dark">
                                <i class="bi bi-geo-alt me-2"></i>Alamat
                            </label>
                            <textarea name="address" id="address" rows="4" required
                                      class="form-control form-control-lg border-2 border-success rounded-3"
                                      placeholder="Masukkan alamat">{{ old('address', $profile->address) }}</textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="/welcome" class="btn btn-outline-secondary btn-lg flex-fill rounded-pill">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit"
                                    class="btn btn-lg flex-fill text-white fw-semibold shadow-sm rounded-pill"
                                    style="background: linear-gradient(135deg, #198754, #20c997);">
                                <i class="bi bi-save me-2"></i>Update Profil
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
