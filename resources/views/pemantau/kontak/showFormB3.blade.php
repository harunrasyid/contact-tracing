@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <form>
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Hasil Pengisian Form Pemantauan Kasus Kontak COVID - 19</h3>
                            </div>
                            <div class="panel-body">
                                
                                <!-- DEMAM -->
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Demam (Suhu Tubuh Lebih Dari 38 Derajat)</label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="demam" value="ya" @if($form_b3->demam == 'ya') checked @endif disabled>
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="demam" value="tidak" @if($form_b3->demam == 'tidak') checked @endif disabled>
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- FLU & PILEK -->
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Flu & Pilek</label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flu_pilek" value="ya" @if($form_b3->flu_pilek == 'ya') checked @endif disabled>
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flu_pilek" value="tidak" @if($form_b3->flu_pilek == 'tidak') checked @endif disabled>
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
                                                <input class="form-check-input" type="radio" name="batuk" value="ya" @if($form_b3->batuk == 'ya') checked @endif disabled>
                                                <label class="form-check-label" >Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="batuk" value="tidak" @if($form_b3->batuk == 'tidak') checked @endif disabled>
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
                                                <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="ya" @if($form_b3->sakit_tenggorokan == 'ya') checked @endif disabled>
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="tidak" @if($form_b3->sakit_tenggorokan == 'tidak') checked @endif disabled>
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
                                                <input class="form-check-input" type="radio" name="sesak_nafas" value="ya" @if($form_b3->sesak_nafas == 'ya') checked @endif disabled>
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sesak_nafas" value="tidak" @if($form_b3->sesak_nafas == 'tidak') checked @endif disabled>
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
                                                <input class="form-check-input" type="radio" name="anosmia" value="ya" @if($form_b3->anosmia == 'ya') checked @endif disabled>
                                                <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="anosmia" value="tidak" @if($form_b3->anosmia == 'tidak') checked @endif disabled>
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- AGEUSIA -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label class="form-label">Kehilangan Pengecapan Rasa (Ageusia)</label>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ageusia" value="ya" @if($form_b3->ageusia == 'ya') checked @endif disabled>
                                                        <label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ageusia" value="tidak" @if($form_b3->ageusia == 'tidak') checked @endif disabled>
                                                <label class="form-check-label">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Gejala Lainnya</label>
                                    <textarea name="diagnosa_lain" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                                </div>
                                

                            </div>        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection