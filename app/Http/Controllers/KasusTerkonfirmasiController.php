<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasusTerkonfirmasiController extends Controller
{
    public function formA1($id)
    {
        if(auth()->user()->id == $id){
            $user = \App\Models\User::find($id);
            return view('mahasiswa.pemantauan.terkonfirmasi.forma1',['user'=>$user]);
        } else{
            return redirect('mahasiswa/dashboard');
        }
    }

    public function postFormA1(Request $request)
    {
        //validasi
        $this->validate($request,[
            //section 3
            'no_telp' => 'required|numeric',
            'no_telp_darurat' => 'required|numeric',
            'hub_no_telp_darurat' => 'required',
            'alamat' => 'required',
            
            //section
            'lokasi_pasien' => 'required',

            //section 4
            'jenis_test' => 'required',
            'bukti_hasil_test' => 'required',
            'tgl_uji' => 'required',
            'tgl_hasil_uji' => 'required',

            //section 6
            'gejala' => 'required',
            'demam' => 'required',
            'sakit_tenggorokan' => 'required',
            'pilek' => 'required',
            'batuk' => 'required',
            'sesak_nafas' => 'required',
            'muntah' => 'required',
            'mual' => 'required',
            'diare' => 'required',
            'pusing' => 'required',
            'pegal' => 'required',
            'nyeri_sendi' => 'required',
            'nafsu_makan' => 'required',
            'anosmia_ageusia' => 'required',
            'lelah_lemas' => 'required',

            //section 7
            'kehamilan' => 'required',
            'obesitas' => 'required',
            'kanker' => 'required',
            'diabetes' => 'required',
            'HIV' => 'required',
            'sakit_jantung' => 'required',
            'asthma' => 'required',
            'paru_lain' => 'required',
            'liver' => 'required',
            'hematologi' => 'required',
            'ginjal' => 'required',
            'saraf' => 'required',
            'donor' => 'required',

            //section 9
            'perjalanan_lokal' => 'required',
            'perjalanan_intr' => 'required',
            'kontak_kasus_terkonfirmasi' => 'required',
            'hadir_acara_berisiko' => 'required',
        ]);    
        
        //Input ke Database
        $pelaporan = new \App\Models\pelaporan_kasus_terkonfirmasi();
        $pelaporan->user_id = auth()->user()->id;
        $pelaporan->status_pengisi_form = $request->status_pengisi_form;
        $pelaporan->nama_pengisi_form = $request->nama_pengisi_form;
        $pelaporan->hub_dengan_pasien = $request->hub_dengan_pasien;
        $pelaporan->no_telp_pengisi_form = $request->no_telp_pengisi_form;
        $pelaporan->email_pengisi_form = $request->email_pengisi_form;
        $pelaporan->alamat_pengisi_form = $request->alamat_pengisi_form;
        
        $pelaporan->jenis_test = $request->jenis_test;
        $request->file('bukti_hasil_test')->move('img/',$request->file('bukti_hasil_test')->getClientOriginalName());
        $pelaporan->bukti_hasil_test = $request->file('bukti_hasil_test')->getClientOriginalName();
        $pelaporan->tgl_uji = $request->tgl_uji;
        $pelaporan->tgl_hasil_uji = $request->tgl_hasil_uji;

        $pelaporan->lokasi_pasien = $request->lokasi_pasien;
        $pelaporan->nama_rs = $request->nama_rs;
        $pelaporan->alamat_rs = $request->alamat_rs;

        $pelaporan->gejala = $request->gejala;
        $pelaporan->demam = $request->demam;
        $pelaporan->sakit_tenggorokan = $request->sakit_tenggorokan;
        $pelaporan->pilek = $request->pilek;
        $pelaporan->batuk = $request->batuk;
        $pelaporan->sesak_nafas = $request->sesak_nafas;
        $pelaporan->muntah = $request->muntah;
        $pelaporan->mual = $request->mual;
        $pelaporan->diare = $request->diare;
        $pelaporan->pusing = $request->pusing;
        $pelaporan->pegal = $request->pegal;
        $pelaporan->nyeri_sendi = $request->nyeri_sendi;
        $pelaporan->nafsu_makan = $request->nafsu_makan;
        $pelaporan->anosmia_ageusia = $request->anosmia_ageusia;
        $pelaporan->lelah_lemas = $request->lelah_lemas;
        $pelaporan->tgl_gejala_pertama = $request->tgl_gejala_pertama;
        $pelaporan->gejala_lain = $request->gejala_lain;
        
        $pelaporan->kehamilan = $request->kehamilan;
        $pelaporan->obesitas = $request->obesitas;
        $pelaporan->kanker = $request->kanker;
        $pelaporan->diabetes = $request->diabetes;
        $pelaporan->HIV = $request->HIV;
        $pelaporan->sakit_jantung = $request->sakit_jantung;
        $pelaporan->asthma = $request->asthma;
        $pelaporan->paru_lain = $request->paru_lain;
        $pelaporan->liver = $request->liver;
        $pelaporan->hematologi = $request->hematologi;
        $pelaporan->ginjal = $request->ginjal;
        $pelaporan->saraf = $request->saraf;
        $pelaporan->donor = $request->donor;
        $pelaporan->kondisi_lain = $request->kondisi_lain;
        
        $pelaporan->sumber_infeksi = $request->sumber_infeksi;
        $pelaporan->sumber_infeksi_dikampus = $request->sumber_infeksi_dikampus;
        $pelaporan->nama_sumber_infeksi = $request->nama_sumber_infeksi;
        $pelaporan->id_sumber_infeksi = $request->id_sumber_infeksi;
        $pelaporan->lokasi_sumber_infeksi = $request->lokasi_sumber_infeksi;
        $pelaporan->tgl_penularan = $request->tgl_penularan;
        $pelaporan->kronologi_infeksi = $request->kronologi_infeksi;
        $pelaporan->sumber_infeksi_tidak_diket = $request->sumber_infeksi_tidak_diket;
        $pelaporan->perjalanan_lokal = $request->perjalanan_lokal;
        $pelaporan->perjalanan_intr = $request->perjalanan_intr;
        $pelaporan->kontak_kasus_terkonfirmasi = $request->kontak_kasus_terkonfirmasi;
        $pelaporan->hadir_acara_berisiko = $request->hadir_acara_berisiko;

        $pelaporan->status = "proses";
        
        $pelaporan->save();

        $user = \App\Models\User::find(auth()->user()->id);
        $user->mahasiswa->update([$request->no_telp,$request->no_telp_darurat,$request->hub_no_telp_darurat,$request->alamat]);

        return redirect('/mahasiswa/dashboard')->with('input_berhasil','Laporan Diterima, Dan Sedang Dalam Proses Verifikasi');
    }

    public function formA2($id)
    {
        if(auth()->user()->id == $id){
            $user = \App\Models\User::find($id);
            return view('mahasiswa.pemantauan.terkonfirmasi.forma2',['user'=>$user]);
        } else{
            return redirect('mahasiswa/dashboard');
        }
    }
    
    public function postFormA2($id, Request $request)
    {
        //validasi
        $this->validate($request,[
            //section 4
            'jenis_test' => 'required',
            'bukti_hasil_test' => 'required',
            'tgl_uji' => 'required',
            'tgl_hasil_uji' => 'required',

            //section 6
            'gejala' => 'required',
            'demam' => 'required',
            'sakit_tenggorokan' => 'required',
            'pilek' => 'required',
            'batuk' => 'required',
            'sesak_nafas' => 'required',
            'muntah' => 'required',
            'mual' => 'required',
            'diare' => 'required',
            'pusing' => 'required',
            'pegal' => 'required',
            'nyeri_sendi' => 'required',
            'nafsu_makan' => 'required',
            'anosmia_ageusia' => 'required',
            'lelah_lemas' => 'required',
        ]);
        
        $pelaporan = \App\Models\pelaporan_kasus_terkonfirmasi::where('user_id','=', $id)
                    ->where('status','=', 'terverifikasi')
                    ->latest()
                    ->first();

        //Input ke Database
        $a2_kasus_terkonfirmasi = new \App\Models\a2_kasus_terkonfirmasi();
        $a2_kasus_terkonfirmasi->user_id = auth()->user()->id;
        $a2_kasus_terkonfirmasi->pelaporan_kasus_terkonfirmasi_id = $pelaporan->id;
        $a2_kasus_terkonfirmasi->status_pengisi_form = $request->status_pengisi_form;
        $a2_kasus_terkonfirmasi->nama_pengisi_form = $request->nama_pengisi_form;
        $a2_kasus_terkonfirmasi->hub_dengan_pasien = $request->hub_dengan_pasien;
        $a2_kasus_terkonfirmasi->no_telp_pengisi_form = $request->no_telp_pengisi_form;
        $a2_kasus_terkonfirmasi->email_pengisi_form = $request->email_pengisi_form;
        $a2_kasus_terkonfirmasi->alamat_pengisi_form = $request->alamat_pengisi_form;
        
        $a2_kasus_terkonfirmasi->jenis_test = $request->jenis_test;
        $request->file('bukti_hasil_test')->move('img/',$request->file('bukti_hasil_test')->getClientOriginalName());
        $a2_kasus_terkonfirmasi->bukti_hasil_test = $request->file('bukti_hasil_test')->getClientOriginalName();
        $a2_kasus_terkonfirmasi->tgl_uji = $request->tgl_uji;
        $a2_kasus_terkonfirmasi->tgl_hasil_uji = $request->tgl_hasil_uji;

        $a2_kasus_terkonfirmasi->gejala = $request->gejala;
        $a2_kasus_terkonfirmasi->demam = $request->demam;
        $a2_kasus_terkonfirmasi->sakit_tenggorokan = $request->sakit_tenggorokan;
        $a2_kasus_terkonfirmasi->pilek = $request->pilek;
        $a2_kasus_terkonfirmasi->batuk = $request->batuk;
        $a2_kasus_terkonfirmasi->sesak_nafas = $request->sesak_nafas;
        $a2_kasus_terkonfirmasi->muntah = $request->muntah;
        $a2_kasus_terkonfirmasi->mual = $request->mual;
        $a2_kasus_terkonfirmasi->diare = $request->diare;
        $a2_kasus_terkonfirmasi->pusing = $request->pusing;
        $a2_kasus_terkonfirmasi->pegal = $request->pegal;
        $a2_kasus_terkonfirmasi->nyeri_sendi = $request->nyeri_sendi;
        $a2_kasus_terkonfirmasi->nafsu_makan = $request->nafsu_makan;
        $a2_kasus_terkonfirmasi->anosmia_ageusia = $request->anosmia_ageusia;
        $a2_kasus_terkonfirmasi->lelah_lemas = $request->lelah_lemas;
        $a2_kasus_terkonfirmasi->tgl_gejala_pertama = $request->tgl_gejala_pertama;
        $a2_kasus_terkonfirmasi->gejala_lain = $request->gejala_lain;
        
        $a2_kasus_terkonfirmasi->save();

        //ubah status laporan
        $pelaporan->status = "selesai";
        $pelaporan->save();

        //ubah status kesehatan
        $mahasiswa = \App\Models\mahasiswa::where('user_id','=', $id)->first();
        $mahasiswa->status_kesehatan = "sehat";
        $mahasiswa->save();

        return redirect('/mahasiswa/dashboard')->with('input_berhasil','Laporan Kesembuhan Diterima');
    }
}
