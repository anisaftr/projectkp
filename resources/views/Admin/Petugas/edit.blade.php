@extends('layouts.admin')

@section('title', 'Form Edit Pengembalian')

@section('css')
    <style>
        .text-primary:hover {
            text-decoration: underline;
        }

        .text-grey {
            color: #6c757d;
        }

        .text-grey:hover {
            color: #6c757d;
        }

    </style>
@endsection

@section('header')
    <a href="{{ route('petugas.index') }}" class="text-primary">Data Peminjaman</a>
    <a href="#" class="text-grey"></a>
    <a href="#" class="text-grey">Form Edit Pengembalian</a>
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 com-12">
                <div class="card">
                    <div class="card-header">
                        Form Edit Peminjaman
                    </div>
                    <div class="card-body">
                        <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="POST">
                            @csrf 
                            @method('PATCH')
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" value="{{ $pengembalian->nama }}" name="nama" id="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" value="{{ $pengembalian->kode_barang }}" name="kode_barang" id="kode_barang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" value="{{ $pengembalian->nama_barang }}" name="nama_barang" id="nama_barang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" value="{{ $pengembalian->jumlah }}" name="jumlah" id="jumlah" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <div class="input-group" mb-3>
                                    <select name="level" id="level" class="custom-select">
                                        @if ($pengembalian->level = 'admin')
                                        <option selected value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                        @else
                                        <option value="admin">Admin</option>
                                        <option selected value="petugas">Petugas</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
                        </form>
                        <form action="{{ route('petugas.destroy', $pengembalian->id_petugas) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-2" style="width:100%">HAPUS</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection