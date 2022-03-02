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
                                <h3 class="panel-title">Data Post Informasi</h3>
                                <div class="right">
                                    <a href="/admin/add-posts" class="btn"><i class="lnr lnr-pencil"></i>Tambah Post</a>
                                </div>  
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>ID ARTIKEL</th>
                                        <th>JUDUL</th>
                                        <th>PENULIS</th>
                                        <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td><a href="/admin/show-posts/{{$post->id}}">{{$post->id}}</a></td>
                                            <td><a href="/admin/show-posts/{{$post->id}}">{{$post->title}}</a></td>
                                            <td>{{$post->user->admin->nama}}</td>
                                            <td>
                                                <a href="/admin/show-posts/{{$post->id}}" class="btn btn-primary btn-sm">Lihat</a>
                                                <a href="/admin/edit-posts/{{$post->id}}" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/admin/delete-posts/{{$post->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data?')">Hapus</a>
                                            </td>
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

