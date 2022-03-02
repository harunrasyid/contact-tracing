<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function editAkun($id)
    {
        $user = \App\Models\User::find($id);
        return view('admin.akun.editakun',['user' => $user]);
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
        
        return redirect("/admin/$id/editakun")->with('input_berhasil','Pengaturan Akun Berhasil Diubah');
    }

    public function akunPengguna(Request $request)
    {
        if($request->has('cari')){
            $data_mahasiswa = \App\Models\siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_mahasiswa = \App\Models\mahasiswa::all();
        }
        return view('admin.akunPengguna.akunPengguna', ['data_mahasiswa' => $data_mahasiswa]);
    }

    public function deleteAkunPengguna($id)
    {
        $mahasiswa =\App\Models\mahasiswa::where('user_id', $id)->delete();
        $user = \App\Models\User::where('id', $id)->delete();
        return redirect('/admin/akunPengguna')->with('input_berhasil','Akun Pengguna Berhasil Dihapus');
    }
    
    public function resetPassword($id)
    {
        $user = \App\Models\User::find($id);
        $user->password = bcrypt("Rahasia123@");
        $user->save();
        
        return redirect('/admin/akunPengguna')->with('input_berhasil','Passwor Berhasil Diubah');
    }
    
    public function add()
    {
        return view('admin.akunPengguna.add');
    }
    
    public function postadd(Request $request)
    {
        //Validasi
        $this->validate($request,[
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'NIM' => 'required|numeric|unique:mahasiswa',
            'fakultas' => 'required',
            'prodi' => 'required',
            'no_telp' => 'required|numeric|unique:mahasiswa',
            'no_telp_darurat' => 'required|numeric',
            'hub_no_telp_darurat' => 'required',
            'alamat' => 'required',

            'email' => 'required|email|unique:users',
            'password' => ['min:8', 'required_with:password_confirm', 'same:password_confirm', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?([^\w\s]|[_])).{8,}$/'],
            'password_confirm' => 'min:8'
        ]);

        $mahasiswa = new \App\Models\mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->NIM = $request->NIM;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->no_telp = $request->no_telp;
        $mahasiswa->no_telp_darurat = $request->no_telp_darurat;
        $mahasiswa->hub_no_telp_darurat = $request->hub_no_telp_darurat;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->status_kesehatan = 'sehat';

        $user = new \App\Models\User;
        $user->role = 'mahasiswa';
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $user->mahasiswa()->save($mahasiswa);

        return redirect('/admin/akunPengguna')->with('input_berhasil','Akun pengguna berhasil ditambahkan');
    }

    public function editAkunPengguna($id)
    {
        $user = \App\Models\User::find($id);
        return view('admin.akunPengguna.editAkunPengguna',['user' => $user]);
    }

    public function updateAkunPengguna(Request $request,$id)
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
        
        return redirect('/admin/akunPengguna')->with('input_berhasil','Data Akun Pengguna Berhasil Diubah');
    }
}
