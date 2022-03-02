<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VerifikasiLaporan;
use App\Notifications\notifikasiAwalKontak;

class timPemantauController extends Controller
{
    public function dashboard()
    {
        //kasus kumulatif
        $kasus_terkonfirmasi_kumulatif = count(\App\Models\pelaporan_kasus_terkonfirmasi::whereIn('status',['terverifikasi', 'selesai'])->get());
        $kasus_kontak_kumulatif = count(\App\Models\kasus_kontak::all());

        //kasus aktif
        $kasus_terkonfirmasi_aktif = count(\App\Models\mahasiswa::where('status_kesehatan','=', 'terkonfirmasi')->get());
        $kasus_kontak_aktif = count(\App\Models\mahasiswa::where('status_kesehatan','=', 'kontak')->get());

        //kasus harian
        $kasus_harian = [];
        $tanggal_kasus_harian = [];
        $tanggal_akhir = date('Y-m-d');
        $tanggal_awal = date('Y-m-d',strtotime($tanggal_akhir."-30 day"));

        for($i=0; $i < 31; $i++){
            $temp = count(\App\Models\pelaporan_kasus_terkonfirmasi::whereDate('created_at','=', $tanggal_awal)->whereIn('status',['terverifikasi', 'selesai'])->get());
            array_push($kasus_harian, $temp);
            array_push($tanggal_kasus_harian, strval( date('M-d',strtotime($tanggal_awal)) ));
            $tanggal_awal = date('Y-m-d',strtotime($tanggal_awal."+1 day"));
        };


        $tanggal_awal = date('Y-m-d',strtotime($tanggal_akhir."-30 day"));
        return view('pemantau.dashboard', ['kasus_terkonfirmasi_kumulatif' => $kasus_terkonfirmasi_kumulatif, 
                                            'kasus_kontak_kumulatif' => $kasus_kontak_kumulatif,
                                            'kasus_terkonfirmasi_aktif' => $kasus_terkonfirmasi_aktif,
                                            'kasus_kontak_aktif' => $kasus_kontak_aktif,
                                            'tanggal_awal' => $tanggal_awal,
                                            'tanggal_akhir' => $tanggal_akhir,
                                            'kasus_harian' => $kasus_harian,
                                            'tanggal_kasus_harian' => $tanggal_kasus_harian]);
    }

    public function editAkun($id)
    {
        $user = \App\Models\User::find($id);
        return view('pemantau.akun.editAkun',['user' => $user]);
    }

    public function updateAkun(Request $request,$id)
    {
        $this->validate($request,[
            'email' => 'email',
            'password' => ['min:8', 'required_with:password_confirm', 'same:password_confirm', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?([^\w\s]|[_])).{8,}$/'],
            'password_confirm' => 'min:8'
        ]);

        $user = \App\Models\User::find($id);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect("/pemantau/$id/editakun")->with('input_berhasil','Pengaturan Akun Berhasil Diubah');
    }

