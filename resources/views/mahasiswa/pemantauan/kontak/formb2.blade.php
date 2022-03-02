@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <form action="/mahasiswa/{{$date}}/{{$kasus_kontak_id}}/post-formB2" method="POST">
            {{csrf_field()}}
            
                <!-- SECTION 1 -->
                <!--<div class="row">-->
                <!--    <div class="col-md-12">-->
                <!--        <div class="panel">-->
                <!--            <div class="panel-heading">-->
                <!--                <h3 class="">Informed Consent</h3>-->
                <!--            </div>-->
                <!--            <div class="panel-body">-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

                <!-- SECTION 2 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">

                            <div class="panel-heading">
                                <h3 class="">Status Pengisi Formulir</h3>
                                <h6 style="margin-bottom: 25px; color:red;">* Wajib Diisi</h6>
                            </div>

                            <div class="panel-body">

                                <!-- STATUS PENGISI FORMULIR -->
                                <div class="form-group">
                                    <label for="status_pengisi_form">Apakah formulir ini di isi oleh pemilik akun ini? <b style="color:red;">*</b></label>
                                    <select class="form-control" name="status_pengisi_form" id="status_pengisi_form">
                                        <option value="pemilik akun">Ya, Oleh saya sendiri</option>
                                        <option value="mewakili pemilik akun">Tidak, saya mewakilkan pemilik akun ini</option>
                                    </select>
                                </div>

                                <!-- IDENTITAS PENGISI FORMULIR -->
                                <div class="form-group" id="identitas_pengisi_form">

                                    <label class="form-label">Nama</label>
                                    <input name="nama_pengisi_form" type="text" class="form-control">

                                    <label class="form-label">Hubungan Dengan Pemilik Akun</label>
                                    <input name="hub_dengan_pasien" type="text" class="form-control">

                                    <label class="form-label">Nomor Telefon Pengisi Formulir</label>
                                    <input name="no_telp_pengisi_form" type="text" class="form-control">

                                    <label class="form-label">Email Pengisi Formulir</label>
                                    <input name="email_pengisi_form" type="text" class="form-control">

                                    <label class="form-label">Alamat Pengisi Formulir</label>
                                    <textarea name="alamat_pengisi_form" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- SECTION 5 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Gejala Kesehatan Selama Masa Karantina</h3>
                            </div>
                            <div class="panel-body">

                                <!-- GEJALA -->
                                <div class="form-group{{$errors->has('gejala') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda/kasus kontak mengalami gejala kesehatan selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gejala" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gejala" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gejala" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('gejala'))
                                        <span class="help-block text-danger">{{$errors->first('gejala')}}</span>
                                    @endif
                                </div>

                                <!-- DEMAM -->
                                <div class="form-group{{$errors->has('demam') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami demam (Suhu tubuh >38 C) selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="demam" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="demam" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="demam" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('demam'))
                                        <span class="help-block text-danger">{{$errors->first('demam')}}</span>
                                    @endif
                                </div>

                                <!-- SAKIT TENGGOROKAN -->
                                <div class="form-group{{$errors->has('sakit_tenggorokan') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami sakit tenggorokan selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('sakit_tenggorokan'))
                                        <span class="help-block text-danger">{{$errors->first('sakit_tenggorokan')}}</span>
                                    @endif
                                </div>

                                <!-- PILEK -->
                                <div class="form-group{{$errors->has('pilek') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami pilek selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pilek" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pilek" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pilek" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('pilek'))
                                        <span class="help-block text-danger">{{$errors->first('pilek')}}</span>
                                    @endif
                                </div>

                                <!-- BATUK -->
                                <div class="form-group{{$errors->has('batuk') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami batuk selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="batuk" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="batuk" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="batuk" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('batuk'))
                                        <span class="help-block text-danger">{{$errors->first('batuk')}}</span>
                                    @endif
                                </div>

                                <!-- SESAK NAFAS -->
                                <div class="form-group{{$errors->has('sesak_nafas') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda mengalami pernah sesak nafas selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sesak_nafas" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sesak_nafas" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sesak_nafas" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('sesak_nafas'))
                                        <span class="help-block text-danger">{{$errors->first('sesak_nafas')}}</span>
                                    @endif
                                </div>

                                <!-- MUNTAH -->
                                <div class="form-group{{$errors->has('muntah') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami/pernah mengalami muntah - muntah selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="muntah" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="muntah" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="muntah" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('muntah'))
                                        <span class="help-block text-danger">{{$errors->first('muntah')}}</span>
                                    @endif
                                </div>

                                <!-- MUAL -->
                                <div class="form-group{{$errors->has('mual') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mual - mual selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mual" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mual" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mual" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('mual'))
                                        <span class="help-block text-danger">{{$errors->first('mual')}}</span>
                                    @endif
                                </div>

                                <!-- DIARE -->
                                <div class="form-group{{$errors->has('diare') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami diare selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="diare" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="diare" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="diare" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('diare'))
                                        <span class="help-block text-danger">{{$errors->first('diare')}}</span>
                                    @endif
                                </div>

                                <!-- PUSING -->
                                <div class="form-group{{$errors->has('pusing') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami sakit kepala selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pusing" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pusing" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pusing" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('pusing'))
                                        <span class="help-block text-danger">{{$errors->first('pusing')}}</span>
                                    @endif
                                </div>

                                <!-- PEGAL - PEGAL -->
                                <div class="form-group{{$errors->has('pegal') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami pegal - pegal/nyeri pada otot selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pegal" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pegal" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pegal" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('pegal'))
                                        <span class="help-block text-danger">{{$errors->first('pegal')}}</span>
                                    @endif
                                </div>

                                <!-- NYERI SENDI -->
                                <div class="form-group{{$errors->has('nyeri_sendi') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami sakit pada persendian selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nyeri_sendi" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nyeri_sendi" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nyeri_sendi" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('nyeri_sendi'))
                                        <span class="help-block text-danger">{{$errors->first('nyeri_sendi')}}</span>
                                    @endif
                                </div>

                                <!-- NAFSU MAKAN -->
                                <div class="form-group{{$errors->has('nafsu_makan') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah kehilangan nafsu makan selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nafsu_makan" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nafsu_makan" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nafsu_makan" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('nafsu_makan'))
                                        <span class="help-block text-danger">{{$errors->first('nafsu_makan')}}</span>
                                    @endif
                                </div>

                                <!-- ANOSMIA -->
                                <div class="form-group{{$errors->has('anosmia_ageusia') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah mengalami kehilangan penciuman dan pengecapan selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anosmia_ageusia" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anosmia_ageusia" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anosmia_ageusia" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('anosmia_ageusia'))
                                        <span class="help-block text-danger">{{$errors->first('anosmia_ageusia')}}</span>
                                    @endif
                                </div>

                                <!-- KELELAHAN -->
                                <div class="form-group{{$errors->has('lelah_lemas') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda pernah merasa kelelahan dan lemas selama masa karantina? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="lelah_lemas" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="lelah_lemas" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="lelah_lemas" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('lelah_lemas'))
                                        <span class="help-block text-danger">{{$errors->first('lelah_lemas')}}</span>
                                    @endif
                                </div>

                                <!-- TANGGAL GEJALA MUNCUL -->
                                <div class="form-group{{$errors->has('tgl_gejala_pertama') ? 'has-error' : ' ' }}" style="margin-bottom: 30px;">
                                    <label style="margin-bottom: 10px;">Tanggal Gejala Pertama Kali Muncul</label>
                                    <input name="tgl_gejala_pertama" type="date" class="form-control" placeholder="Tanggal Gejala Pertama Muncul">
                                    @if($errors->has('tgl_gejala_pertama'))
                                        <span class="help-block text-danger">{{$errors->first('tgl_gejala_pertama')}}</span>
                                    @endif
                                </div>

                                <!-- LAINNYA -->
                                <div class="form-group{{$errors->has('gejala_lain') ? 'has-error' : ' ' }}">
                                    <label class="form-label">Jika anda memiliki gejala lainnya selama masa karantina, sebutkan pada kolom dibawah ini</label>
                                    <textarea name="gejala_lain" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                    @if($errors->has('gejala_lain'))
                                        <span class="help-block text-danger">{{$errors->first('gejala_lain')}}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>


                    @if($date == $todaydate)
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    @endif
                </div>

            </form>
        </div>
    </div>
</div>
@endsection