@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">

                            <div class="panel-heading">
                                <h2>Pemantauan Awal Kasus Kontak COVID - 19</h2>
                            </div>

                            <div class="panel-body">

                                <!-- Nomor Laporan -->
                                <h3 style="margin-top: 40px;">No. Identifikasi Kasus Kontak</h3>

                                <h4><b>ID Kasus Kontak</b></h4>
                                <p style="margin-bottom: 20px;">{{$form_b1->kasus_kontak_id}}</p>

                                <h4><b>Tanggal Pengisian</b></h4>

                                <p style="margin-bottom: 20px;">{{date('d-M-Y', strtotime($form_b1->created_at))}}</p>


                                <!-- Status Pelapor -->
                                <h3 style="margin-top: 40px;">Status Pengisi Form Pemantauan</h3>

                                <h4><b>Status Pengisi</b></h4>
                                <p style="margin-bottom: 20px;">{{$form_b1->status_pengisi_form}}</p>

                                @if($form_b1->status_pengisi_form == 'mewakili pemilik akun')
                    
                                    <h4><b>Nama Pengisi</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b1->nama_pengisi_form}}</p>

                
                                    <h4><b>Hubungan Pengisi Form Dengan Kasus Kontak</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b1->hub_dengan_pasien}}</p>

                                
                                    <h4><b>Nomor Telefon Pengisi</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b1->no_telp_pengisi_form}}</p>

                                
                                    <h4><b>Email Pengisi</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b1->email_pengisi_form}}</p>

                            
                                    <h4><b>Alamat Pengisi</b></h4>
                                    <p style="margin-bottom: 20px;">{{$form_b1->alamat_pengisi_form}}</p>
							    @endif


                                <!-- Gejala Kesehatan -->
                                <h3 style="margin-top: 40px;">Gejala Yang Dialami</h3>

                                @if($form_b1->gejala == 'ya')
                                    <p>Gejala kesehatan terkait COVID - 19</p>
							    @endif

                                @if($form_b1->demam == 'ya')
                                    <p>Demam (Suhu tubuh >38 C)</p>
							    @endif

                                @if($form_b1->sakit_tenggorokan == 'ya')
                                    <p>Sakit/Nyeri pada tenggorokan</p>
							    @endif

                                @if($form_b1->pilek == 'ya')
                                    <p>Pilek</p>
							    @endif
                                
                                @if($form_b1->batuk == 'ya')
                                    <p>Batuk</p>
							    @endif

                                @if($form_b1->sesak_nafas == 'ya')
                                    <p>Sesak/Sulit Bernafas</p>
							    @endif

                                @if($form_b1->muntah == 'ya')
                                    <p>Muntah - muntah</p>
							    @endif

                                @if($form_b1->mual == 'ya')
                                    <p>Mual - mual</p>
							    @endif

                                @if($form_b1->diare == 'ya')
                                    <p>Diare</p>
							    @endif

                                @if($form_b1->pusing == 'ya')
                                    <p>Pusing/sakit kepala</p>
							    @endif

                                @if($form_b1->nyeri_sendi == 'ya')
                                    <p>Nyeri/sakit pada persendian</p>
							    @endif

                                @if($form_b1->nafsu_makan == 'ya')
                                    <p>Kehilangan nafsu makan</p>
							    @endif

                                @if($form_b1->anosmia_ageusia == 'ya')
                                    <p>Anosmia atau Ageusia</p>
							    @endif

                                @if($form_b1->lelah_lemas == 'ya')
                                    <p>Mudah lelah/lemas</p>
							    @endif

                                @if(!(is_null($form_b1->tgl_gejala_pertama)))
                                    <h4><b>Tanggal gejala pertama kali muncul</b></h4>
                                    <p style="margin-bottom: 20px;">{{date('d-M-Y', strtotime($form_b1->tgl_gejala_pertama))}}</p>
							    @endif


                                <!-- Pre Existing Condition -->
                                <h3 style="margin-top: 40px;">Pre-Existing Condition Kasus Kontak</h3>

                                @if($form_b1->kehamilan == 'ya')
                                    <p>Kehamilan</p>
							    @endif

                                @if($form_b1->obesitas == 'ya')
                                    <p>Obesitas</p>
							    @endif

                                @if($form_b1->kanker == 'ya')
                                    <p>Kanker</p>
							    @endif

                                @if($form_b1->diabetes == 'ya')
                                    <p>Diabetes</p>
							    @endif
                                
                                @if($form_b1->HIV == 'ya')
                                    <p>Mengidap HIV/AIDS atau penyakit imun lainnya</p>
							    @endif

                                @if($form_b1->sakit_jantung == 'ya')
                                    <p>Penyakit jantung</p>
							    @endif

                                @if($form_b1->asthma == 'ya')
                                    <p>Asthma</p>
							    @endif

                                @if($form_b1->paru_lain == 'ya')
                                    <p>Penyakit paru - paru lain</p>
							    @endif

                                @if($form_b1->liver == 'ya')
                                    <p>Penyakit liver/hati</p>
							    @endif

                                @if($form_b1->hematologi == 'ya')
                                    <p>Gangguan hematologi kronis</p>
							    @endif

                                @if($form_b1->ginjal == 'ya')
                                    <p>Penyakit/gangguan ginjal</p>
							    @endif

                                @if($form_b1->saraf == 'ya')
                                    <p>Penyakit/gangguan saraf</p>
							    @endif

                                @if($form_b1->donor == 'ya')
                                    <p>Penerima donor organ/sum-sum tulang</p>
							    @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection