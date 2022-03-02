<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemRutinController extends Controller
{
    public function index()
    {
        $date = date("d");
        $month = date("m");
        $year = date("Y");
        return view('mahasiswa.pemantauan.pem_kesehatan', ['date' => $date, 'month' =>$month, 'year' =>$year]);
    }

    public function formPemRutin($id, $y, $m, $d)
    {
        $yearNow = date("y");
        $dateNow = date("d");
        $monthNow = date("m");
        return view('mahasiswa.pemantauan.form_pem_rutin',['dateNow' => $dateNow, 'monthNow' => $monthNow, 'yearNow' => $yearNow, 'y' => $y, 'm' => $m, 'd' => $d]);
    }

    public function showPemRutin($id, $date)
    {
        $pem_rutin = \App\Models\pem_rutin::where('user_id','=', $id)->where('tanggal','=', $date)->first();
        if (!empty($pem_rutin)){
            $lokasi_pem_rutin = \App\Models\lokasi_pem_rutin::where('pem_rutin_id', '=', $pem_rutin->id)->get();
            $len = count($lokasi_pem_rutin);
            return view('mahasiswa.pemantauan.show_form_pem_rutin',['pem_rutin' => $pem_rutin, 'lokasi_pem_rutin' => $lokasi_pem_rutin, 'len' => $len]);
        }else{
            return view('mahasiswa.pemantauan.show_pem_rutin_kosong');
        }
    }

    public function postPemRutin($date, Request $request)
    {
        $this->validate($request,[
            'demam' => 'required',
            'batuk' => 'required',
            'lemas' => 'required',
            'sakit_kepala' => 'required',
            'pegal' => 'required',
            'sakit_tenggorokan' => 'required',
            'sesak_nafas' => 'required',
            'anosmia' => 'required',
            'ageusia' => 'required',
            'kontak' => 'required',
            'masuk_kampus' => 'required',
        ]);


        $pem_rutin = new \App\Models\pem_rutin();
        $pem_rutin->user_id = auth()->user()->id;
        $pem_rutin->tanggal = date("y-m-d");
        $pem_rutin->demam = $request->demam;
        $pem_rutin->batuk = $request->batuk;
        $pem_rutin->lemas = $request->lemas;
        $pem_rutin->sakit_kepala = $request->sakit_kepala;
        $pem_rutin->pegal = $request->pegal;
        $pem_rutin->sakit_tenggorokan = $request->sakit_tenggorokan;
        $pem_rutin->sesak_nafas = $request->sesak_nafas;
        $pem_rutin->anosmia = $request->anosmia;
        $pem_rutin->ageusia = $request->ageusia;
        $pem_rutin->kontak = $request->kontak;
        $pem_rutin->masuk_kampus = $request->masuk_kampus;
        
        $pem_rutin->save();

        $count = count($request->waktu);
        for ($i=0; $i < $count; $i++) { 
            $lokasi_pem_rutin = new \App\Models\lokasi_pem_rutin();
            $lokasi_pem_rutin->waktu = $request->waktu[$i];
            $lokasi_pem_rutin->gedung = $request->gedung[$i];
            $lokasi_pem_rutin->ruang = $request->ruang[$i];

            $pem_rutin->lokasi_pem_rutin()->save($lokasi_pem_rutin);
        }
        
        return redirect('/mahasiswa/id/surveipemantauan');
    }

    public function pemantauanLokasiKegiatan()
    {
        $lokasi_kegiatan = \App\Models\lokasi_kegiatan::where('user_id','=', auth()->user()->id)->latest()->first();
        if (!empty($lokasi_kegiatan) && is_null($lokasi_kegiatan->keluar_at)){
            return view('mahasiswa.pemantauan.keluar', ['lokasi_kegiatan'=>$lokasi_kegiatan]);
        }else{
            return view('mahasiswa.pemantauan.qrcode');
        }
    }

    public function postLokasiKegiatan(Request $request)
    {
        $this->validate($request,[
            'gedung' => 'required',
            'ruangan' => 'required',
        ]);

        $lokasi_kegiatan = new \App\Models\lokasi_kegiatan();
        $lokasi_kegiatan->user_id = auth()->user()->id;
        $lokasi_kegiatan->gedung = $request->gedung;
        $lokasi_kegiatan->ruangan = $request->ruangan;
        $lokasi_kegiatan->tanggal = date('Y-m-d');
        
        $lokasi_kegiatan->save();
        return redirect('/mahasiswa/qrcode');
    }

    public function keluarLokasiKegiatan()
    {
        $lokasi_kegiatan = \App\Models\lokasi_kegiatan::where('user_id','=', auth()->user()->id)->latest()->first();
        $lokasi_kegiatan->keluar_at = now();
        $lokasi_kegiatan->save();

        return redirect('/mahasiswa/dashboard');
    }
}