    public function laporanKasusTerkonfirmasi(Request $request)
    {
        if($request->has('cari')){
            $data_kasus_cari = \App\Models\pelaporan_kasus_terkonfirmasi::latest()->get();
            $data_kasus = collect();
            foreach($data_kasus_cari as $kasus)
                if(stripos($kasus->user->mahasiswa->nama, $request->cari) !== false){
                    $data_kasus->push($kasus);
                }
            
            $data_kasus_proses = \App\Models\pelaporan_kasus_terkonfirmasi::where('status','=', 'proses')->latest()->get();
            $data_kasus_terverifikasi = \App\Models\pelaporan_kasus_terkonfirmasi::where('status','=', 'terverifikasi')->latest()->get();
            $data_kasus_ditolak = \App\Models\pelaporan_kasus_terkonfirmasi::where('status','=', 'ditolak')->latest()->get();
            $data_kasus_selesai = \App\Models\pelaporan_kasus_terkonfirmasi::where('status','=', 'selesai')->latest()->get();
                    return view('pemantau.terkonfirmasi.laporanKasusTerkonfirmasi', ['data_kasus' => $data_kasus,
                                                                            'data_kasus_proses' => $data_kasus_proses,
                                                                            'data_kasus_terverifikasi' => $data_kasus_terverifikasi,
                                                                            'data_kasus_ditolak' => $data_kasus_ditolak,
                                                                            'data_kasus_selesai' => $data_kasus_selesai,]);
        }
        
        $data_kasus = \App\Models\pelaporan_kasus_terkonfirmasi::latest()->get();
        $data_kasus_proses = \App\Models\pelaporan_kasus_terkonfirmasi::where('status','=', 'proses')->latest()->get();
        $data_kasus_terverifikasi = \App\Models\pelaporan_kasus_terkonfirmasi::where('status','=', 'terverifikasi')->latest()->get();
        $data_kasus_ditolak = \App\Models\pelaporan_kasus_terkonfirmasi::where('status','=', 'ditolak')->latest()->get();
        $data_kasus_selesai = \App\Models\pelaporan_kasus_terkonfirmasi::where('status','=', 'selesai')->latest()->get();
        return view('pemantau.terkonfirmasi.laporanKasusTerkonfirmasi', ['data_kasus' => $data_kasus,
                                                                            'data_kasus_proses' => $data_kasus_proses,
                                                                            'data_kasus_terverifikasi' => $data_kasus_terverifikasi,
                                                                            'data_kasus_ditolak' => $data_kasus_ditolak,
                                                                            'data_kasus_selesai' => $data_kasus_selesai,]);
    }

    public function detailLaporanKasusTerkonfirmasi($id)
    {
        $kasus = \App\Models\pelaporan_kasus_terkonfirmasi::find($id);
        return view('pemantau.terkonfirmasi.detailLaporanKasusTerkonfirmasi', ['kasus' => $kasus]);
    }

