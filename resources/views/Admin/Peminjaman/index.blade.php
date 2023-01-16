@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Peminjaman')

@section('content')
    <table id="peminjamanTable" class="table">
        <thread>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thread>
        <tbody>
            @foreach ($peminjaman as $k => $v)
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->tgl_peminjaman }}</td>
                <td>{{ $v->isi_laporan }}</td>
                <td>
                    @if ($v->status = '0')
                        <a href="#" class="badge-danger">Pending</a>
                    @elseif($v->status = 'proses')
                        <a href="#" class="badge-warning text-white">Proses</a>
                    @else
                        <a href="#" class="badge-success">Selesai</a>
                    @endif
                </td>
                <td><a href="{{ route('peminjaman.show', $v->id_peminjaman) }}" style="text-decoration:underline">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection