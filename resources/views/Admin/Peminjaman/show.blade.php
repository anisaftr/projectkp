@extends('layout.admin')

@section('title', 'Detail Peminjaman')

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
    <a href="{{ route('peminjaman.index' }}" class="text-primary">Data Peminjaman</a>
    <a href="#" class="text-grey"></a>
    <a href="#" class="text-grey">Detail Peminjaman</a>
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            Peminjaman Aset
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Tanggal Peminjaman</th>
                                    <td>:</td>
                                    <td>{{ $peminjaman->tgl_peminjaman }}</td>
                                </tr>
                                <tr>
                                    <th>Isi Laporan</th>
                                    <td>:</td>
                                    <td>{{ $peminjaman->isi_laporan }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>
                                    @if ($peminjaman->status = '0')
                                        <a href="" class="badge badge-danger">Pending</a>
                                    @elseif($peminjaman->status = 'proses')
                                        <a href="" class="badge badge-warning text-white">Proses</a>
                                    @else
                                        <a href="" class="badge badge-success">Selesai</a>
                                    @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection