<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasusKontakController extends Controller
{
    public function pemantauanKontak($user_id)
    {
        if(auth()->user()->id == $user_id){
            $date = date("Y-m-d");
            $kasus_kontak = \App\Models\kasus_kontak::where('user_id','=', $user_id)->latest()->first();
            return view('mahasiswa.pemantauan.kontak.index', ['kasus_kontak'=>$kasus_kontak, 'date'=>$date]);
        } else{
            return redirect('mahasiswa/dashboard');
        }
    }

    public function formB1($date, $kasus_kontak_id)
    {
        $id = auth()->user()->id;
        $user = \App\Models\User::find($id);
        $todaydate = date("Y-m-d");
        return view('mahasiswa.pemantauan.kontak.formb1', ['user' => $user,'todaydate' => $todaydate, 'date' => $date, 'kasus_kontak_id' => $kasus_kontak_id]);
    }

    public function postFormB1($date, $kasus_kontak_id,Request $request)
    {
        //validasi
        $this->validate($request,[
            //section 3
            'no_telp' => 'required|numeric',
            'no_telp_darurat' => 'required|numeric',
            'hub_no_telp_darurat' => 'required',
            'alamat' => 'required',

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
        $b1_kasus_kontak = new \App\Models\b1_kasus_kontak();
        $b1_kasus_kontak->kasus_kontak_id = $kasus_kontak_id;
        $b1_kasus_kontak->status_pengisi_form = $request->status_pengisi_form;
        $b1_kasus_kontak->nama_pengisi_form = $request->nama_pengisi_form;
        $b1_kasus_kontak->hub_dengan_pasien = $request->hub_dengan_pasien;
        $b1_kasus_kontak->no_telp_pengisi_form = $request->no_telp_pengisi_form;
        $b1_kasus_kontak->email_pengisi_form = $request->email_pengisi_form;
        $b1_kasus_kontak->alamat_pengisi_form = $request->alamat_pengisi_form;
        
        $b1_kasus_kontak->gejala = $request->gejala;
        $b1_kasus_kontak->demam = $request->demam;
        $b1_kasus_kontak->sakit_tenggorokan = $request->sakit_tenggorokan;
        $b1_kasus_kontak->pilek = $request->pilek;
        $b1_kasus_kontak->batuk = $request->batuk;
        $b1_kasus_kontak->sesak_nafas = $request->sesak_nafas;
        $b1_kasus_kontak->muntah = $request->muntah;
        $b1_kasus_kontak->mual = $request->mual;
        $b1_kasus_kontak->diare = $request->diare;
        $b1_kasus_kontak->pusing = $request->pusing;
        $b1_kasus_kontak->pegal = $request->pegal;
        $b1_kasus_kontak->nyeri_sendi = $request->nyeri_sendi;
        $b1_kasus_kontak->nafsu_makan = $request->nafsu_makan;
        $b1_kasus_kontak->anosmia_ageusia = $request->anosmia_ageusia;
        $b1_kasus_kontak->lelah_lemas = $request->lelah_lemas;
        $b1_kasus_kontak->tgl_gejala_pertama = $request->tgl_gejala_pertama;
        $b1_kasus_kontak->gejala_lain = $request->gejala_lain;

        $b1_kasus_kontak->kehamilan = $request->kehamilan;
        $b1_kasus_kontak->obesitas = $request->obesitas;
        $b1_kasus_kontak->kanker = $request->kanker;
        $b1_kasus_kontak->diabetes = $request->diabetes;
        $b1_kasus_kontak->HIV = $request->HIV;
        $b1_kasus_kontak->sakit_jantung = $request->sakit_jantung;
        $b1_kasus_kontak->asthma = $request->asthma;
        $b1_kasus_kontak->paru_lain = $request->paru_lain;
        $b1_kasus_kontak->liver = $request->liver;
        $b1_kasus_kontak->hematologi = $request->hematologi;
        $b1_kasus_kontak->ginjal = $request->ginjal;
        $b1_kasus_kontak->saraf = $request->saraf;
        $b1_kasus_kontak->donor = $request->donor;
        $b1_kasus_kontak->kondisi_lain = $request->kondisi_lain;

        $b1_kasus_kontak->perjalanan_lokal = $request->perjalanan_lokal;
        $b1_kasus_kontak->perjalanan_intr = $request->perjalanan_intr;
        $b1_kasus_kontak->kontak_kasus_terkonfirmasi = $request->kontak_kasus_terkonfirmasi;
        $b1_kasus_kontak->hadir_acara_berisiko = $request->hadir_acara_berisiko;

        $b1_kasus_kontak->save();

        $user = \App\Models\User::find(auth()->user()->id);
        $user->mahasiswa->update([$request->no_telp,$request->no_telp_darurat,$request->hub_no_telp_darurat,$request->alamat]);

        return redirect('/mahasiswa/dashboard')->with('input_berhasil','Pengisian Formulir Pemantauan Awal Kasus Kontak Berhasil');
    }

    public function formB2($date, $kasus_kontak_id)
    {
        $todaydate = date("Y-m-d");
        return view('mahasiswa.pemantauan.kontak.formb2', ['todaydate' => $todaydate, 'date' => $date, 'kasus_kontak_id' => $kasus_kontak_id]);
    }

    public function postFormB2($date, $kasus_kontak_id,Request $request)
    {
        //validasi
        $this->validate($request,[

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

        //Input ke Database
        $b2_kasus_kontak = new \App\Models\b2_kasus_kontak();
        $b2_kasus_kontak->kasus_kontak_id = $kasus_kontak_id;
        $b2_kasus_kontak->status_pengisi_form = $request->status_pengisi_form;
        $b2_kasus_kontak->nama_pengisi_form = $request->nama_pengisi_form;
        $b2_kasus_kontak->hub_dengan_pasien = $request->hub_dengan_pasien;
        $b2_kasus_kontak->no_telp_pengisi_form = $request->no_telp_pengisi_form;
        $b2_kasus_kontak->email_pengisi_form = $request->email_pengisi_form;
        $b2_kasus_kontak->alamat_pengisi_form = $request->alamat_pengisi_form;

        $b2_kasus_kontak->gejala = $request->gejala;
        $b2_kasus_kontak->demam = $request->demam;
        $b2_kasus_kontak->sakit_tenggorokan = $request->sakit_tenggorokan;
        $b2_kasus_kontak->pilek = $request->pilek;
        $b2_kasus_kontak->batuk = $request->batuk;
        $b2_kasus_kontak->sesak_nafas = $request->sesak_nafas;
        $b2_kasus_kontak->muntah = $request->muntah;
        $b2_kasus_kontak->mual = $request->mual;
        $b2_kasus_kontak->diare = $request->diare;
        $b2_kasus_kontak->pusing = $request->pusing;
        $b2_kasus_kontak->pegal = $request->pegal;
        $b2_kasus_kontak->nyeri_sendi = $request->nyeri_sendi;
        $b2_kasus_kontak->nafsu_makan = $request->nafsu_makan;
        $b2_kasus_kontak->anosmia_ageusia = $request->anosmia_ageusia;
        $b2_kasus_kontak->lelah_lemas = $request->lelah_lemas;
        $b2_kasus_kontak->tgl_gejala_pertama = $request->tgl_gejala_pertama;
        $b2_kasus_kontak->gejala_lain = $request->gejala_lain;

        $b2_kasus_kontak->save();

        //Ubah status kesehatan kasus kontak
        $mahasiswa = \App\Models\mahasiswa::where('user_id','=',auth()->user()->id)->first();
        $mahasiswa->status_kesehatan = "sehat";
        $mahasiswa->save();

        $kasus_kontak = \App\Models\kasus_kontak::where('id','=', $kasus_kontak_id)->latest()->first();
        $kasus_kontak->status = "selesai";
        $kasus_kontak->save();

        return redirect('/mahasiswa/dashboard')->with('input_berhasil','Pengisian Formulir Pemantauan Akhir Kasus Kontak Berhasil');
    }

    public function formB3($date, $kasus_kontak_id)
    {
        $todaydate = date("Y-m-d");
        return view('mahasiswa.pemantauan.kontak.formb3', ['todaydate' => $todaydate, 'date' => $date, 'kasus_kontak_id' => $kasus_kontak_id]);
    }

    public function postFormB3($date, $kasus_kontak_id,Request $request)
    {
        $this->validate($request,[
            'demam' => 'required',
            'flu_pilek' => 'required',
            'batuk' => 'required',
            'sakit_tenggorokan' => 'required',
            'sesak_nafas' => 'required',
            'anosmia' => 'required',
            'ageusia' => 'required',
        ]);

        $b3_kasus_kontak = new \App\Models\b3_kasus_kontak();
        $b3_kasus_kontak->kasus_kontak_id = $kasus_kontak_id;
        $b3_kasus_kontak->demam = $request->demam;
        $b3_kasus_kontak->flu_pilek = $request->flu_pilek;
        $b3_kasus_kontak->batuk = $request->batuk;
        $b3_kasus_kontak->sakit_tenggorokan = $request->sakit_tenggorokan;
        $b3_kasus_kontak->sesak_nafas = $request->sesak_nafas;
        $b3_kasus_kontak->anosmia = $request->anosmia;
        $b3_kasus_kontak->ageusia = $request->ageusia;
        $b3_kasus_kontak->diagnosa_lain = $request->diagnosa_lain;
        
        $b3_kasus_kontak->save();

        return redirect('/mahasiswa/dashboard')->with('input_berhasil','Pengisian Formulir Pemantauan Rutin Kasus Kontak Berhasil');
    }

    public function formA1Kontak($id)
    {
        if(auth()->user()->id == $id){
            $user = \App\Models\User::find($id);
            return view('mahasiswa.pemantauan.kontak.forma1',['user'=>$user]);
        } else{
            return redirect('mahasiswa/dashboard');
        }
    }

    public function postFormA1Kontak(Request $request)
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

        
        $kasus_kontak = \App\Models\kasus_kontak::where('user_id','=', auth()->user()->id)->latest()->first();
        $kasus_kontak->status = "terkonfirmasi";
        $kasus_kontak->save();

        return redirect('/mahasiswa/dashboard')->with('input_berhasil','Laporan Diterima, Dan Sedang Dalam Proses Verifikasi');
    }
}
