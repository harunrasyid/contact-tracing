@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    @if(session('input_berhasil'))
    		            <div class="alert alert-success alert-dismissible" role="alert">
    			            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                			<i class="fa fa-check-circle"></i> {{session('input_berhasil')}}
    		            </div>
                    @endif
                    
                    <div class="col-md-12">
                        <form action="/pemantau/{{$user->id}}/updateAkun" method="POST">
                        {{csrf_field()}}
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3>Ubah Alamat Email Akun</h3>
                                </div>
                                <div class="panel-body">

                                    <div class="form-group{{$errors->has('email') ? 'has-error' : ' ' }}">
										<label class="form-label">Email</label>
										<label for="signin-email" class="control-label sr-only">Email</label>
										<input name="email" type="email" class="form-control" placeholder="Email" value="{{$user->email}}">
										@if($errors->has('email'))
                                            <span class="help-block text-danger">{{$errors->first('email')}}</span>
                                    	@endif
									</div>

                                    <h3 style="margin-top: 50px; margin-bottom: 30px;">Ubah Password Akun Pengguna</h3>

                                    <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group{{$errors->has('password') ? 'has-error' : ' ' }}">
										            <label class="form-label">Password Baru</label>
										            <label for="signin-password" class="control-label sr-only">Password Baru</label>
										            <input name="password" id="reg_password" type="password" class="form-control" placeholder="Password" value="{{old('password')}}">
										            <div class="input-group-addon">
                                                        <input type="checkbox" onclick="show_reg_password()"> Show Password
                                                    </div>
										            @if($errors->has('password'))
                                                        <span class="help-block text-danger">{{$errors->first('password')}}</span>
                                    	            @endif
									            </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group{{$errors->has('password_confirm') ? 'has-error' : ' ' }}">
										            <label class="form-label">Konfirmasi Password Baru</label>
										            <label for="signin-password" class="control-label sr-only">Konfirmasi Password Baru</label>
										            <input name="password_confirm" id="conf_password" type="password" class="form-control" placeholder="Konfirmasi Password" value="{{old('password')}}">
										            <div class="input-group-addon">
                                                        <input type="checkbox" onclick="show_conf_password()"> Show Password
                                                    </div>
										            @if($errors->has('password_confirm'))
                                                        <span class="help-block text-danger">{{$errors->first('password_confirm')}}</span>
                                    	            @endif
									            </div>
                                            </div>

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
@endsection