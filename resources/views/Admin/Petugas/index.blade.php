@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Pengembalian')

@section('content')
    <a href="{{ route('petugas.create') }}" class="btn btn-purple mb-2">Tambah Petugas</a>
    <table id="pengembalianTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach($petugas as $k => $v)
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->nama }}</td>
                <td>{{ $v->kode_barang }}</td>
                <td>{{ $v->nama_barang }}</td>
                <td>{{ $v->jumlah }}</td>
                <td>{{ $v->level }}</td>
                <td><a href="{{ route('petugas.edit', $v->id_pengembalian) }}"></a></td>
            </tr>
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#pengembalianTable').DataTable();
        });
    </script>
@endsection