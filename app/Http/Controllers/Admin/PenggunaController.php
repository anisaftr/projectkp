<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        
        return view('Admin.Pengguna.index', ['pengguna' => $pengguna]);
    }

    public function show($nip)
    {
        $pengguna = Pengguna::where('nip', $nip)->first();

        return view('Admin.Pengguna.show', ['pengguna' => $pengguna]);
    }
}
