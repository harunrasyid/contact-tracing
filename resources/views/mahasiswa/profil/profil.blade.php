@extends('layouts.master')

@section('content')
<div class="main">		
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						@if(session('input_berhasil'))
							<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-check-circle"></i> {{session('input_berhasil')}}
							</div>
        				@endif
						
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left ">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{asset('/img/default.jpg')}}" class="img-circle" alt="Avatar" alt="Avatar" length="100px" width="100px">
										<h3 class="name">{{$user->mahasiswa->nama}}</h3>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
                                <div class="panel panel-profile">
                                    <!-- PROFILE DETAIL -->
                                    <div class="profile-detail">
                                        <div class="profile-info">
                                            <h4 class="heading">Data Pengguna</h4>
                                            <ul class="list-unstyled list-justify">
                                                <li>NIM/NIP/Nomor Identifikasi <span>{{$user->mahasiswa->NIM}}</span></li>
                                                <li>Nama <span>{{$user->mahasiswa->nama}}</span></li>
                                                <li>Fakultas <span>{{$user->mahasiswa->fakultas}}</span></li>
                                                <li>Program Studi <span>{{$user->mahasiswa->prodi}}</span></li>
                                            </ul>
                                        </div>
                                        <div class="profile-info">
                                            <h4 class="heading">Data Pribadi</h4>
                                            <ul class="list-unstyled list-justify">
                                                <li>Tanggal Lahir <span>{{$user->mahasiswa->tgl_lahir}}</span></li>
                                                <li>Nomor Telefon <span>{{$user->mahasiswa->no_telp}}</span></li>
                                                <li>Alamat: </li>
                                                <span>{{$user->mahasiswa->alamat}}</span>
                                            </ul>
                                        </div>
                                        
                                        <div class="profile-info">
                                            <h4 class="heading">Akun</h4>
                                            <ul class="list-unstyled list-justify">
                                                <li>Email <a href="/mahasiswa/{{auth()->user()->id}}/editakun"><span><i class="fas fa-user-cog"></i> {{$user->email}}</span></a></li>
                                                <li>Password <a href="/mahasiswa/{{auth()->user()->id}}/editakun"><span><i class="fas fa-lock"></i> Ubah Password</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="text-center"><a href="/mahasiswa/{{auth()->user()->id}}/edit" class="btn btn-primary">Ubah Profil</a></div>
                                    </div>
                                    <!-- END PROFILE DETAIL -->
                                </div>
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
                                        <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Laporan Kasus COVID - 19</a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
										<div class="table-responsive">
                                            <div class="panel-body no-padding">
                                                <table class="table">
                                                    <thead>
														<tr>
                                            				<th>Tanggal Laporan</th>
                                            				<th>Status</th>
                                        				</tr>
                                                    </thead>
                                                    <tbody>
													@for ($i = 0; $i < $len; $i++)
                                            			<tr>
                                                			<td><a href="">Laporan {{date('d-M-Y', strtotime($pelaporan[$i]->created_at))}}</a></td>
															<td>
																@if($pelaporan[$i]->status == 'proses')
                                                    				<span class="label label-warning">Proses Verifikasi</span>
							                    				@endif
                                                				@if($pelaporan[$i]->status == 'terverifikasi')
                                                    				<span class="label label-success">Terverifikasi</span>
							                    				@endif
                                                				@if($pelaporan[$i]->status == 'ditolak')
                                                    				<span class="label label-danger">Ditolak</span>
							                    				@endif
															</td>
                                            			</tr>
                                        			@endfor
                                                    </tbody>
                                                </table>
				                            </div>
									    </div>

										<div class="margin-top-30 text-center"><a href="#" class="btn btn-default">Lihat Semua Aktivitas</a></div>
									</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@endsection