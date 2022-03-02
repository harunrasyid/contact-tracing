@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <form action="/mahasiswa/{{$user->id}}/postforma2" method="POST" novalidate enctype="multipart/form-data">
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

                                    <label class="form-label">Hubungan Dengan Pasien</label>
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

                <!-- SECTION 4 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Pengujian Laboratorium</h3>
                            </div>
                            <div class="panel-body">

                                <!-- JENIS TEST -->
                                <div class="form-group{{$errors->has('jenis_test') ? 'has-error' : ' ' }}">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Jenis uji COVID - 19 yang anda terima <b style="color:red;">*</b></label>
                                            <div class="form-check" style="margin-top: 5px;">
                                                <input class="form-check-input" type="radio" name="jenis_test" value="PCR">
                                                <label class="form-check-label">PCR</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_test" value="RDT Antigen">
                                                <label class="form-check-label">RDT-Antigen</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_test" value="Lainnya">
                                                <label class="form-check-label">Lainnya</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('jenis_test'))
                                        <span class="help-block text-danger">{{$errors->first('jenis_test')}}</span>
                                    @endif
                                </div>

                                <!-- BUKTI HASIL TEST -->
                                <div class="form-group{{$errors->has('bukti_hasil_test') ? 'has-error' : ' ' }}">
                                    <label class="form-label">Upload Scan/Foto Hasil Pengujian Lab Negatif COVID - 19 <b style="color:red;">*</b></label>
                                    <input type="file" name="bukti_hasil_test" class="form-control">
                                    @if($errors->has('bukti_hasil_test'))
                                        <span class="help-block text-danger">{{$errors->first('bukti_hasil_test')}}</span>
                                    @endif
                                </div>

                                <!-- TANGGAL PENGUJIAN -->
                                <div class="form-group{{$errors->has('tgl_uji') ? 'has-error' : ' ' }}">
                                    <label style="margin-bottom: 10px;">Tanggal Pengujian / Penggambilan Sampel <b style="color:red;">*</b></label>
                                    <input name="tgl_uji" type="date" class="form-control" placeholder="Tanggal Pengujian">
                                    @if($errors->has('tgl_uji'))
                                        <span class="help-block text-danger">{{$errors->first('tgl_uji')}}</span>
                                    @endif
                                </div>

                                <!-- TANGGAL HASIL PENGUJIAN -->
                                <div class="form-group{{$errors->has('tgl_hasil_uji') ? 'has-error' : ' ' }}">
                                    <label style="margin-bottom: 10px;">Tanggal Hasil Pengujian Keluar <b style="color:red;">*</b></label>
                                    <input name="tgl_hasil_uji" type="date" class="form-control" placeholder="Tanggal Hasil Uji Keluar">
                                    @if($errors->has('tgl_hasil_uji'))
                                        <span class="help-block text-danger">{{$errors->first('tgl_hasil_uji')}}</span>
                                    @endif
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 6 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Gejala Kesehatan Selama Terjangkit COVID - 19</h3>
                            </div>
                            <div class="panel-body">

                                <!-- GEJALA -->
                                <div class="form-group{{$errors->has('gejala') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda/kasus terkonfirmasi pernah mengalami gejala kesehatan selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami demam (Suhu tubuh >38 C) selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami sakit tenggorokan selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami pilek selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami batuk selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami sesak nafas selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami muntah - muntah selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami mual - mual selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami diare selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami sakit kepala selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami pegal - pegal selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami sakit pada persendian selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah kehilangan nafsu makan selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda pernah mengalami kehilangan penciuman dan pengecapan selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda merasa/pernah merasa kelelahan dan lemas selama positif COVID - 19? <b style="color:red;">*</b></label>
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
                                    <label class="form-label">Jika anda memiliki gejala lainnya selama positif COVID - 19, sebutkan pada kolom dibawah ini</label>
                                    <textarea name="gejala_lain" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                    @if($errors->has('gejala_lain'))
                                        <span class="help-block text-danger">{{$errors->first('gejala_lain')}}</span>
                                    @endif
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Laporkan Kesembuhan</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>
</div>
@endsection