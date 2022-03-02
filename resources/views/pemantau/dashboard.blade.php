@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">


            <div class="row" style="margin-bottom : 70px">
                @if(session('input_berhasil'))
		            <div class="alert alert-success alert-dismissible" role="alert">
			            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            			<i class="fa fa-check-circle"></i> {{session('input_berhasil')}}
		            </div>
                @endif

                <!-- FITUR 1 -->
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <a href="/pemantau/{{auth()->user()->id}}/editakun">
                        <i class="fas fa-cog fa-7x"></i>
                        <h4>Pengaturan Akun</h4>  
                    </a>
                </div>
                
                <!-- FITUR 2 -->
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <a href="/pemantau/laporan-kasus-terkonfirmasi">
                        <i class="fas fa-exclamation-triangle fa-7x" style="color:red" ></i>
                        <h4>Laporan Kasus Positif COVID - 19</h4>  
                    </a>
                </div>

                <!-- FITUR 3 -->
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <a href="/pemantau/pemantauan-kasus-kontak">
                        <i class="fas fa-notes-medical fa-7x"></i>
                        <h4>Pemantauan Kasus Kontak</h4>  
                    </a>
                </div>

                <!-- FITUR  -->
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <a href="/post-index">
                        <i class="fas fa-newspaper fa-7x"></i>
                        <h4>Informasi Seputar COVID - 19</h4>  
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel">

                        <div class="panel-heading">
                            <h3 style="text-align:center">Tracking Kasus Aktif COVID - 19 {{auth()->user()->pemantau->nama}}</h3>
                        </div>

                        <div class="panel-body">
                            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                                <a href="/pemantau/laporan-kasus-terkonfirmasi">
                                    <h1>{{$kasus_terkonfirmasi_aktif}}</h1>
                                    <h4>Kasus Terkonfirmasi COVID - 19</h4>  
                                </a>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                                <a href="">
                                    <h1>{{$kasus_kontak_aktif}}</h1>
                                    <h4>Kasus Kontak</h4>  
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 style="text-align:center">Tracking Kasus Kumulatif COVID - 19 {{auth()->user()->pemantau->nama}}</h3>
                        </div>

                        <div class="panel-body">
                            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                                <a href="/pemantau/laporan-kasus-terkonfirmasi">
                                    <h1>{{$kasus_terkonfirmasi_kumulatif}}</h1>
                                    <h4>Kasus Terkonfirmasi COVID - 19</h4>  
                                </a>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                                <a href="">
                                    <h1>{{$kasus_kontak_kumulatif}}</h1>
                                    <h4>Kasus Kontak</h4>  
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">

                        <div class="panel-body">
                            <div id="kasus-harian"></div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        Highcharts.chart('kasus-harian', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Kasus COVID - 19 Harian {{auth()->user()->pemantau->nama}}'
            },
            subtitle: {
                text: '{{ date('Y/M/d',strtotime($tanggal_awal)) }} - {{ date('Y/M/d',strtotime($tanggal_akhir)) }}'
            },
            xAxis: {
                categories: {!! json_encode($tanggal_kasus_harian) !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Kasus'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} Kasus </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Kasus Harian',
                data: {!! json_encode($kasus_harian) !!}

            }]
        });
    </script>
@endsection