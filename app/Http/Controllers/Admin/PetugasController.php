<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::all();

        return view('Admin.Petugas.index', ['pengembalian' => $pengembalian]);
    }

    public function create()
    {
        return view('Admin.Petugas.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama' => ['required', 'string', 'max:225'],
            'kode_barang' => ['required'],
            'nama_barang' => ['required', 'string', 'max:225'],
            'jumlah' => ['required'],
            'level' => ['required', 'in:admin,petugas'],
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        Pengembalian::create([
            'nama' => $data['nama'],
            'kode_barang' => $data['kode_barang'],
            'nama_barang' => $data['nama_barang'],
            'jumlah' => $data['jumlah'],
            'level' => $data['level'],
        ]);

        return redirect()->route('petugas.index');
    }

    public function edit($id_pengembalian)
    {
        $pengembalian = Pengembalian::where('id_pengembalian',$id_pengembalian)->first();

        return view('Admin.Petugas.edit', ['pengembalian' => $pengembalian]);
    }

    public function update(Request $request, $id_pengembalian)
    {
        $data = $request-all();

        $pengembalian = Pengembalian::find(id_pengembalian);

        $pengembalian->update([
            'nama' => $data['nama'],
            'kode_barang' => $data['kode_barang'],
            'nama_barang' => $data['nama_barang'],
            'jumlah' => $data['jumlah'],
            'level' => $data['level'],
        ]);

        return redirect()->route('petugas.index');
    }

    public function destroy($id_pengembalian)
    {
        $pengembalian = Pengembalian::findOrFail($id_pengembalian);

        $pengembalian->delete();

        return redirect()->route('petugas.index');
    }
}
