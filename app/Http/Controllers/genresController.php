<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Genre;

class genresController extends Controller
{
    public function create()
    {
        return view('genres.tambah');
    }
    public function store(Request $request)
    {
        //validasi input
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        
        //simpan data ke database menggunakan Eloquent
        Genre::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        
        //arahkan ke semua genres
        return redirect('/genres')->with('success', 'Genre berhasil ditambahkan!');
    }   
    public function index()
    {
        $genres = Genre::all();
        return view('genres.tampil', ['genres' => $genres]);
    }
    public function show($id)
    {
        $genres = Genre::with('books')->findOrFail($id);   
        return view('genres.detail', ['genres' => $genres]);
    }
    public function edit($id)
    {
        $genres = Genre::findOrFail($id);
        return view('genres.edit', ['genres' => $genres]);
    }
    public function update(Request $request, $id)
    {
        //validasi input
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        //update data di database menggunakan Eloquent
        $genre = Genre::findOrFail($id);
        $genre->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        
        return redirect('/genres')->with('success', 'Genre berhasil diupdate!');
    }
    public function destroy($id)
    {
        //hapus data dari database menggunakan Eloquent
        $genre = Genre::findOrFail($id);
        $genre->delete();
        
        //arahkan ke semua genres
        return redirect('/genres')->with('success', 'Genre berhasil dihapus!');
    }   
}
