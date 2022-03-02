@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2>Laporan Kasus Terkonfirmasi COVID - 19</h2>
                            </div>
                        </div>
                        
                        <div class="panel">
                            <div class="panel-heading">
                                <!-- Nomor Laporan -->
                                <h3 style="">No. Identifikasi Laporan</h3>
                            </div>

                            <div class="panel-body">
                                <h4><b>Nomor Laporan</b></h4>
                                <p style="margin-bottom: 20px;">{{$kasus->id}}</p>

                                <h4><b>Tanggal Laporan</b></h4>
                                <p style="margin-bottom: 20px;">{{date('d-M-Y', strtotime($kasus->created_at))}}</p>
                            
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-heading">
                                <!-- Status Pelapor -->
                                <h3 style="">Status Laporan</h3>
                            </div>

                            <div class="panel-body">
                                <h4><b>Status Pelapor</b></h4>
                                <p style="margin-bottom: 20px;">{{$kasus->status_pengisi_form}}</p>

                                @if($kasus->status_pengisi_form == 'mewakili pemilik akun')
                    
                                    <h4><b>Nama Pelapor</b></h4>
                                    <p style="margin-bottom: 20px;">{{$kasus->nama_pengisi_form}}</p>

                
                                    <h4><b>Hubungan Pelapor Dengan Kasus Terkonfirmasi</b></h4>
                                    <p style="margin-bottom: 20px;">{{$kasus->hub_dengan_pasien}}</p>

                                
                                    <h4><b>Nomor Telefon Pelapor</b></h4>
                                    <p style="margin-bottom: 20px;">{{$kasus->no_telp_pengisi_form}}</p>

                                
                                    <h4><b>Email Pelapor</b></h4>
                                    <p style="margin-bottom: 20px;">{{$kasus->email_pengisi_form}}</p>

                            
                                    <h4><b>Alamat Pelapor</b></h4>
                                    <p style="margin-bottom: 20px;">{{$kasus->alamat_pengisi_form}}</p>
							    @endif
                            
                            </div>
                        </div>
                        
                        <div class="panel">
                            <div class="panel-heading">
                                <!-- Data Pribadi -->
                                <h3 style="">Data Pribadi Kasus Terkonfirmasi</h3>
                            </div>

                            <div class="panel-body">
                                <h4><b>Nama</b></h4>
                                <p style="margin-bottom: 20px;">{{$kasus->user->mahasiswa->nama}}</p>

                                <h4><b>NIM/NIP/No.Identitas</b></h4>
                                <p style="margin-bottom: 20px;">{{$kasus->user->mahasiswa->NIM}}</p>

                                <h4><b>Fakultas</b></h4>
                                <p style="margin-bottom: 20px;">{{$kasus->user->mahasiswa->fakultas}}</p>

                                <h4><b>Program Studi</b></h4>
                                <p style="margin-bottom: 20px;">{{$kasus->user->mahasiswa->prodi}}</p>
                            
                            </div>
                        </div>
                        
                        <div class="panel">
                            <div class="panel-heading">
                                <!-- Bukti Pengujian Laboratorium -->
                                <h3 style="">Bukti Pengujian Laboratorium</h3>
                            </div>

                            <div class="panel-body">
                                <h4><b>Jenis Uji Laboratorium</b></h4>
                                <p style="margin-bottom: 20px;">{{$kasus->jenis_test}}</p>

                                <h4><b>Bukti Hasil Uji</b></h4>
                                <a href="{{asset('img/'.$kasus->bukti_hasil_test)}}"><p style="margin-bottom: 20px;">Bukti Hasil Pengujian</p></a> 

                                <h4><b>Tanggal Pengambilan Sampel/Swab</b></h4>
                                <p style="margin-bottom: 20px;">{{date('d-M-Y', strtotime($kasus->tgl_uji))}}</p>

                                <h4><b>Tanggal Hasil Pengujian Keluar</b></h4>
                                <p style="margin-bottom: 20px;">{{date('d-M-Y', strtotime($kasus->tgl_hasil_uji))}}</p>
                            
                            </div>
                        </div>
                        
                        <div class="panel">
                            <div class="panel-heading">
                                <!-- Lokasi Pasien -->
                                <h3 style="">Lokasi Isolasi/Perawatan Kasus Terkonfirmasi</h3>
                            </div>

                            <div class="panel-body">
                                <h4><b>Lokasi Isolasi Saat Ini</b></h4>
                                <p style="margin-bottom: 20px;">{{$kasus->lokasi_pasien}}</p>

                                @if($kasus->lokasi_pasien == 'rumah sakit')
                                    @if($kasus->nama_rs != NULL)
                                        <h4><b>Nama Rumah Sakit</b></h4>
                                        <p style="margin-bottom: 20px;">{{$kasus->nama_rs}}</p>
                                    @endif
                                    
                                    @if($kasus->nama_rs == NULL)
                                        <h4><b>Nama Rumah Sakit</b></h4>
                                        <p style="margin-bottom: 20px;">Tidak ada data</p>
                                    @endif
                                    
                                    @if($kasus->alamat_rs != NULL)
                                        <h4><b>Alamat Rumah Sakit</b></h4>
                                        <p style="margin-bottom: 20px;">{{$kasus->alamat_rs}}</p>
                                    @endif
                                    
                                    @if($kasus->alamat_rs == NULL)
                                        <h4><b>Alamat Rumah Sakit</b></h4>
                                        <p style="margin-bottom: 20px;">Tidak ada data</p>
                                    @endif
                                    
							    @endif
                            </div>
                        </div>
                        
                        <div class="panel">
                            <div class="panel-heading">
                                <!-- Gejala Kesehatan -->
                                <h3 style="">Gejala Kesehatan Yang Dialami</h3>
                            </div>

                            <div class="panel-body">
                                @if($kasus->gejala == 'ya')
                                    <p>Gejala kesehatan terkait COVID - 19</p>
							    @endif

                                @if($kasus->demam == 'ya')
                                    <p>Demam (Suhu tubuh >38 C)</p>
							    @endif

                                @if($kasus->sakit_tenggorokan == 'ya')
                                    <p>Sakit/Nyeri pada tenggorokan</p>
							    @endif

                                @if($kasus->pilek == 'ya')
                                    <p>Pilek</p>
							    @endif
                                
                                @if($kasus->batuk == 'ya')
                                    <p>Batuk</p>
							    @endif

                                @if($kasus->sesak_nafas == 'ya')
                                    <p>Sesak/Sulit Bernafas</p>
							    @endif

                                @if($kasus->muntah == 'ya')
                                    <p>Muntah - muntah</p>
							    @endif

                                @if($kasus->mual == 'ya')
                                    <p>Mual - mual</p>
							    @endif

                                @if($kasus->diare == 'ya')
                                    <p>Diare</p>
							    @endif

                                @if($kasus->pusing == 'ya')
                                    <p>Pusing/sakit kepala</p>
							    @endif

                                @if($kasus->nyeri_sendi == 'ya')
                                    <p>Nyeri/sakit pada persendian</p>
							    @endif

                                @if($kasus->nafsu_makan == 'ya')
                                    <p>Kehilangan nafsu makan</p>
							    @endif

                                @if($kasus->anosmia_ageusia == 'ya')
                                    <p>Anosmia atau Ageusia</p>
							    @endif

                                @if($kasus->lelah_lemas == 'ya')
                                    <p>Mudah lelah/lemas</p>
							    @endif
							    
							    @if($kasus->gejala != 'ya' 
							        && $kasus->demam != 'ya' 
							        && $kasus->sakit_tenggorokan != 'ya' 
							        && $kasus->pilek != 'ya'
							        && $kasus->batuk != 'ya'
							        && $kasus->sesak_nafas != 'ya'
							        && $kasus->muntah != 'ya'
							        && $kasus->mual != 'ya'
							        && $kasus->diare != 'ya'
							        && $kasus->pusing != 'ya'
							        && $kasus->nyeri_sendi != 'ya'
							        && $kasus->nafsu_makan != 'ya'
							        && $kasus->anosmi_ageusia != 'ya'
							        && $kasus->lelah_lemas != 'ya')
							        Tidak ada gejala
							    @endif

                                @if($kasus->tgl_gejala_pertama != NULL)
                                    <h4><b>Tanggal gejala pertama kali muncul</b></h4>
                                    <p style="margin-bottom: 20px;">{{date('d-M-Y', strtotime($kasus->tgl_gejala_pertama))}}</p>
							    @endif
                            </div>
                        </div>                        

                        <div class="panel">
                            <div class="panel-heading">
                                <!-- Sumber Penularan -->
                                <h3 style="">Sumber & Lokasi Penularan</h3>
                            </div>

                            <div class="panel-body">
                                @if($kasus->sumber_infeksi == 'ya')
                                    <h4><b>Sumber Infeksi</b></h4>
                                    <p style="margin-bottom: 20px;">Diketahui</p>

                                    @if($kasus->sumber_infeksi_dikampus == 'tidak')
                                        <h4><b>Lokasi Infeksi</b></h4>
                                        <p style="margin-bottom: 20px;">Di luar kampus</p>
							        @endif

                                    @if($kasus->sumber_infeksi_dikampus == 'ya')
                                        <h4><b>Lokasi Infeksi</b></h4>
                                        <p style="margin-bottom: 20px;">Di dalam kampus</p>

                                        <h4><b>Orang yang Menularkan</b></h4>
                                        <p style="margin-bottom: 20px;">{{$kasus->nama_sumber_infeksi}}</p>

                                        <h4><b>ID/NIM/NIP Orang yang Menularkan</b></h4>
                                        <p style="margin-bottom: 20px;">{{$kasus->id_sumber_infeksi}}</p>

                                        <h4><b>Lokasi Penularan di Dalam Kampus</b></h4>
                                        <p style="margin-bottom: 20px;">{{$kasus->lokasi_sumber_infeksi}}</p>

                                        @if($kasus->tgl_penularan !== 'NULL')
                                            <h4><b>Tanggal Kemungkinan Penularan</b></h4>
                                            <p style="margin-bottom: 20px;">{{date('d-M-Y', strtotime($kasus->tgl_penularan))}}</p>
							            @endif


							        @endif
							    @endif

                                @if($kasus->sumber_infeksi == 'tidak')
                                    <h4><b>Sumber Infeksi</b></h4>
                                    <p style="margin-bottom: 20px;">Tidak diketahui</p>

                                    <h4><b>Kemungkinan lokasi exposure/penularan</b></h4>
                                    <p style="margin-bottom: 20px;">{{$kasus->sumber_infeksi_tidak_diket}}</p>
							    @endif
							    
							     @if($kasus->sumber_infeksi != 'ya' && $kasus->sumber_infeksi != 'tidak')
                                    <p style="margin-bottom: 20px;">Sumber infeksi tidak diketahui</p>
							    @endif
                            </div>
                        </div>

                                @if($kasus->status == 'proses')
                                    <div class="modal-footer">
                                        <a href="/pemantau/{{$kasus->id}}/tolak-laporan-kasus-terkonfirmasi"><button  type="button" class="btn btn-danger">Tolak Laporan</button></a>
                                        <a href="/pemantau/{{$kasus->id}}/verifikasi-laporan-kasus-terkonfirmasi"><button  type="button" class="btn btn-success">Verifikasi Laporan</button></a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection