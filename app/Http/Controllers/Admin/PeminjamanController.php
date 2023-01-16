<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('Admin.Peminjaman.index');
    }

    public function show($id_peminjaman)
    {
        
    }
}
