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
                    
                    @if(session('input_gagal'))
    		            <div class="alert alert-danger alert-dismissible" role="alert">
    			            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                			<i class="fa fa-check-circle"></i> {{session('input_gagal')}}
    		            </div>
                    @endif
                    
                    <div class="col-md-12">
                        <div class="panel">

                            <div class="panel-heading">
                                <h3>Data Laporan Kasus Terkonfirmasi COVID - 19</h3> 
                                <div class="right">
                                    <form method="GET" action="/pemantau/laporan-kasus-terkonfirmasi">
                                        <div class="input-group mb-3">
                                            <input type="text" name="cari" class="form-control" placeholder="Cari nama...">
                                        </div>
				                    </form>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="custom-tabs-line tabs-line-bottom left-aligned">
                    				<ul class="nav" role="tablist">
                    					<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Semua Laporan</a></li>
                    					<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Proses Verifikasi</a></li>
                    					<li class=""><a href="#tab-bottom-left3" role="tab" data-toggle="tab" aria-expanded="false">Terverifikasi</a></li>
                    					<li class=""><a href="#tab-bottom-left4" role="tab" data-toggle="tab" aria-expanded="false">Ditolak</a></li>
                    					<li class=""><a href="#tab-bottom-left5" role="tab" data-toggle="tab" aria-expanded="false">Selesai/Sembuh</a></li>
                    				</ul>
                    			</div>
                    	    </div>

                            <div class="tab-content">
                				<div class="tab-pane fade active in" id="tab-bottom-left1">
                    				<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO. LAPORAN</th>
                                                <th>NAMA</th>
                                                <th>NIM/NIP/NO.IDENTITAS</th>
                                                <th>TANGGAL LAPORAN</th>
                                                <th>STATUS LAPORAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_kasus as $kasus)
                                            <tr>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->id}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->nama}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->NIM}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{date('d-M-Y', strtotime($kasus->created_at))}}</a></td>
                                                <td>
                                                    @if($kasus->status == 'proses')
                                                        <span class="label label-warning">Proses Verifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'terverifikasi')
                                                        <span class="label label-success">Terverifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'ditolak')
                                                        <span class="label label-danger">Ditolak</span>
    							                    @endif
    							                    @if($kasus->status == 'selesai')
                                                        <span class="label label-primary">Selesai</span>
    							                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                				</div>
                				
                				
                				<div class="tab-pane fade" id="tab-bottom-left2">
                    				<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO. LAPORAN</th>
                                                <th>NAMA</th>
                                                <th>NIM/NIP/NO.IDENTITAS</th>
                                                <th>TANGGAL LAPORAN</th>
                                                <th>STATUS LAPORAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_kasus_proses as $kasus)
                                            <tr>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->id}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->nama}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->NIM}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{date('d-M-Y', strtotime($kasus->created_at))}}</a></td>
                                                <td>
                                                    @if($kasus->status == 'proses')
                                                        <span class="label label-warning">Proses Verifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'terverifikasi')
                                                        <span class="label label-success">Terverifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'ditolak')
                                                        <span class="label label-danger">Ditolak</span>
    							                    @endif
    							                    @if($kasus->status == 'selesai')
                                                        <span class="label label-primary">Selesai</span>
    							                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                				</div>
                				
                				<div class="tab-pane fade" id="tab-bottom-left3">
                    				<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO. LAPORAN</th>
                                                <th>NAMA</th>
                                                <th>NIM/NIP/NO.IDENTITAS</th>
                                                <th>TANGGAL LAPORAN</th>
                                                <th>STATUS LAPORAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_kasus_terverifikasi as $kasus)
                                            <tr>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->id}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->nama}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->NIM}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{date('d-M-Y', strtotime($kasus->created_at))}}</a></td>
                                                <td>
                                                    @if($kasus->status == 'proses')
                                                        <span class="label label-warning">Proses Verifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'terverifikasi')
                                                        <span class="label label-success">Terverifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'ditolak')
                                                        <span class="label label-danger">Ditolak</span>
    							                    @endif
    							                    @if($kasus->status == 'selesai')
                                                        <span class="label label-primary">Selesai</span>
    							                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                				</div>
                				
                				<div class="tab-pane fade" id="tab-bottom-left4">
                				    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO. LAPORAN</th>
                                                <th>NAMA</th>
                                                <th>NIM/NIP/NO.IDENTITAS</th>
                                                <th>TANGGAL LAPORAN</th>
                                                <th>STATUS LAPORAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_kasus_ditolak as $kasus)
                                            <tr>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->id}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->nama}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->NIM}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{date('d-M-Y', strtotime($kasus->created_at))}}</a></td>
                                                <td>
                                                    @if($kasus->status == 'proses')
                                                        <span class="label label-warning">Proses Verifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'terverifikasi')
                                                        <span class="label label-success">Terverifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'ditolak')
                                                        <span class="label label-danger">Ditolak</span>
    							                    @endif
    							                    @if($kasus->status == 'selesai')
                                                        <span class="label label-primary">Selesai</span>
    							                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                				</div>
                				
                				<div class="tab-pane fade" id="tab-bottom-left5">
                    				<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO. LAPORAN</th>
                                                <th>NAMA</th>
                                                <th>NIM/NIP/NO.IDENTITAS</th>
                                                <th>TANGGAL LAPORAN</th>
                                                <th>STATUS LAPORAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_kasus_selesai as $kasus)
                                            <tr>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->id}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->nama}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus->user->mahasiswa->NIM}}</a></td>
                                                <td><a href="/pemantau/{{$kasus->id}}/detail-laporan-kasus-terkonfirmasi">{{date('d-M-Y', strtotime($kasus->created_at))}}</a></td>
                                                <td>
                                                    @if($kasus->status == 'proses')
                                                        <span class="label label-warning">Proses Verifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'terverifikasi')
                                                        <span class="label label-success">Terverifikasi</span>
    							                    @endif
                                                    @if($kasus->status == 'ditolak')
                                                        <span class="label label-danger">Ditolak</span>
    							                    @endif
    							                    @if($kasus->status == 'selesai')
                                                        <span class="label label-primary">Selesai</span>
    							                    @endif
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
        </div>
    </div>
@endsection