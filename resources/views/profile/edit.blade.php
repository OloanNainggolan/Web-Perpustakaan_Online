@extends('layout.master')

@section('title')
    edit Profile
@endsection

@section('section-title')
    HALAMAN EDIT PROFIL
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<h1>Edit profile</h1>
<form action="/profile/{{ $profile->id }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="mb-4">
                        <label for="age" class="form-label fw-semibold text-dark">Age</label>
                        <input type="number" name="age" id="age"
                               class="form-control form-control-lg border border-success rounded-3 shadow-sm"
                               value="{{ $profile->age }}"
                               placeholder="Masukkan umur">
                    </div>

                    <div class="mb-4">
                        <label for="address" class="form-label fw-semibold text-dark">Address</label>
                        <textarea name="address" id="address" rows="4"
                                  class="form-control form-control-lg border border-success rounded-3 shadow-sm"
                                  placeholder="Masukkan alamat">{{ $profile->address }}</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                                class="btn btn-lg px-5 text-white fw-semibold shadow-sm"
                                style="background: linear-gradient(135deg, #14532d, #1abc9c); border-radius: 2rem;">
                            Simpan
                        </button>
                    </div>
                </form>
@endsection
