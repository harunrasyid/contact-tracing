@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            @if(session('input_berhasil'))
                            <div class="alert alert-success alert-dismissible" role="alert">
			                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			                    <i class="fa fa-check-circle"></i> {{session('input_berhasil')}}
		                    </div>
                            @endif
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Mahasiswa</h3>
                                <div class="right">
                                    <a href="/admin/add" class="btn"><i class="lnr lnr-pencil"></i></a>
                                </div>  
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>Nama</th>
                                        <th>NIP/NIM/Nomor ID</th>
                                        <th>Fakultas</th>
                                        <th>Program Studi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_mahasiswa as $mahasiswa)
                                        <tr>
                                            <td><a href="/admin/{{$mahasiswa->user_id}}/editAkunPengguna">{{$mahasiswa->nama}}</a></td>
                                            <td><a href="/admin/{{$mahasiswa->user_id}}/editAkunPengguna">{{$mahasiswa->NIM}}</a></td>
                                            <td>{{$mahasiswa->fakultas}}</td>
                                            <td>{{$mahasiswa->prodi}}</td>
                                            <td><a href="/admin/{{$mahasiswa->user_id}}/editAkunPengguna" class="btn btn-warning btn-sm">Edit</a></td>
                                            <td><a href="/admin/{{$mahasiswa->user_id}}/resetPassword" class="btn btn-danger btn-sm" onclick="return confirm('Reset Password?')">Reset Password</a></td>

                                            <!--<td><a href="/admin/{{$mahasiswa->user_id}}/deleteAkunPengguna" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data?')">Hapus</a></td>-->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

