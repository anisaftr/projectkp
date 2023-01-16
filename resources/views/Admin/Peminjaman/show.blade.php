@extends('layouts.admin')

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

        .btn-purple {
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fffff;
            width: 100%;
        }
    </style>
@endsection

@section('header')
    <a href="{{ route('peminjaman.index') }}" class="text-primary">Data Peminjaman</a>
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
                                    <td>{{ $peminjaman->tgl_peminjaman  }}</td>
                                </tr>
                                <tr>
                                    <th>Isi Laporan</th>
                                    <td>:</td>
                                    <td>{{ $peminjaman->isi_laporan  }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>
                                    @if ($peminjaman->status == '0')
                                        <a href="" class="badge badge-danger">Pending</a>
                                    @elseif($peminjaman->status == 'proses')
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
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            Tanggapan
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_peminjaman" value="{{ $peminjaman->id_peminjaman }}">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="input-group mb-3">
                                    <select name="status" id="status" class="custom-select">
                                        @if($peminjaman->status == '0')
                                            <option selected value="0">Pending</option>
                                            <option value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                        @elseif($peminjaman->status == 'proses')
                                            <option value="0">Pending</option>
                                            <option selected value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                        @else
                                            <option selected value="0">Pending</option>
                                            <option value="proses">Proses</option>
                                            <option selected value="selesai">Selesai</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggapan">Tanggapan</label>
                                <textarea name="tanggapan" id="tanggapan" row="4" class="form-control" placeholder="Belum ada tanggapan">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-purple">Kirim</button>
                        </form>
                        @if (Session::has('status'))
                            <div class="alert alert-success mt-2">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

@endsection