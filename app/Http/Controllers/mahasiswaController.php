<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    public function dashboard()
    {
        return view('mahasiswa.dashboard');
    }

    public function profile($id)
    {
        if(auth()->user()->id == $id){
            $user = \App\Models\User::find($id);
            $pelaporan = \App\Models\pelaporan_kasus_terkonfirmasi::where('user_id','=', $id)->get();
            $len = count($pelaporan);
            return view('mahasiswa.profil.profil',['user' => $user, 'pelaporan' => $pelaporan, 'len' => $len]);
        } else{
            return redirect('mahasiswa/dashboard');
        }
    }

    public function editProfile($id)
    {
        if(auth()->user()->id == $id){
            $user = \App\Models\User::find($id);
            return view('mahasiswa.profil.editprofil',['user' => $user]);
        } else{
            return redirect('mahasiswa/dashboard');
        }
    }

    public function updateProfile(Request $request,$id)
    {
        //Validasi
        $this->validate($request,[
            'no_telp' => 'required|numeric',
            'no_telp_darurat' => 'required|numeric',
            'hub_no_telp_darurat' => 'required',
            'alamat' => 'required',
        ]);

        $user = \App\Models\User::find($id);
        $user->mahasiswa->update($request->all());
        
        return redirect("/mahasiswa/$id/profil")->with('input_berhasil','Data Pribadi Berhasil Diubah');
    }

    public function editAkun($id)
    {
        if(auth()->user()->id == $id){
            $user = \App\Models\User::find($id);
            return view('mahasiswa.akun.editakun',['user' => $user]);
        } else{
            return redirect('mahasiswa/dashboard');
        }
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
        
        return redirect("/mahasiswa/$id/profil")->with('input_berhasil','Password Berhasil Diubah');
    }
}
