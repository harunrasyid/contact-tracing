@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="/mahasiswa/{{$user->id}}/updateProfile" method="POST">
                        {{csrf_field()}}
                            <div class="panel">
                                <div class="panel-heading">
                                    <h2>Ubah Data Pribadi Pengguna</h2>
                                </div>
                                <div class="panel-body">

                                        <div class="form-group">
                                            <label class="form-label">Nomor Telefon</label>
                                            <input name="no_telp" type="text" class="form-control" value="{{$user->mahasiswa->no_telp}}">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nomor Telefon Darurat</label>
                                                    <input name="no_telp_darurat" type="text" class="form-control" value="{{$user->mahasiswa->no_telp_darurat}}">
                                                </div>
                                            </div>
                    
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">Hubungan Dengan Nomor Darurat</label>
                                                    <select name="hub_no_telp_darurat" class="form-control" aria-label="Default select example">
                                                        <option value="">Pilih Jenis Hubungan</option>
                                                        <option value="ayah" @if($user->mahasiswa->hub_no_telp_darurat == 'ayah') selected @endif>Ayah</option>
                                                        <option value="ibu" @if($user->mahasiswa->hub_no_telp_darurat == 'ibu') selected @endif>Ibu</option>
                                                        <option value="wali" @if($user->mahasiswa->hub_no_telp_darurat == 'wali') selected @endif>Wali Mahasiswa</option>
                                                        <option value="istri" @if($user->mahasiswa->hub_no_telp_darurat == 'istri') selected @endif>Istri</option>
                                                        <option value="lainnya" @if($user->mahasiswa->hub_no_telp_darurat == 'lainnya') selected @endif>Anggota Keluarga Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$user->mahasiswa->alamat}}</textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                        </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()