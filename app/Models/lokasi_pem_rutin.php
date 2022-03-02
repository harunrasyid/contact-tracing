<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi_pem_rutin extends Model
{
    protected $table = 'lokasi_pem_rutin';
    protected $fillable = ['id','pem_rutin_id','waktu','gedung','ruang'];
    use HasFactory;

    public function pem_rutin()
    {
        return $this -> belongsTo(pem_rutin::class);
    }
}
