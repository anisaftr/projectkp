@extends('layouts.admin')

@section('title', 'Halaman User')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data User')

@endsection

@section('content')
    <table id="userTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Nama Barang</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $k => $v)
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->nip }}</td>
                <td>{{ $k ->nama }}</td>
                <td>{{ $k ->nama_barang }}</td>
                <td><a href="{{ route('user.show', $v->nip) }}" style="text-decoration: underline">Lihat</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable();
        });
    </script>
@endsection