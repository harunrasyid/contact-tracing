@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <form action="/mahasiswa/{{$todaydate}}/{{$kasus_kontak_id}}/post-formB3" method="POST">
                {{csrf_field()}}
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="">Form Pemantauan Kasus Kontak COVID - 19</h4>
                                <h3 class="">Apakah Anda Mengalami Gejala Berikut?</h3>
                                <h6 style="margin-bottom: 25px; color:red;">* Wajib Diisi</h6>
                            </div>
                            <div class="panel-body">
                                <!-- DEMAM -->
                                <div class="form-group{{$errors->has('demam') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Demam (Suhu Tubuh Lebih Dari 38 Derajat) <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="demam" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="demam" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('demam'))
                                        <span class="help-block text-danger">{{$errors->first('demam')}}</span>
                                    @endif
                                </div>

                                <!-- FLU & PILEK -->
                                <div class="form-group{{$errors->has('flu_pilek') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Flu & Pilek <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flu_pilek" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flu_pilek" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('flu_pilek'))
                                        <span class="help-block text-danger">{{$errors->first('flu_pilek')}}</span>
                                    @endif
                                </div>

                                <!-- BATUK -->
                                <div class="form-group{{$errors->has('batuk') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Batuk <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="batuk" value="ya">
                                                <label class="form-check-label" >Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="batuk" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('batuk'))
                                        <span class="help-block text-danger">{{$errors->first('batuk')}}</span>
                                    @endif
                                </div>

                                <!-- SAKIT TENGGOROKAN -->
                                <div class="form-group{{$errors->has('sakit_tenggorokan') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Sakit atau Nyeri Pada Tenggorokan <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('sakit_tenggorokan'))
                                        <span class="help-block text-danger">{{$errors->first('sakit_tenggorokan')}}</span>
                                    @endif
                                </div>
                                        
                                <!-- SESAK NAFAS -->
                                <div class="form-group{{$errors->has('sesak_nafas') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Kesulitan Bernafas atau Sesak Nafas <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sesak_nafas" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sesak_nafas" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('sesak_nafas'))
                                        <span class="help-block text-danger">{{$errors->first('sesak_nafas')}}</span>
                                    @endif
                                </div>

                                <!-- ANOSMIA -->
                                <div class="form-group{{$errors->has('anosmia') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Kehilangan Penciuman (Anosmia) <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anosmia" value="ya">
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anosmia" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('anosmia'))
                                        <span class="help-block text-danger">{{$errors->first('anosmia')}}</span>
                                    @endif
                                </div>

                                <!-- AGEUSIA -->
                                <div class="form-group{{$errors->has('ageusia') ? 'has-error' : ' ' }}">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Kehilangan Pengecapan Rasa (Ageusia) <b style="color:red;">*</b></label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ageusia" value="ya">
                                                        <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ageusia" value="tidak">
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('ageusia'))
                                        <span class="help-block text-danger">{{$errors->first('ageusia')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Gejala Lainnya</label>
                                    <textarea name="diagnosa_lain" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                </div>
                                

                                @if($date == $todaydate)
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                @endif
                            </div>        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection