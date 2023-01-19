<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengguna;

class DashboardController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all()->count();

        $proses = Peminjaman::where('status', 'proses')->get()->count();

        $selesai = Peminjaman::where('status', 'proses')->get()->count();


        return view('Admin.Dashboard.index', ['pengguna' => $pengguna, 'proses' => $proses, 'selesai' => $selesai]);
    }
}
