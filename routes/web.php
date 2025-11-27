<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\genresController;
use App\Http\Controllers\booksController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'showregistrasi']);
Route::post('/welcome', [FormController::class, 'akhir']);
Route::get('/welcome', [DashboardController::class, 'home']);

Route::middleware(['auth', IsAdmin::class])->group(function () {

//crud genres
//c=>create data
Route::get('/genres/create', [genresController::class, 'create']);
Route::post('/genres/store', [genresController::class, 'store']);

//U=>update data
Route::get('/genres/{id}/edit', [genresController::class, 'edit']);
Route::put('/genres/{id}', [genresController::class, 'update']);

//D=>delete data
Route::delete('/genres/{id}', [genresController::class, 'destroy']);


});

//logout
Route::post('/logout', [AuthController::class, 'logoutUser'])->middleware('auth');
Route::get('/profile', [AuthController::class, 'getprofile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'createProfile'])->middleware('auth');
Route::put('/profile/{id}', [AuthController::class, 'updateProfile'])->middleware('auth');

Route::post('/comment/{book_Id}', [DashboardController::class, 'comment'])->middleware('auth');

Route::get('/genres', [genresController::class, 'index']);
Route::get('/genres/{id}', [genresController::class, 'show']);



//crud books
Route::resource('books', booksController::class);
Route::post('/books/store', [booksController::class, 'store']);
Route::get('/books/{id}', [booksController::class, 'show']);

// Auth
//Register
Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'registerUser']);

//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser']);

