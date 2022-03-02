@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">

                <div class="panel-heading">
                    <h3>Pemantauan Rutin Kasus Kontak</h3>
                </div>

                <div class="panel-body">
                    @php
                        $tanggal_mulai = $kasus_kontak->created_at;
                    @endphp

                    @for($i = 1; $i <= 15; $i++)
                        @if( date('Y-m-d',strtotime($date))  ==  date('Y-m-d',strtotime($tanggal_mulai)) )
                            <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge; background-color:#DFF2FF;">
                                <div>
                                    <span class="text-muted">{{ date('d',strtotime($tanggal_mulai)) }}</span>
                                    <span class="text-muted">{{ date('M',strtotime($tanggal_mulai)) }}</span>
                                </div>
                                <div style="min-height: 5em;">
                                    @if($i == 1)
                                        <h5><a href="/mahasiswa/{{ date('Y-m-d',strtotime($tanggal_mulai)) }}/{{$kasus_kontak->id}}/formb1">Pemantauan Awal Kasus Kontak (Form B1)</a></h5>
                                    @elseif($i == 15)
                                        <h5><a href="/mahasiswa/{{ date('Y-m-d',strtotime($tanggal_mulai)) }}/{{$kasus_kontak->id}}/formb2">Pemantauan Akhir Kasus Kontak (Form B2)</a></h5>
                                    @else
                                        <h5><a href="/mahasiswa/{{ date('Y-m-d',strtotime($tanggal_mulai)) }}/{{$kasus_kontak->id}}/formb3">Pemantauan Rutin Kasus Kontak</a></h5>
                                    @endif
                                </div>
                            </div>
                        @elseif( date('Y-m-d',strtotime($date))  >  date('Y-m-d',strtotime($tanggal_mulai)) )
                            <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                <div>
                                    <span class="text-muted">{{ date('d',strtotime($tanggal_mulai)) }}</span>
                                    <span class="text-muted">{{ date('M',strtotime($tanggal_mulai)) }}</span>
                                </div>
                                <div style="min-height: 5em;">
                                    @if($i == 1)
                                        <h5><a href="/mahasiswa/{{ date('Y-m-d',strtotime($tanggal_mulai)) }}/{{$kasus_kontak->id}}/formb1">Pemantauan Awal Kasus Kontak (Form B1)</a></h5>
                                    @elseif($i == 15)
                                        <h5><a href="/mahasiswa/{{ date('Y-m-d',strtotime($tanggal_mulai)) }}/{{$kasus_kontak->id}}/formb2">Pemantauan Akhir Kasus Kontak (Form B2)</a></h5>
                                    @else
                                        <h5><a href="/mahasiswa/{{ date('Y-m-d',strtotime($tanggal_mulai)) }}/{{$kasus_kontak->id}}/formb3">Pemantauan Rutin Kasus Kontak</a></h5>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="col-xs-12 col-sm-6 col-md-3 text-left" style="border-style: ridge;">
                                <div>
                                    <span class="text-muted">{{ date('d',strtotime($tanggal_mulai)) }}</span>
                                    <span class="text-muted">{{ date('M',strtotime($tanggal_mulai)) }}</span>
                                </div>
                                <div style="min-height: 5em;">
                                    @if($i == 1)
                                        <h5><a href="/mahasiswa/{{ date('Y-m-d',strtotime($tanggal_mulai)) }}/{{$kasus_kontak->id}}/formb1">Pemantauan Awal Kasus Kontak (Form B1)</a></h5>
                                    @elseif($i == 15)
                                        <h5><a href="/mahasiswa/{{ date('Y-m-d',strtotime($tanggal_mulai)) }}/{{$kasus_kontak->id}}/formb2">Pemantauan Akhir Kasus Kontak (Form B2)</a></h5>
                                    @else
                                        <h5><a href="/mahasiswa/{{ date('Y-m-d',strtotime($tanggal_mulai)) }}/{{$kasus_kontak->id}}/formb3">Pemantauan Rutin Kasus Kontak</a></h5>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @php
                            $tanggal_mulai->modify('+1 day')
                        @endphp
                    @endfor
                </div>

            </div>
        </div>
    </div>
</div>  
@endsection