    public function verifikasiLaporanKasusTerkonfirmasi($id)
    {
        $kasus = \App\Models\pelaporan_kasus_terkonfirmasi::find($id);
        $user = \App\Models\User::find($kasus->user_id);


        //Verifikasi
        $kasus->status = "terverifikasi";
        $kasus->save();


        //Ubah status kesehatan kasus terkonfirmasi
        $mahasiswa = \App\Models\mahasiswa::where('user_id','=',$kasus->user_id)->first();
        $mahasiswa->status_kesehatan = "terkonfirmasi";
        $mahasiswa->save();


        //Identifikasi Kontak
        if(is_null($kasus->tgl_gejala_pertama)){ //jika waktu gejala muncul pertama tidak diketahui
            $tanggal_awal = date('Y-m-d',strtotime($kasus->tgl_uji."-2 day")); //waktu h-2 sebelum pengambilan sampel
            $tanggal_akhir = date('Y-m-d',strtotime($kasus->tgl_uji."+14 day"));
        }else{ //jika waktu gejala muncul pertama diketahui
            $tanggal_awal = date('Y-m-d',strtotime($kasus->tgl_gejala_pertama."-2 day"));
            $tanggal_akhir = date('Y-m-d',strtotime($kasus->tgl_gejala_pertama."+14 day"));
        }

        $lokasi_kegiatan = \App\Models\lokasi_kegiatan::where('user_id','=',$kasus->user_id)
            ->whereBetween('created_at', array($tanggal_awal, $tanggal_akhir))
            ->get(); //cari seluruh lokasi kegiatan kasus terkonfirmasi, selama masa infeksius
            
        $kontak = [];
        $len = count($lokasi_kegiatan);
        for ($i=0; $i < $len; $i++) { 
            $temps = \App\Models\lokasi_kegiatan::where('user_id','!=',$kasus->user_id)
            ->where('tanggal','=',$lokasi_kegiatan[$i]->tanggal)
            ->where('gedung','LIKE','%'.$lokasi_kegiatan[$i]->gedung.'%')
            ->where('ruangan','LIKE','%'.$lokasi_kegiatan[$i]->ruangan.'%')
            ->get(); //cari civitas lain yang berkegiatan di ruangan sama, pada jam yang sama dengan kasus terkonfirmasi
            foreach($temps as $temp){
                if($temp->created_at >= $lokasi_kegiatan[$i]->created_at and $temp->keluar_at <= $lokasi_kegiatan[$i]->keluar_at){
                    array_push($kontak, $temp);
                } elseif($temp->created_at <= $lokasi_kegiatan[$i]->created_at and $temp->keluar_at <= $lokasi_kegiatan[$i]->keluar_at and $temp->keluar_at >= $lokasi_kegiatan[$i]->created_at){
                    array_push($kontak, $temp);
                } elseif($temp->created_at >= $lokasi_kegiatan[$i]->created_at and $temp->keluar_at >= $lokasi_kegiatan[$i]->keluar_at and $temp->created_at <= $lokasi_kegiatan[$i]->keluar_at){
                    array_push($kontak, $temp);
                } elseif($temp->created_at <= $lokasi_kegiatan[$i]->created_at and $temp->keluar_at >= $lokasi_kegiatan[$i]->keluar_at){
                    array_push($kontak, $temp);
                } else{
                    relax();
                }
            }
        }
        $kontak = array_intersect_key($kontak, array_unique(array_column($kontak, 'user_id'))); 

        $count = count($kontak); //input ke database
        for ($i=0; $i < $count; $i++) { 
            $kasus_kontak = new \App\Models\kasus_kontak();
            $kasus_kontak->pelaporan_kasus_terkonfirmasi_id = $id;
            $kasus_kontak->user_id = $kontak[$i]->user_id;
            $kasus_kontak->ruangan = $kontak[$i]->ruangan;
            $kasus_kontak->kontak_at = $kontak[$i]->created_at;
            $kasus_kontak->status = "pemantauan";

            $kasus_kontak->save();

            $mahasiswa_kontak = \App\Models\mahasiswa::where('user_id','=',$kontak[$i]->user_id)->first();
            $mahasiswa_kontak->status_kesehatan = "kontak"; //Ubah status kesehatan mahasiswa
            $mahasiswa_kontak->save();
        }


        //Notifikasi Verifikasi
        $pesanVerifikasi = [
            'tanggal laporan' => date('d-M-Y', strtotime($kasus->created_at)),
            'title' => 'Laporan Kasus COVID - 19 Berhasil Diverifikasi',
            'pesan' => 'Laporan kasus COVID - 19 anda berhasil diverifikasi, segera lakukan isolasi mandiri sesuai dengan ketentuan kampus',
        ];
        Notification::send($user, new VerifikasiLaporan($pesanVerifikasi));


        //Notifikasi Ke Kasus Kontak
        $count = count($kontak);
        for ($i=0; $i < $count; $i++) { 
            $pesanNotifikasiAwalKontak = [
                'title' => 'Anda Telah Teridentifikasi Sebagai Kasus Kontak',
                'pesan' => 'Berdasarkan kegiatan anda pada tanggal, waktu, dan lokasi yang tertera, Anda berada dalam satu ruangan tertutup dengan kasus positif COVID - 19. Sehingga anda teridentifikasi sebagai kasus kontak COVID 19, segera lakukan karantina sesuai dengan ketentuan kampus',
                'tanggal kontak' => date('d-M-Y', strtotime($kontak[$i]->created_at)),
                'waktu kontak' => date('H:i', strtotime($kontak[$i]->created_at)),
                'ruangan' => $kontak[$i]->ruangan,
            ];
            $user_kontak = \App\Models\User::find($kontak[$i]->user_id);
            $user_kontak->notify(new notifikasiAwalKontak($pesanNotifikasiAwalKontak));
        }


        return redirect('/pemantau/laporan-kasus-terkonfirmasi')->with('input_berhasil','Kasus terkonfirmasi berhasil diverifikasi');
    }

    public function tolakLaporanKasusTerkonfirmasi($id)
    {
        $kasus = \App\Models\pelaporan_kasus_terkonfirmasi::find($id);
        $user = \App\Models\User::find($kasus->user_id);

        $kasus->status = "ditolak";
        $kasus->save();

        $pesanVerifikasi = [
            'tanggal laporan' => date('d-M-Y', strtotime($kasus->created_at)),
            'title' => 'Laporan Kasus COVID - 19 Ditolak',
            'pesan' => 'Laporan kasus COVID - 19 anda gagal diverifikasi, jika anda merasa ada kesalahan dapat segera menghubungi Admin aplikasi',
        ];
        Notification::send($user, new VerifikasiLaporan($pesanVerifikasi));

        return redirect('/pemantau/laporan-kasus-terkonfirmasi')->with('input_gagal','Laporan ditolak');
    }

