@extends('layouts.admin')

@section('title', 'Detail User')

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
    <a href="{{ route('user.index') }}" class="text-primary">Data User</a>
    <a href="#" class="text-grey"></a>
    <a href="#" class="text-grey">Detail User</a>
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            Detail User
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>NIK</th>
                                    <td>:</td>
                                    <td>{{ $user->nip }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>:</td>
                                    <td>{{ $user->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>:</td>
                                    <td>{{ $user->nama }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection