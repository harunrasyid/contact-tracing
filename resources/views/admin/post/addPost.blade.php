@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3>Tambah Artikel</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/admin/create-posts" method="POST">
                                {{csrf_field()}}
                                    <label class="form-label">Judul Artikel</label>
                                    <input name="title" type="text" class="form-control" style="margin-bottom: 30px;">

                                    <label class="form-label">Isi Artikel</label>
                                    <textarea name="content" class="form-control" rows="30" ></textarea>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Publikasi</button>
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

