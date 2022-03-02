<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mahasiswa()
    {
        return $this->hasOne(mahasiswa::class);
    }

    public function admin(){
        return $this->hasOne(admin::class);
    }

    public function pemantau(){
        return $this->hasOne(pemantau::class);
    }

    public function posts()
    {
        return $this->hasMany(post::class);
    }

    public function pem_rutin()
    {
        return $this->hasMany(pem_rutin::class);
    }

    public function pelaporan_kasus_terkonfirmasi()
    {
        return $this->hasMany(pelaporan_kasus_terkonfirmasi::class);
    }

    public function kasus_kontak()
    {
        return $this->hasMany(kasus_kontak::class);
    }

    public function a2_kasus_terkonfirmasi()
    {
        return $this->hasMany(a2_kasus_terkonfirmasi::class);
    }

    public function lokasi_kegiatan()
    {
        return $this->hasMany(lokasi_kegiatan::class);
    }
}
