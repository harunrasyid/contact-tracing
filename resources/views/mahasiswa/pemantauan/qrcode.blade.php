@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h1>Scan QR Code</h1>
                    </div>
                    <div class="panel-body">
                        <form action="/mahasiswa/postLokasiKegiatan" method="POST">
                        {{csrf_field()}}
                        <div class="text-center">
                            <video id="preview" width="350" height="350"></video>
                        </div>  
                        
                        <div class="col-lg-12">
                            <div class="form-group{{$errors->has('gedung') ? 'has-error' : ' ' }}">
                                <label class="form-label">Gedung</label>
                                <input name="gedung" id="gedung" type="text" class="form-control" readonly>
                                @if($errors->has('gedung'))
                                    <span class="help-block text-danger">{{$errors->first('gedung')}}</span>
                                @endif
                            </div>

                            <div class="form-group{{$errors->has('ruangan') ? 'has-error' : ' ' }}">
                                <label class="form-label">Ruangan</label>
                                <input name="ruangan" id="ruangan" type="text" class="form-control" readonly>
                                @if($errors->has('ruangan'))
                                    <span class="help-block text-danger">{{$errors->first('ruangan')}}</span>
                                @endif
                            </div>
                        </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Masuk Ruangan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('admin/assets/plugin/instascan.min.js')}}"></script>
@endsection