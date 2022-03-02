@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">

                            <div class="panel-heading">
                                <h3>Data Pemantauan Kasus Kontak</h3> 
                                <div class="right">
                                    <form method="GET" action="/pemantau/pemantauan-kasus-kontak">
                                        <div class="input-group mb-3">
                                            <input type="text" name="cari" class="form-control" placeholder="Cari nama...">
                                        </div>
				                    </form>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="custom-tabs-line tabs-line-bottom left-aligned">
                    				<ul class="nav" role="tablist">
                    					<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Semua Kasus Kontak</a></li>
                    					<li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Masa Pemantauan & Karantina</a></li>
                    					<li class=""><a href="#tab-bottom-left3" role="tab" data-toggle="tab" aria-expanded="false">Selesai Pemantauan/Sehat</a></li>
                    					<li class=""><a href="#tab-bottom-left4" role="tab" data-toggle="tab" aria-expanded="false">Positif COVID - 19</a></li>
                    				</ul>
                    			</div>                                

                                <div class="tab-content">
                    				<div class="tab-pane fade active in" id="tab-bottom-left1">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NAMA KASUS KONTAK</th>
                                                    <th>NIM/NIP/NO. IDENTITAS</th>
                                                    <th>KLASTER KASUS POSITIF COVID - 19</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($data_kasus_kontak as $kasus_kontak)
                                                <tr>
                                                    <td><a href="/pemantau/{{$kasus_kontak->id}}/pemantauan-kasus-kontak">{{$kasus_kontak->user->mahasiswa->nama}}</a></td>
                                                    <td><a href="/pemantau/{{$kasus_kontak->id}}/pemantauan-kasus-kontak">{{$kasus_kontak->user->mahasiswa->NIM}}</a></td>
                                                    <td><a href="/pemantau/{{$kasus_kontak->pelaporan_kasus_terkonfirmasi_id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus_kontak->pelaporan_kasus_terkonfirmasi_id}}</a></td>
                                                    <td>
                                                        @if($kasus_kontak->status == 'pemantauan')
                                                            <span class="label label-warning">Masa Pemantauan</span>
        							                    @endif
                                                        @if($kasus_kontak->status == 'selesai')
                                                            <span class="label label-success">Sehat</span>
        							                    @endif
                                                        @if($kasus_kontak->status == 'terkonfirmasi')
                                                            <span class="label label-danger">Positif COVID - 19</span>
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
                                                    <th>NAMA KASUS KONTAK</th>
                                                    <th>NIM/NIP/NO. IDENTITAS</th>
                                                    <th>KLASTER KASUS POSITIF COVID - 19</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($data_kasus_kontak_pemantauan as $kasus_kontak)
                                                <tr>
                                                    <td><a href="/pemantau/{{$kasus_kontak->id}}/pemantauan-kasus-kontak">{{$kasus_kontak->user->mahasiswa->nama}}</a></td>
                                                    <td><a href="/pemantau/{{$kasus_kontak->id}}/pemantauan-kasus-kontak">{{$kasus_kontak->user->mahasiswa->NIM}}</a></td>
                                                    <td><a href="/pemantau/{{$kasus_kontak->pelaporan_kasus_terkonfirmasi_id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus_kontak->pelaporan_kasus_terkonfirmasi_id}}</a></td>
                                                    <td>
                                                        @if($kasus_kontak->status == 'pemantauan')
                                                            <span class="label label-warning">Masa Pemantauan</span>
        							                    @endif
                                                        @if($kasus_kontak->status == 'selesai')
                                                            <span class="label label-success">Sehat</span>
        							                    @endif
                                                        @if($kasus_kontak->status == 'terkonfirmasi')
                                                            <span class="label label-danger">Positif COVID - 19</span>
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
                                                    <th>NAMA KASUS KONTAK</th>
                                                    <th>NIM/NIP/NO. IDENTITAS</th>
                                                    <th>KLASTER KASUS POSITIF COVID - 19</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($data_kasus_kontak_selesai as $kasus_kontak)
                                                <tr>
                                                    <td><a href="/pemantau/{{$kasus_kontak->id}}/pemantauan-kasus-kontak">{{$kasus_kontak->user->mahasiswa->nama}}</a></td>
                                                    <td><a href="/pemantau/{{$kasus_kontak->id}}/pemantauan-kasus-kontak">{{$kasus_kontak->user->mahasiswa->NIM}}</a></td>
                                                    <td><a href="/pemantau/{{$kasus_kontak->pelaporan_kasus_terkonfirmasi_id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus_kontak->pelaporan_kasus_terkonfirmasi_id}}</a></td>
                                                    <td>
                                                        @if($kasus_kontak->status == 'pemantauan')
                                                            <span class="label label-warning">Masa Pemantauan</span>
        							                    @endif
                                                        @if($kasus_kontak->status == 'selesai')
                                                            <span class="label label-success">Sehat</span>
        							                    @endif
                                                        @if($kasus_kontak->status == 'terkonfirmasi')
                                                            <span class="label label-danger">Positif COVID - 19</span>
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
                                                    <th>NAMA KASUS KONTAK</th>
                                                    <th>NIM/NIP/NO. IDENTITAS</th>
                                                    <th>KLASTER KASUS POSITIF COVID - 19</th>
                                                    <th>STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($data_kasus_kontak_terkonfirmasi as $kasus_kontak)
                                                <tr>
                                                    <td><a href="/pemantau/{{$kasus_kontak->id}}/pemantauan-kasus-kontak">{{$kasus_kontak->user->mahasiswa->nama}}</a></td>
                                                    <td><a href="/pemantau/{{$kasus_kontak->id}}/pemantauan-kasus-kontak">{{$kasus_kontak->user->mahasiswa->NIM}}</a></td>
                                                    <td><a href="/pemantau/{{$kasus_kontak->pelaporan_kasus_terkonfirmasi_id}}/detail-laporan-kasus-terkonfirmasi">{{$kasus_kontak->pelaporan_kasus_terkonfirmasi_id}}</a></td>
                                                    <td>
                                                        @if($kasus_kontak->status == 'pemantauan')
                                                            <span class="label label-warning">Masa Pemantauan</span>
        							                    @endif
                                                        @if($kasus_kontak->status == 'selesai')
                                                            <span class="label label-success">Sehat</span>
        							                    @endif
                                                        @if($kasus_kontak->status == 'terkonfirmasi')
                                                            <span class="label label-danger">Positif COVID - 19</span>
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