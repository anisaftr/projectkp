<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Tanggapan;


class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::orderBy('tgl_peminjaman', 'desc')->get();

        return view('Admin.Peminjaman.index', ['peminjaman' => $peminjaman]);
    }

    public function show($id_peminjaman)
    {
        $peminjaman = Peminjaman::where('id_peminjaman', $id_peminjaman)->first();

        $tanggapan = Tanggapan::where('id_peminjaman', $id_peminjaman)->first();

        return view('Admin.Peminjaman.show', ['peminjaman' => $peminjaman, 'tanggapan' => $tanggapan]);
    }
}
