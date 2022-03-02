@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h2>Anda Sekarang Berada Di Dalam {{$lokasi_kegiatan->ruangan}} - {{$lokasi_kegiatan->gedung}}</h2>
                    </div>
                    <div class="panel-body">
                        <a href="/mahasiswa/keluarLokasiKegiatan"><button type="button" class="btn btn-danger btn-block">Keluar Dari {{$lokasi_kegiatan->ruangan}}</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection