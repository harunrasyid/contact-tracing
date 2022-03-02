@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <form action="/mahasiswa/{{auth()->user()->id}}/postPemRutin" method="POST">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Apakah Anda Mengalami Gejala Berikut?</h3>
                            </div>
                            <div class="panel-body">
                                    <!-- KESEHATAN -->
                                        <!-- DEMAM -->
                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Demam</label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="demam" value="ya" @if($pem_rutin->demam == 'ya') checked @endif disabled>
                                                        <label class="form-check-label">Ya</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="demam" value="tidak" @if($pem_rutin->demam == 'tidak') checked @endif disabled>
                                                        <label class="form-check-label">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- BATUK -->
                                        <div class="form-group" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Batuk</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="batuk" value="ya" @if($pem_rutin->batuk == 'ya') checked @endif disabled>
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="batuk" value="tidak" @if($pem_rutin->batuk == 'tidak') checked @endif disabled>
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <!-- LEMAS -->
                                        <div class="form-group" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Badan Lemas</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="lemas" value="ya" @if($pem_rutin->lemas == 'ya') checked @endif disabled>
                                                            <label class="form-check-label" >Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="lemas" value="tidak" @if($pem_rutin->lemas == 'tidak') checked @endif disabled>
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- SAKIT KEPALA -->
                                        <div class="form-group" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Sakit Kepala</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sakit_kepala" value="ya" @if($pem_rutin->sakit_kepala == 'ya') checked @endif disabled>
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sakit_kepala" value="tidak" @if($pem_rutin->sakit_kepala == 'tidak') checked @endif disabled>
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- NYERI OTOT -->
                                        <div class="form-group" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Nyeri Pada Otot atau Pegal - Pegal</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pegal" value="ya" @if($pem_rutin->pegal == 'ya') checked @endif disabled>
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pegal" value="tidak" @if($pem_rutin->pegal == 'tidak') checked @endif disabled>
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- SAKIT TENGGOROKAN -->
                                        <div class="form-group" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Sakit atau Nyeri Pada Tenggorokan</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="ya" @if($pem_rutin->sakit_tenggorokan == 'ya') checked @endif disabled>
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="tidak" @if($pem_rutin->sakit_tenggorokan == 'tidak') checked @endif disabled>
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <!-- SESAK NAFAS -->
                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Kesulitan Bernafas atau Sesak Nafas</label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="sesak_nafas" value="ya" @if($pem_rutin->sesak_nafas == 'ya') checked @endif disabled>
                                                        <label class="form-check-label">Ya</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="sesak_nafas" value="tidak" @if($pem_rutin->sesak_nafas == 'tidak') checked @endif disabled>
                                                        <label class="form-check-label">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ANOSMIA -->
                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Kehilangan Penciuman (Anosmia)</label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="anosmia" value="ya" @if($pem_rutin->anosmia == 'ya') checked @endif disabled>
                                                        <label class="form-check-label">Ya</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="anosmia" value="tidak" @if($pem_rutin->anosmia == 'tidak') checked @endif disabled>
                                                        <label class="form-check-label">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- AGEUSIA -->
                                        <div class="form-group" style="margin-bottom: 60px;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Kehilangan Pengecapan Rasa (Ageusia)</label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ageusia" value="ya" @if($pem_rutin->ageusia == 'ya') checked @endif disabled>
                                                        <label class="form-check-label">Ya</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ageusia" value="tidak" @if($pem_rutin->ageusia == 'tidak') checked @endif disabled>
                                                        <label class="form-check-label">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- KONTAK -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Apakah anda pernah melakukan kontak dengan kasus terkonfirmasi COVID - 19?</label>
                                                </div>
                                                <div class="col-xs-2">
                                                    <input class="form-check-input" type="radio" name="kontak" value="pernah" @if($pem_rutin->kontak == 'pernah') checked @endif disabled>
                                                    <label class="form-check-label"> Pernah</label>
                                                </div>
                                                <div class="col-xs-2">
                                                    <input class="form-check-input" type="radio" name="kontak" value="tidak pernah" @if($pem_rutin->kontak == 'tidak pernah') checked @endif disabled>
                                                    <label class="form-check-label"> Tidak Pernah</label>
                                                </div>
                                                <div class="col-xs-2">
                                                    <input class="form-check-input" type="radio" name="kontak" value="tidak yakin" @if($pem_rutin->kontak == 'tidak yakin') checked @endif disabled>
                                                    <label class="form-check-label"> Tidak Yakin</label>
                                                </div>
                                            </div>
                                        </div>
                            </div>        
                        </div>                
                    </div>
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Rencana Masuk Kampus</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>WAKTU</th>
                                            <th>GEDUNG</th>
                                            <th>RUANGAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $len; $i++)
                                            <tr>
                                                <td><a href="">{{$lokasi_pem_rutin[$i]->waktu}}</a></td>
                                                <td><a href="">{{$lokasi_pem_rutin[$i]->gedung}}</a></td>
                                                <td><a href="">{{$lokasi_pem_rutin[$i]->ruang}}</a></td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>

                            </div>        
                        </div>                
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection