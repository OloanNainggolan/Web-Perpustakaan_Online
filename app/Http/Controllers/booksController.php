<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genres;
use App\Models\books;
use App\Models\comments;
use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;

class booksController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['comments']),
            new Middleware(IsAdmin::class, except: ['index', 'show']),
        ];
    }

    public function index()
    {
        $books = books::all();
        return view('books.tampil', ['books' => $books]);
    }

    public function create()
    {
        $genres = genres::all();
        return view('books.tambah', ['genres' => $genres]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'genres_id' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'required|integer|min:0',
        ]);

        $newImageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $book = new books();
        $book->title = $request->title;
        $book->summary = $request->summary;
        $book->stok = $request->stok;
        $book->genres_id = $request->genres_id;
        $book->image = $newImageName;

        $book->save();

        return redirect('/books');
    }

    public function show(string $id)
    {
        $book = books::find($id);
        if (!$book) {
            abort(404, 'Buku tidak ditemukan');
        }
        return view('books.detail', compact('book'));
    }

    public function edit(string $id)
    {
        $genres = genres::all();
        $book = books::find($id);

        return view('books.edit', ['book' => $book, 'genres' => $genres]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'genres_id' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'required|integer|min:0',
        ]);

        $book = books::find($id);

        if ($request->hasFile('image')) {
            File::delete(public_path("images/{$book->image}"));

            $newImageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);

            $book->image = $newImageName;
        }

        $book->title = $request->title;
        $book->summary = $request->summary;
        $book->stok = $request->stok;
        $book->genres_id = $request->genres_id;

        $book->save();

        return redirect('/books');
    }

    public function destroy(string $id)
    {
        $book = books::find($id);

        File::delete(public_path("images/{$book->image}"));
        $book->delete();

        return redirect('/books');
    }

    public function comments(Request $request, $genre_id, $user_id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new comments();
        $comment->content = $request->input('content');
        $comment->user_id = $user_id;
        $comment->genres_id = $genre_id;

        $comment->save();

        return redirect('/books');
    }
}
