@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3>Edit Artikel</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/admin/update-posts/{{$post->id}}" method="POST">
                                {{csrf_field()}}
                                    <label class="form-label">Judul Artikel</label>
                                    <input name="title" type="text" class="form-control" value="{{$post->title}}">
                                    <h5 style="margin-bottom: 30px;">Dipublikasikan {{ date('d-m-Y',strtotime($post->created_at)) }}</h5>

                                    <label class="form-label">Isi Artikel</label>
                                    <textarea name="content" class="form-control" rows="30" >{{$post->content}}</textarea>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

