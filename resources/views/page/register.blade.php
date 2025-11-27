@extends('layout.master')

@section('title')
    Register
@endsection

@section('section-title')
    REGISTER
@endsection

@section('content')
    <div class="container py-5">
 
        <div class="text-center mb-5">
            <h1 class="display-4 text-primary">Buat Account Baru!</h1>
            <h2 class="h4 text-secondary">Sign Up Form</h2>
        </div>


        <form method="POST" action="/welcome">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" required placeholder="Nama Awal">
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required placeholder="Nama Akhir">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender</label><br />
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kelamin" id="male" value="1" required />
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kelamin" id="female" value="2" required />
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kelamin" id="other" value="3" required />
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nationality" class="form-label">Nationality</label>
                        <select name="nationality" id="nationality" class="form-select" required>
                            <option value="1">Indonesia</option>
                            <option value="2">Singapore</option>
                            <option value="3">Malaysia</option>
                            <option value="4">Brunei</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Language Spoken</label><br />
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="bahasa" value="1" />
                            <label class="form-check-label">Bahasa Indonesia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="bahasa" value="2" />
                            <label class="form-check-label">English</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="bahasa" value="3" />
                            <label class="form-check-label">Other</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea name="bio" id="bio" rows="5" class="form-control" placeholder="Tell us about yourself..."></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
