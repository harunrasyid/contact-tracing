<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\verificationMail;
use App\Mail\resetPasswordMail;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        //jika login berhasil
        if(Auth::attempt($request->only('email','password'))){
            if(auth()->user()->role == 'mahasiswa'){
                //jika user
                if(auth()->user()->email_verified_at != NULL){
                    return redirect('mahasiswa/dashboard');
                } else{
                    return redirect('belum-verifikasi');
                }
            } elseif(auth()->user()->role == 'admin'){
                //jika admin
                return redirect('admin/dashboard');
            } else{
                //jika tim pemantau kesehatan
                return redirect('pemantau/dashboard');
            }
        }
        //jika login gagal
        return redirect('/')->with('login_gagal','Password Atau Email Salah');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function belumVerifikasi()
    {
        return view('auths.belumVerifikasi');
    }
    
    public function verifikasiEmail($id)
    {
        $user = \App\Models\User::find($id);
        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('regis_berhasil','Verifikasi Email Berhasil, Silahkan Melakukan Login');
    }
    
    public function resetPassword()
    {
        return view('auths.resetPassword');
    }
    
    public function postReset(Request $request)
    {
        //Validasi
        $this->validate($request,[
            
            'email' => 'required|email|exists:users',
        ]);
        
        $user = \App\Models\User::where('email', '=' , $request->email)->first();
        $user->updated_at = now();
        $user->save();
        
        Mail::to($request->email)->send(new resetPasswordMail($user->id));

        return redirect('/')->with('regis_berhasil','Link reset password telah dikirim, cek email anda');
    }
    
    public function register(Request $request)
    {
        return view('auths.register');
    }

    public function postregister(Request $request)
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
        
        Mail::to($request->email)->send(new verificationMail($user->id));

        return redirect('/')->with('regis_berhasil','Registrasi Akun Berhasil, Silahkan Melakukan Verifikasi Email');
    }
}
