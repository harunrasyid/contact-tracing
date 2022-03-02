<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasus_kontak extends Model
{
    protected $table = 'kasus_kontak';
    protected $fillable = ['id','pelaporan_kasus_terkonfirmasi_id','user_id', 'ruangan', 'kontak_at', 'status' ,'created_at', 'updated_at'];
    use HasFactory;

    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function pelaporan_kasus_terkonfirmasi()
    {
        return $this -> belongsTo(pelaporan_kasus_terkonfirmasi::class);
    }

    public function b1_kasus_kontak()
    {
        return $this->hasOne(b1_kasus_kontak::class);
    }

    public function b2_kasus_kontak()
    {
        return $this->hasOne(b2_kasus_kontak::class);
    }

    public function b3_kasus_kontak()
    {
        return $this->hasMany(b3_kasus_kontak::class);
    }

}
