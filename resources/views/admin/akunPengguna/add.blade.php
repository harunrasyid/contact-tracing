@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2>Pendaftaran Akun</h2>
                        </div>
                        <div class="panel-body">
                             <form action="/postadd" method="POST" novalidate>
                                	{{csrf_field()}}
									<h4 style="margin-bottom: 25px">Data Pribadi</h4>
                                    <div class="form-group{{$errors->has('nama') ? 'has-error' : ' ' }}">
                                        <label class="form-label">Nama</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" value="{{old('nama')}}">
                                        @if($errors->has('nama'))
                                            <span class="help-block text-danger">{{$errors->first('nama')}}</span>
                                        @endif
                                    </div>

									<div class="form-group{{$errors->has('tgl_lahir') ? 'has-error' : ' ' }}">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input name="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir" value="{{old('tgl_lahir')}}">
                                        @if($errors->has('tgl_lahir'))
                                            <span class="help-block text-danger">{{$errors->first('tgl_lahir')}}</span>
                                        @endif
                                    </div>

									<!-- STATUS-->
                                	<div class="form-group">
                                    	<label for="status">Status</label>
                                    	<select class="form-control" name="status" id="status">
                                        	<option value="mahasiswa">Mahasiswa</option>
                                        	<option value="dosen">Dosen/Asisten Akademik</option>
											<option value="karyawan">Karyawan</option>
											<option value="tenant">Tenant ITB</option>
                                    	</select>
                                	</div>

									<!-- NOMOR ID -->
										<div class="form-group{{$errors->has('NIM') ? 'has-error' : ' ' }}">
											<label class="form-label">Nomor Induk Mahasiswa/Nomor Induk Pegawai/Nomor Tenant</label>
											<input name="NIM" type="text" class="form-control"  placeholder="Nomor Induk Mahasiswa/Nomor Induk Pegawai/Nomor Tenant" value="{{old('NIM')}}">
											@if($errors->has('NIM'))
												<span class="help-block text-danger">{{$errors->first('NIM')}}</span>
											@endif
										</div>

										<div class="form-group{{$errors->has('fakultas') ? 'has-error' : ' ' }}">
											<label class="form-label">Fakultas</label>
											<select name="fakultas" class="form-control">
												<option selected>Pilih Fakultas
												<option value="FITB {{(old('fakultas') == 'FITB') ? 'selected' : ' '}}">Fakultas Ilmu dan Teknologi Kebumian</option>
												<option value="FMIPA {{(old('fakultas') == 'FMIPA') ? 'selected' : ' '}}">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
												<option value="FSRD {{(old('fakultas') == 'FSRD') ? 'selected' : ' '}}">Fakultas Seni Rupa dan Desain</option>
												<option value="FTI {{(old('fakultas') == 'FTI') ? 'selected' : ' '}}">Fakultas Teknologi Industri</option>
												<option value="FTMD {{(old('fakultas') == 'FTMD') ? 'selected' : ' '}}">Fakultas Teknik Mesin dan Dirgantara</option>
												<option value="FTTM {{(old('fakultas') == 'FTTM') ? 'selected' : ' '}}">Fakultas Teknik Pertambangan dan Perminyakan</option>
												<option value="FTSL {{(old('fakultas') == 'FTSL') ? 'selected' : ' '}}">Fakultas Teknik Sipil dan Lingkungan</option>
												<option value="SAPPK {{(old('fakultas') == 'SAPPK') ? 'selected' : ' '}}">Sekolah Arsitektur, Perencanaan dan Pengembangan Kebijakan</option>
												<option value="SBM {{(old('fakultas') == 'SBM') ? 'selected' : ' '}}">Sekolah Bisnis dan Manajemen</option>
												<option value="SF {{(old('fakultas') == 'SF') ? 'selected' : ' '}}">Sekolah Farmasi</option>
												<option value="SITH {{(old('fakultas') == 'SITH') ? 'selected' : ' '}}">Sekolah Ilmu dan Teknologi Hayati</option>
												<option value="STEI {{(old('fakultas') == 'STEI') ? 'selected' : ' '}}">Sekolah Teknik Elektro dan Informatika</option>
											</select>
											@if($errors->has('fakultas'))
												<span class="help-block text-danger">{{$errors->first('fakultas')}}</span>
											@endif
										</div>

										<div class="form-group{{$errors->has('prodi') ? 'has-error' : ' ' }}">
											<label class="form-label">Program Studi</label>
											<input name="prodi" type="text" class="form-control"  placeholder="Program Studi" value="{{old('prodi')}}">
											@if($errors->has('prodi'))
												<span class="help-block text-danger">{{$errors->first('prodi')}}</span>
											@endif
										</div>

									<div class="form-group{{$errors->has('no_telp') ? 'has-error' : ' ' }}">
                                        <label class="form-label">Nomor Telefon/Handphone</label>
                                        <input name="no_telp" type="text" class="form-control"  placeholder="Nomor Telefon/Handphone" value="{{old('no_telp')}}">
                                        @if($errors->has('no_telp'))
                                            <span class="help-block text-danger">{{$errors->first('no_telp')}}</span>
                                        @endif
                                    </div>

									<div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group{{$errors->has('no_telp_darurat') ? 'has-error' : ' ' }}">
                                                    <label class="form-label">Nomor Telefon Darurat</label>
                                                    <input name="no_telp_darurat" type="text" class="form-control" placeholder="Nomor Telefon/Handphone" value="{{old('no_telp_darurat')}}">
													@if($errors->has('no_telp_darurat'))
                                            			<span class="help-block text-danger">{{$errors->first('no_telp_darurat')}}</span>
                                        			@endif
												</div>
                                            </div>
                                            
                                            <div class="col-sm-6">
												<div class="form-group{{$errors->has('hub_no_telp_darurat') ? 'has-error' : ' ' }}">
                                        			<label class="form-label">Hubungan Dengan Pemilik Nomor Telefon Darurat</label>
                                        			<select name="hub_no_telp_darurat" class="form-control">
                                            			<option selected>Pilih Hubungan
                                            			<option value="ayah {{(old('hub_no_telp_darurat') == 'ayah') ? 'selected' : ' '}}">Ayah</option>
														<option value="ibu {{(old('hub_no_telp_darurat') == 'ibu') ? 'selected' : ' '}}">Ibu</option>
														<option value="wali {{(old('hub_no_telp_darurat') == 'wali') ? 'selected' : ' '}}">Wali Mahasiswa</option>
													</select>
                                        			@if($errors->has('hub_no_telp_darurat'))
                                            			<span class="help-block text-danger">{{$errors->first('hub_no_telp_darurat')}}</span>
                                        			@endif
                                    			</div>
                                            </div>
                                    	</div>

									<div class="form-group{{$errors->has('alamat') ? 'has-error' : ' ' }}">
                                        <label class="form-label">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
                                        @if($errors->has('alamat'))
                                            <span class="help-block text-danger">{{$errors->first('alamat')}}</span>
                                        @endif
                                    </div>

									<h4 style="margin-bottom: 25px; margin-top: 40px">Data Akun</h4>

									<div class="form-group{{$errors->has('email') ? 'has-error' : ' ' }}">
										<label class="form-label">Email</label>
										<label for="signin-email" class="control-label sr-only">Email</label>
										<input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}">
										@if($errors->has('email'))
                                            <span class="help-block text-danger">{{$errors->first('email')}}</span>
                                    	@endif
									</div>

									<div class="form-group{{$errors->has('password') ? 'has-error' : ' ' }}">
										<label class="form-label">Password</label>
										<label for="signin-password" class="control-label sr-only">Password</label>
										<input name="password" type="password" class="form-control" placeholder="Password" value="{{old('password')}}">
										@if($errors->has('password'))
                                            <span class="help-block text-danger">{{$errors->first('password')}}</span>
                                    	@endif
									</div>

									<div class="form-group{{$errors->has('password_confirm') ? 'has-error' : ' ' }}">
										<label class="form-label">Konfirmasi Password</label>
										<label for="signin-password" class="control-label sr-only">Konfirmasi Password</label>
										<input name="password_confirm" type="password" class="form-control" placeholder="Konfirmasi Password" value="{{old('password')}}">
										@if($errors->has('password_confirm'))
                                            <span class="help-block text-danger">{{$errors->first('password_confirm')}}</span>
                                    	@endif
									</div>
                                                
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Register</button>
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