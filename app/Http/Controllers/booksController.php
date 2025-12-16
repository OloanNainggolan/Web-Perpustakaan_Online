<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;
use App\Models\Comment;
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
        $books = Book::all();
        return view('books.tampil', ['books' => $books]);
    }

    public function create()
    {
        $genres = Genre::all();
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

        $book = new Book();
        $book->title = $request->title;
        $book->summary = $request->summary;
        $book->stok = $request->stok;
        $book->genres_id = $request->genres_id;
        $book->image = $newImageName;

        $book->save();

        return redirect('/books')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $book = Book::with(['comments.user', 'genre'])->find($id);
        if (!$book) {
            abort(404, 'Buku tidak ditemukan');
        }
        return view('books.detail', compact('book'));
    }

    public function edit(string $id)
    {
        $genres = Genre::all();
        $book = Book::find($id);

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

        $book = Book::find($id);

        if ($request->hasFile('image')) {
            if ($book->image && File::exists(public_path("images/{$book->image}"))) {
                File::delete(public_path("images/{$book->image}"));
            }

            $newImageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);

            $book->image = $newImageName;
        }

        $book->title = $request->title;
        $book->summary = $request->summary;
        $book->stok = $request->stok;
        $book->genres_id = $request->genres_id;

        $book->save();

        return redirect('/books')->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $book = Book::find($id);

        if ($book->image && File::exists(public_path("images/{$book->image}"))) {
            File::delete(public_path("images/{$book->image}"));
        }
        
        $book->delete();

        return redirect('/books')->with('success', 'Buku berhasil dihapus!');
    }

    public function comments(Request $request, $book_id)
    {
        $request->validate([
            'comments' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->comments = $request->input('comments');
        $comment->user_id = auth()->id();
        $comment->book_id = $book_id;

        $comment->save();

        return redirect('/books/' . $book_id)->with('success', 'Komentar berhasil ditambahkan!');
    }
}
