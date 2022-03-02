@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <form action="/mahasiswa/postforma1-kontak" method="POST" novalidate enctype="multipart/form-data">
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

                <!-- SECTION 3 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Data Pribadi Kasus Terkonfirmasi</h3>
                            </div>
                            <div class="panel-body">
                                <!-- NAMA -->
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input name="nama" type="text" class="form-control" value="{{$user->mahasiswa->nama}}" disabled>
                                </div>
                            
                                <!-- NIM -->
                                <div class="form-group">
                                    <label class="form-label">Nomor Induk Mahasiswa</label>
                                    <input name="NIM" type="text" class="form-control" value="{{$user->mahasiswa->NIM}}" disabled>
                                </div>

                                <!-- TANGGAL LAHIR -->
                                <div class="form-group">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input name="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir" value="{{$user->mahasiswa->tgl_lahir}}" disabled>
                                </div>
                                
                                <!-- NOMOR TELEFON -->
                                <div class="form-group{{$errors->has('no_telp') ? 'has-error' : ' ' }}">
                                    <label class="form-label">Nomor Telefon <b style="color:red;">*</b></label>
                                    <input name="no_telp" type="text" class="form-control" value="{{$user->mahasiswa->no_telp}}">
                                    @if($errors->has('no_telp'))
                                        <span class="help-block text-danger">{{$errors->first('no_telp')}}</span>
                                    @endif
                                </div>
                            
                                <!-- NOMOR TELEFON DARURAT -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Nomor Telefon Darurat <b style="color:red;">*</b></label>
                                            <input name="no_telp_darurat" type="text" class="form-control" value="{{$user->mahasiswa->no_telp_darurat}}">
                                        </div>
                                    </div>
                                            
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Hubungan Dengan Nomor Darurat <b style="color:red;">*</b></label>
                                            <select name="hub_no_telp_darurat" class="form-control" aria-label="Default select example">
                                                <option value="">Pilih Jenis Hubungan</option>
                                                <option value="ayah" @if($user->mahasiswa->hub_no_telp_darurat == 'ayah') selected @endif>Ayah</option>
                                                <option value="ibu" @if($user->mahasiswa->hub_no_telp_darurat == 'ibu') selected @endif>Ibu</option>
                                                <option value="wali" @if($user->mahasiswa->hub_no_telp_darurat == 'wali') selected @endif>Wali Mahasiswa</option>
                                                <option value="istri" @if($user->mahasiswa->hub_no_telp_darurat == 'istri') selected @endif>Istri</option>
                                                <option value="lainnya" @if($user->mahasiswa->hub_no_telp_darurat == 'lainnya') selected @endif>Anggota Keluarga Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- ALAMAT -->
                                <div class="form-group">
                                    <label class="form-label">Alamat <b style="color:red;">*</b></label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$user->mahasiswa->alamat}}</textarea>
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
                                    <label class="form-label">Upload Scan/Foto Bukti Hasil Pengujian Lab COVID-19 <b style="color:red;">*</b></label>
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

                <!-- SECTION 5 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Lokasi Perawatan/Penanganan</h3>
                            </div>
                            <div class="panel-body">
                                
                                <!-- LOKASI PERAWATAN -->
                                <div class="form-group{{$errors->has('lokasi_pasien') ? 'has-error' : ' ' }}">
                                    <label for="lokasi_pasien">Lokasi Perawatan/Penanganan<b style="color:red;">*</b></label>
                                    <select class="form-control" name="lokasi_pasien" id="lokasi_pasien">
                                        <option value="">Pilih Lokasi</option>
                                        <option value="rumah">Rumah/Tempat Tinggal</option>
                                        <option value="kost">Kamar Kost</option>
                                        <option value="rumah sakit">Rumah Sakit</option>
                                    </select>
                                    @if($errors->has('lokasi_pasien'))
                                        <span class="help-block text-danger">{{$errors->first('lokasi_pasien')}}</span>
                                    @endif
                                </div>

                                <!-- RUMAH SAKIT -->
                                <div class="form-group" id="lokasi_rumah_sakit">
                                    <label class="form-label">Nama Rumah Sakit</label>
                                    <input name="nama_rs" type="text" class="form-control">
                                    <label class="form-label">Alamat Rumah Sakit</label>
                                    <textarea name="alamat_rs" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
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
                                <h3 class="">Gejala Kesehatan</h3>
                            </div>
                            <div class="panel-body">

                                <!-- GEJALA -->
                                <div class="form-group{{$errors->has('gejala') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah anda/kasus terkonfirmasi mengalami gejala kesehatan? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda sedang mengalami demam? (Suhu tubuh >38 C) <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami sakit tenggorokan? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami pilek? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami batuk? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami sesak nafas? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami/pernah mengalami muntah - muntah? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami/pernah mengalami mual - mual? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami/pernah mengalami diare? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami/pernah mengalami sakit kepala? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami/pernah mengalami pegal - pegal? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami/pernah mengalami sakit pada persendian? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda kehilangan nafsu makan? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda mengalami kehilangan penciuman dan pengecapan? <b style="color:red;">*</b></label>
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
                                            <label class="form-label">Apakah anda merasa kelelahan dan lemas? <b style="color:red;">*</b></label>
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
                                    <label class="form-label">Jika anda memiliki gejala lainnya, sebutkan pada kolom dibawah ini</label>
                                    <textarea name="gejala_lain" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                    @if($errors->has('gejala_lain'))
                                        <span class="help-block text-danger">{{$errors->first('gejala_lain')}}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 7 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Pre-exsising Condition Pada Kasus Terkonfirmasi</h3>
                            </div>
                            <div class="panel-body">

                                <!-- HAMIL -->
                                <div class="form-group{{$errors->has('kehamilan') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Kehamilan <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kehamilan" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kehamilan" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kehamilan" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('kehamilan'))
                                        <span class="help-block text-danger">{{$errors->first('kehamilan')}}</span>
                                    @endif
                                </div>

                                <!-- OBESITAS -->
                                <div class="form-group{{$errors->has('obesitas') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Obesitas <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="obesitas" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="obesitas" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="obesitas" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('obesitas'))
                                        <span class="help-block text-danger">{{$errors->first('obesitas')}}</span>
                                    @endif
                                </div>

                                <!-- KANKER -->
                                <div class="form-group{{$errors->has('kanker') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Kanker <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kanker" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kanker" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kanker" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('kanker'))
                                        <span class="help-block text-danger">{{$errors->first('kanker')}}</span>
                                    @endif
                                </div>

                                <!-- DIABETES -->
                                <div class="form-group{{$errors->has('diabetes') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Diabetes <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="diabetes" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="diabetes" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="diabetes" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('diabetes'))
                                        <span class="help-block text-danger">{{$errors->first('diabetes')}}</span>
                                    @endif
                                </div>

                                <!-- HIV -->
                                <div class="form-group{{$errors->has('HIV') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">HIV atau penyakit terkait imun lainnya <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="HIV" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="HIV" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="HIV" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('HIV'))
                                        <span class="help-block text-danger">{{$errors->first('HIV')}}</span>
                                    @endif
                                </div>

                                <!-- PENYAKIT JANTUNG -->
                                <div class="form-group{{$errors->has('sakit_jantung') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Penyakit jantung <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sakit_jantung" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sakit_jantung" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sakit_jantung" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('sakit_jantung'))
                                        <span class="help-block text-danger">{{$errors->first('sakit_jantung')}}</span>
                                    @endif
                                </div>

                                <!-- ASTHMA -->
                                <div class="form-group{{$errors->has('asthma') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Asthma <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="asthma" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="asthma" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="asthma" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('asthma'))
                                        <span class="help-block text-danger">{{$errors->first('asthma')}}</span>
                                    @endif
                                </div>

                                <!-- PENYAKIT PARU -->
                                <div class="form-group{{$errors->has('paru_lain') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Penyakit paru - paru selain asthma <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paru_lain" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paru_lain" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paru_lain" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('paru_lain'))
                                        <span class="help-block text-danger">{{$errors->first('paru_lain')}}</span>
                                    @endif
                                </div>

                                <!-- LIVER -->
                                <div class="form-group{{$errors->has('liver') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Penyakit liver/hati <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="liver" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="liver" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="liver" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('liver'))
                                        <span class="help-block text-danger">{{$errors->first('liver')}}</span>
                                    @endif
                                </div>

                                <!-- GANGGUAN HEMATOLOGI -->
                                <div class="form-group{{$errors->has('hematologi') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Gangguan hematologi kronis <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hematologi" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hematologi" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hematologi" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('hematologi'))
                                        <span class="help-block text-danger">{{$errors->first('hematologi')}}</span>
                                    @endif
                                </div>
                            
                                <!-- GINJAL -->
                                <div class="form-group{{$errors->has('ginjal') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Penyakit ginjal <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ginjal" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ginjal" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ginjal" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('ginjal'))
                                        <span class="help-block text-danger">{{$errors->first('ginjal')}}</span>
                                    @endif
                                </div>

                                <!-- SARAF -->
                                <div class="form-group{{$errors->has('saraf') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Penyakit saraf <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="saraf" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="saraf" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="saraf" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('saraf'))
                                        <span class="help-block text-danger">{{$errors->first('saraf')}}</span>
                                    @endif
                                </div>

                                <!-- DONOR -->
                                <div class="form-group{{$errors->has('donor') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Penerima donor organ atau donor sumsum tulang <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="donor" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="donor" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="donor" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('donor'))
                                        <span class="help-block text-danger">{{$errors->first('donor')}}</span>
                                    @endif
                                </div>

                                <!-- LAINNYA -->
                                <div class="form-group">
                                    <label class="form-label">Jika anda memiliki kondisi lainnya, sebutkan pada kolom dibawah ini</label>
                                    <textarea name="kondisi_lain" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 9 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Human Exposure Sebelum Gejala Muncul</h3>
                            </div>
                            <div class="panel-body">
                                
                                <!-- ASAL INFEKSI -->
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah Asal/Sumber Penularan Virus Diketahui? <b style="color:red;">*</b></label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <select class="form-control" name="sumber_infeksi" id="sumber_infeksi">
                                        <option value="">Sumber Infeksi</option>
                                        <option value="ya">Ya</option>
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>


                                <div class="form-group" style="margin-bottom: 20px;" id ="label_sumber_infeksi_dikampus">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah Penularan Terjadi Di Kampus?</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <select class="form-control" name="sumber_infeksi_dikampus" id="sumber_infeksi_dikampus">
                                        <option value="">Penularan Terjadi Di Kampus?</option>
                                        <option value="ya">Ya</option>
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>

                                
                                <div class="form-group" id="sumber_infeksi_diket" name="sumber_infeksi_diket">
                                    <label class="form-label">Orang yang Menularkan</label>
                                    <input name="nama_sumber_infeksi" type="text" class="form-control">

                                    <label class="form-label">NIM/NIP Orang yang Menularkan (Jika Diketahui)</label>
                                    <input name="id_sumber_infeksi" type="text" class="form-control">

                                    <label class="form-label">Lokasi Penularan</label>
                                    <input name="lokasi_sumber_infeksi" type="text" class="form-control">

                                    <label class="form-label">Perkiraan Waktu Penularan</label>
                                    <input name="tgl_penularan" type="date" class="form-control">

                                    <label class="form-label">Kronologi Penularan Virus</label>
                                    <textarea name="kronologi_infeksi" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                </div>

                                <div class="form-group" style="margin-bottom: 100px;" id="sumber_infeksi_tidak_diket" name="sumber_infeksi_tidak_diket">
                                    <div class="col-xs-6">
                                        <label >Kemungkinan Lokasi Exposure/Penularan Virus</label>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sumber_infeksi_tidak_diket" value="rumah">
                                            <label class="form-check-label">Rumah</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sumber_infeksi_tidak_diket" value="kampus">
                                            <label class="form-check-label">Kampus</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sumber_infeksi_tidak_diket" value="tempat lain">
                                            <label class="form-check-label">Tempat Lainnya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- PERJALANAN LOKAL -->
                                <div class="form-group{{$errors->has('perjalanan_lokal') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah Anda Melakukan Perjalanan Lokal (Dalam Negeri) Dalam 14 Hari Terakhir? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perjalanan_lokal" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perjalanan_lokal" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perjalanan_lokal" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('perjalanan_lokal'))
                                        <span class="help-block text-danger">{{$errors->first('perjalanan_lokal')}}</span>
                                    @endif
                                </div>

                                <!-- PERJALANAN INTERNASIONAL -->
                                <div class="form-group{{$errors->has('perjalanan_intr') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah Anda Melakukan Perjalanan Internasional Dalam 14 Hari Terakhir? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perjalanan_intr" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perjalanan_intr" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perjalanan_intr" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('perjalanan_intr'))
                                        <span class="help-block text-danger">{{$errors->first('perjalanan_intr')}}</span>
                                    @endif
                                </div>

                                <!-- KONTAK DENGAN + -->
                                <div class="form-group{{$errors->has('kontak_kasus_terkonfirmasi') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah Dalam 14 Hari Terakhir Anda Melakukan Kontak Dengan Orang yang Terkonfirmasi atau Dicurigai COVID - 19? <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="kontak_kasus_terkonfirmasi" name="kontak_kasus_terkonfirmasi" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="kontak_kasus_terkonfirmasi" name="kontak_kasus_terkonfirmasi" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="kontak_kasus_terkonfirmasi" name="kontak_kasus_terkonfirmasi" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('kontak_kasus_terkonfirmasi'))
                                        <span class="help-block text-danger">{{$errors->first('kontak_kasus_terkonfirmasi')}}</span>
                                    @endif
                                </div>

                                <!-- MENGHADIRI ACARA RESIKO TINGGI -->
                                <div class="form-group{{$errors->has('hadir_acara_berisiko') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Apakah Dalam 14 Hari Terakhir Anda Menghadiri Acara Berkerumun dan Memiliki Resiko Penularan Virus Tinggi? (Acara Keagamaan, Konser, Pernikahan, Dsb) <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadir_acara_berisiko" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadir_acara_berisiko" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hadir_acara_berisiko" value="tidak yakin">
                                                <label class="form-check-label">Tidak Yakin</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('hadir_acara_berisiko'))
                                        <span class="help-block text-danger">{{$errors->first('hadir_acara_berisiko')}}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Berikutnya</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection