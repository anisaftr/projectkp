@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Petugas</div>
                <div class="card-body">
                    <div class="text-center">
                        10
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Pengguna</div>
                <div class="card-body">
                <div class="text-center">
                        {{ $user }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Peminjaman Proses</div>
                <div class="card-body">
                <div class="text-center">
                        {{ $proses }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Peminjaman Diterima</div>
                <div class="card-body">
                <div class="text-center">
                        {{ $selesai }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection