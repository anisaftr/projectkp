<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('user.landing');
    }

    public function login(Request $request)
    {
        $username = Pengguna::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }

        if (Auth::guard('pengguna')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back();
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }

    public function formRegister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nip' => ['required'],
            'nama' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => $validate->errors()]);
        }

        $username = Pengguna::where('username', $request->username)->first();

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        }

        Pengguna::create([
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('pekat.index');
    }

    public function logout()
    {
        Auth::guard('pengguna')->logout();

        return redirect()->back();
    }

    public function storePeminjaman(Request $request)
    {
        if (!Auth::guard('pengguna')->user()) {
            return redirect()->back()->with(['pesan' => 'Login dibutuhkan!'])->withInput();
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'isi_laporan' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        // if ($request->file('foto')) {
        //     $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        // }

        date_default_timezone_set('Asia/Bangkok');

        $peminjaman = Peminjaman::create([
            'nip' => Auth::guard('pengguna')->user()->nip,
            'isi_laporan' => $data['isi_laporan'],
            'tgl_peminjaman' => date('Y-m-d h:i:s'),
            'kode_barang' => $data['kode_barang'],
            // 'bidang' => $data['bidang'],
            // 'nama_barang' => $data['nama_barang'],
            // 'jumlah' => $data['jumlah'],
            // 'level' => '0',
            'status' => '0',
        ]);

        if ($peminjaman) {
            return redirect()->route('pekat.laporan', 'me')->with(['peminjaman' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['peminjaman' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function laporan($siapa = '')
    {
        $terverifikasi = Peminjaman::where([['nip', Auth::guard('pengguna')->user()->nip], ['status', '!=', '0']])->get()->count();
        $diproses = Peminjaman::where([['nip', Auth::guard('pengguna')->user()->nip], ['status', 'diproses']])->get()->count();
        $diterima = Peminjaman::where([['nip', Auth::guard('pengguna')->user()->nip], ['status', 'diterima']])->get()->count();

        $hitung = [$terverifikasi, $diproses, $diterima];

        if ($siapa == 'me') {
            $peminjaman = Peminjaman::where('nip', Auth::guard('pengguna')->user()->nip)->orderBy('tgl_peminjaman', 'desc')->get();

            return view('user.laporan', ['peminjaman' => $peminjaman, 'hitung' => $hitung, 'siapa' => $siapa]);
        } else {
            $peminjaman = Peminjaman::where([['nip', '!=', Auth::guard('pengguna')->user()->nip], ['status', '!=', '0']])->orderBy('tgl_peminjaman', 'desc')->get();

            return view('user.laporan', ['peminjaman' => $peminjaman, 'hitung' => $hitung, 'siapa' => $siapa]);
        }
    }
}
