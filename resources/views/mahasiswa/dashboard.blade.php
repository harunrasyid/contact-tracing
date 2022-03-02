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
                
                @if(auth()->user()->mahasiswa->status_kesehatan == 'sehat')
                    <!-- FITUR 1 -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/mahasiswa/{{auth()->user()->id}}/profil">
                            <i class="fas fa-user-circle fa-7x"></i>
                            <h4>Profil & Data Pribadi</h4>  
                        </a>
                    </div>
                
                    <!-- FITUR 2 -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/mahasiswa/qrcode">
                            <i class="fas fa-map-marker-alt fa-7x"></i>
                            <h4>Pendataan Lokasi Kegiatan</h4>  
                        </a>
                    </div>

                    <!-- FITUR 3 -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/mahasiswa/{{auth()->user()->id}}/forma1">
                            <i class="fas fa-exclamation-triangle fa-7x" style="color:red" ></i>
                            <h4>Pelaporan Kasus Positif COVID - 19</h4>  
                        </a>
                    </div>

                    <!-- FITUR  -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/post-index">
                            <i class="fas fa-newspaper fa-7x"></i>
                            <h4>Informasi Seputar COVID - 19</h4>  
                        </a>
                    </div>
                @endif

                @if(auth()->user()->mahasiswa->status_kesehatan == 'terkonfirmasi')
                    <!-- FITUR 1 -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/mahasiswa/{{auth()->user()->id}}/profil">
                            <i class="fas fa-user-circle fa-7x"></i>
                            <h4>Profil & Data Pribadi</h4>  
                        </a>
                    </div>
                
                    <!-- FITUR 2 -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/mahasiswa/{{auth()->user()->id}}/forma2">
                            <i class="fas fa-notes-medical fa-7x"></i>
                            <h4>Lapor Kesembuhan</h4>  
                        </a>
                    </div>

                    <!-- FITUR  -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/post-index">
                            <i class="fas fa-newspaper fa-7x"></i>
                            <h4>Informasi Seputar COVID - 19</h4>  
                        </a>
                    </div>
                @endif

                @if(auth()->user()->mahasiswa->status_kesehatan == 'kontak')
                    <!-- FITUR 1 -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/mahasiswa/{{auth()->user()->id}}/profil">
                            <i class="fas fa-user-circle fa-7x"></i>
                            <h4>Profil & Data Pribadi</h4>  
                        </a>
                    </div>
                
                    <!-- FITUR 2 -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/mahasiswa/{{auth()->user()->id}}/pemantauan-kontak">
                            <i class="fas fa-notes-medical fa-7x"></i>
                            <h4>Pemantauan Rutin Kasus Kontak</h4>  
                        </a>
                    </div>

                    <!-- FITUR 3 -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/mahasiswa/{{auth()->user()->id}}/forma1-kontak">
                            <i class="fas fa-exclamation-triangle fa-7x" style="color:red" ></i>
                            <h4>Pelaporan Kasus Positif COVID - 19</h4>  
                        </a>
                    </div>

                    <!-- FITUR  -->
                    <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                        <a href="/post-index">
                            <i class="fas fa-newspaper fa-7x"></i>
                            <h4>Informasi Seputar COVID - 19</h4>  
                        </a>
                    </div>
                @endif


            </div>
        </div>
    </div>
</div>
@endsection