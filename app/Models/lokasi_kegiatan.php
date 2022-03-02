<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi_kegiatan extends Model
{
    protected $table = 'lokasi_kegiatan';
    protected $fillable = ['id','user_id','gedung','ruangan', 'tanggal','keluar_at','created_at','updated_at'];
    use HasFactory;

    public function user()
    {
        return $this -> belongsTo(User::class);
    }
}
