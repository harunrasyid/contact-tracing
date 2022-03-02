@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Pengisian Survei Pemantauan Kesehatan</h3>
                </div>
                <div class="panel-body">
                    <!-- TABBED CONTENT -->
					<div class="custom-tabs-line tabs-line-bottom left-aligned">
						<ul class="nav" role="tablist">
                            <li class="active"><a href="#sep2021" role="tab" data-toggle="tab">Sep 2021</a></li>
							<li class="inactive"><a href="#okt2021" role="tab" data-toggle="tab">Okt 2021</a></li>
                            <li class="inactive"><a href="#nov2021" role="tab" data-toggle="tab">Nov 2021</a></li>
						</ul>
					</div>

                    <!-- September -->
                    <div class="tab-content">
					    <div class="tab-pane fade in active" id="sep2021">
                            @php
                                $m = 9
                            @endphp

                            @for ($i = 1; $i <= 30; $i++)
                                @if($i == $date and $m == $month)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge; background-color:#DFF2FF;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @elseif($i < $date and $m == $month)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/show_pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @elseif($m < $month)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/show_pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @else
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @endif
                            @endfor
					    </div>
                        
                        <!-- Oktober -->
                        <div class="tab-pane fade" id="okt2021">
                            @php
                                $m = 10
                            @endphp

                            @for ($i = 1; $i <= 31; $i++)
                                @if($i == $date and $m == $month)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge; background-color:#DFF2FF;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @elseif($i < $date and $m == $month)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/show_pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @elseif($m < $month)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/show_pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @else
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @endif
                            @endfor
					    </div>

                        <!-- November -->
                        <div class="tab-pane fade" id="nov2021">
                            @php
                                $m = 11
                            @endphp

                            @for ($i = 1; $i <= 30; $i++)
                                @if($i == $date and $m == $month)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge; background-color:#DFF2FF;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @elseif($i < $date and $m == $month)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/show_pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @elseif($m < $month)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/show_pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @else
                                <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                    <div>
                                        <span class="text-muted">{{$i}}</span>
                                        <span class="text-muted">September</span>
                                    </div>
                                    <div style="min-height: 5em;">
                                        <h5><a href="/mahasiswa/{{auth()->user()->id}}/pem_rutin/{{$year}}-{{$m}}-{{$i}}">Pemantauan Kesehatan Rutin</a></h5>
                                    </div>
                                </div>
                                @endif
                            @endfor
					    </div>
						<!-- END TABBED CONTENT -->
					</div>
                </div>
        </div>
    </div>
</div>
@endsection