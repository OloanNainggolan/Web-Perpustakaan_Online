<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showregistrasi()
    {
        return view('page.register');
    }   
    public function akhir(request $request) {
        $fullName = $request->first_name . ' ' . $request->last_name;
        return view('page.welcome', ['fullName' => $fullName]);
    }
}   
