<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelaporan_kasus_terkonfirmasi extends Model
{
    protected $table = 'pelaporan_kasus_terkonfirmasi';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    use HasFactory;

    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function a2_kasus_terkonfirmasi()
    {
        return $this->hasOne(a2_kasus_terkonfirmasi::class);
    }

    public function kasus_kontak()
    {
        return $this->hasMany(kasus_kontak::class);
    }
}
