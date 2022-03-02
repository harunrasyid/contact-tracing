@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">

                            <div class="panel-heading">
                                <h2>Pemantauan Akhir Kasus Kontak COVID - 19</h2>
                            </div>

                            <div class="panel-body">

                                <!-- Nomor Laporan -->
                                <h3 style="margin-top: 40px;">No. Identifikasi Kasus Kontak</h3>

                                <h4><b>ID Kasus Kontak</b></h4>
                                <p style="margin-bottom: 20px;">{{$form_b2->kasus_kontak_id}}</p>

                                <h4><b>Tanggal Pengisian</b></h4>

                                <p style="margin-bottom: 20px;">{{date('d-M-Y', strtotime($form_b2->created_at))}}</p>


                                <!-- Status Pelapor -->
                                <h3 style="margin-top: 40px;">Status Pengisi Form Pemantauan</h3>

                                <h4><b>Status Pengisi</b></h4>
                                <p style="margin-bottom: 20px;">{{$form_b2->status_pengisi_form}}</p>

                                @if($form_b2->status_pengisi_form == 'mewakili pemilik akun')
                    
                                    <h4><b>Nama Pengisi</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b2->nama_pengisi_form}}</p>

                
                                    <h4><b>Hubungan Pengisi Form Dengan Kasus Kontak</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b2->hub_dengan_pasien}}</p>

                                
                                    <h4><b>Nomor Telefon Pengisi</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b2->no_telp_pengisi_form}}</p>

                                
                                    <h4><b>Email Pengisi</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b2->email_pengisi_form}}</p>

                            
                                    <h4><b>Alamat Pengisi</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b2->alamat_pengisi_form}}</p>
							    @endif


                                <!-- Gejala Kesehatan -->
                                <h3 style="margin-top: 40px;">Gejala Yang Dialami</h3>

                                @if($form_b2->gejala == 'ya')
                                    <p>Gejala kesehatan terkait COVID - 19</p>
							    @endif

                                @if($form_b2->demam == 'ya')
                                    <p>Demam (Suhu tubuh >38 C)</p>
							    @endif

                                @if($form_b2->sakit_tenggorokan == 'ya')
                                    <p>Sakit/Nyeri pada tenggorokan</p>
							    @endif

                                @if($form_b2->pilek == 'ya')
                                    <p>Pilek</p>
							    @endif
                                
                                @if($form_b2->batuk == 'ya')
                                    <p>Batuk</p>
							    @endif

                                @if($form_b2->sesak_nafas == 'ya')
                                    <p>Sesak/Sulit Bernafas</p>
							    @endif

                                @if($form_b2->muntah == 'ya')
                                    <p>Muntah - muntah</p>
							    @endif

                                @if($form_b2->mual == 'ya')
                                    <p>Mual - mual</p>
							    @endif

                                @if($form_b2->diare == 'ya')
                                    <p>Diare</p>
							    @endif

                                @if($form_b2->pusing == 'ya')
                                    <p>Pusing/sakit kepala</p>
							    @endif

                                @if($form_b2->nyeri_sendi == 'ya')
                                    <p>Nyeri/sakit pada persendian</p>
							    @endif

                                @if($form_b2->nafsu_makan == 'ya')
                                    <p>Kehilangan nafsu makan</p>
							    @endif

                                @if($form_b2->anosmia_ageusia == 'ya')
                                    <p>Anosmia atau Ageusia</p>
							    @endif

                                @if($form_b2->lelah_lemas == 'ya')
                                    <p>Mudah lelah/lemas</p>
							    @endif

                                @if(!(is_null($form_b2->tgl_gejala_pertama)))
                                    <h4><b>Tanggal gejala pertama kali muncul</b></h4>
                                    <p style="margin-bottom: 20px;">{{date('d-M-Y', strtotime($form_b2->tgl_gejala_pertama))}}</p>
							    @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection