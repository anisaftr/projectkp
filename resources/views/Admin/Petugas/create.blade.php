@extends('layouts.admin')

@section('title', 'Form Peminjaman')

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
    <a href="#" class="text-grey">Form Peminjaman</a>
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 com-12">
                <div class="card">
                    <div class="card-header">
                        Form Peminjaman
                    </div>
                    <div class="card-body">
                        <form action="{{ route('petugas.store') }}" method="POST">
                            @csrf 
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <div class="input-group" mb-3>
                                    <select name="level" id="level" class="custom-select">
                                        <option value="petugas" selected>Pilih level (Default Petugas)</option>
                                        <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-succes" style="width: 100%">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <!-- @if (Session::has('username'))
                    <div class="alert alert-danger">
                        {{ Session::get('username') }}
                    </div>
                @endif
                @if (errors::any())
                    @foreach ($errors->all as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endforeach
                @endif -->
            </div>
        </div>
@endsection