    public function pemantauanKasusKontak(Request $request)
    {
        if($request->has('cari')){
            $data_kasus_kontak_cari = \App\Models\kasus_kontak::latest()->get();
            $data_kasus_kontak = collect();
            foreach($data_kasus_kontak_cari as $kasus)
                if(stripos($kasus->user->mahasiswa->nama, $request->cari) !== false){
                    $data_kasus_kontak->push($kasus);
                }
                
            $data_kasus_kontak_pemantauan = \App\Models\kasus_kontak::where('status','=', 'pemantauan')->latest()->get();
            $data_kasus_kontak_selesai = \App\Models\kasus_kontak::where('status','=', 'selesai')->latest()->get();
            $data_kasus_kontak_terkonfirmasi = \App\Models\kasus_kontak::where('status','=', 'terkonfirmasi')->latest()->get();
            return view('pemantau.kontak.index', ['data_kasus_kontak' => $data_kasus_kontak,
                                                    'data_kasus_kontak_pemantauan' => $data_kasus_kontak_pemantauan,
                                                    'data_kasus_kontak_selesai' => $data_kasus_kontak_selesai,
                                                    'data_kasus_kontak_terkonfirmasi' => $data_kasus_kontak_terkonfirmasi,]);
        }
        
        $data_kasus_kontak = \App\Models\kasus_kontak::all();
        $data_kasus_kontak_pemantauan = \App\Models\kasus_kontak::where('status','=', 'pemantauan')->latest()->get();
        $data_kasus_kontak_selesai = \App\Models\kasus_kontak::where('status','=', 'selesai')->latest()->get();
        $data_kasus_kontak_terkonfirmasi = \App\Models\kasus_kontak::where('status','=', 'terkonfirmasi')->latest()->get();
        return view('pemantau.kontak.index', ['data_kasus_kontak' => $data_kasus_kontak,
                                                'data_kasus_kontak_pemantauan' => $data_kasus_kontak_pemantauan,
                                                'data_kasus_kontak_selesai' => $data_kasus_kontak_selesai,
                                                'data_kasus_kontak_terkonfirmasi' => $data_kasus_kontak_terkonfirmasi,]);
    }

    public function detailPemantauanKasusKontak($id)
    {
        $date = date("Y-m-d");
        $kasus_kontak = \App\Models\kasus_kontak::where('id','=', $id)->first();
        return view('pemantau.kontak.detailPemantauanKasusKontak', ['kasus_kontak'=>$kasus_kontak, 'date'=>$date]);
    }

    public function showFormB1($date, $kasus_kontak_id)
    {
        $form_b1 = \App\Models\b1_kasus_kontak::where('kasus_kontak_id','=', $kasus_kontak_id)->whereDate('created_at','=', $date)->first();
        if (!empty($form_b1)){
            return view('pemantau.kontak.showFormB1', ['form_b1' => $form_b1]);
        }else{
            return view('pemantau.kontak.kosong');
        }
    }

    public function showFormB2($date, $kasus_kontak_id)
    {
        $form_b2 = \App\Models\b2_kasus_kontak::where('kasus_kontak_id','=', $kasus_kontak_id)->whereDate('created_at','=', $date)->first();
        if (!empty($form_b2)){
            return view('pemantau.kontak.showFormB2', ['form_b2' => $form_b2]);
        }else{
            return view('pemantau.kontak.kosong');
        }
    }

    public function showFormB3($date, $kasus_kontak_id)
    {
        $form_b3 = \App\Models\b3_kasus_kontak::where('kasus_kontak_id','=', $kasus_kontak_id)->whereDate('created_at','=', $date)->first();
        if (!empty($form_b3)){
            return view('pemantau.kontak.showFormB3', ['form_b3' => $form_b3]);
        }else{
            return view('pemantau.kontak.kosong');
        }
    }
}
