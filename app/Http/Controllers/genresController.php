<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  Carbon\Carbon;
use App\Models\genres;

class genresController extends Controller
{
    public function create()
    {
        return view('genres.tambah');
    }
    public function store(Request $request){

        //validasi input
        $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
         ]);
        $now = Carbon::now();
        //simpan data ke database
         DB::table('genres')->insert([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            //arahkan ke semua genres
            return redirect('/genres');
    }   
    public function index()
    {
        $genres = DB::table('genres')->get();
        return view('genres.tampil', ['genres' => $genres]);
    }
    public function show($id)
    {
     $genres = genres::find($id);   
     return view('genres.detail', ['genres' => $genres]);
    }
    public function edit($id)
    {
     $genres = DB::table('genres')->find($id);
     return view('genres.edit', ['genres' => $genres]);
    }
    public function update(Request $request, $id)
    {
        //validasi input
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $now = Carbon::now();
        //update data di database
        DB::table('genres')
        ->where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'updated_at' => $now,
        ]);   
        return redirect('/genres');

    }
    public function destroy($id)
    {
        //hapus data dari database
        DB::table('genres')->where('id', $id)->delete();
        //arahkan ke semua genres
        return redirect('/genres');
    }   
}
