<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pem_rutin extends Model
{
    protected $table = 'pem_rutin';
    protected $fillable = ['user_id','tanggal','demam','batuk','lemas','sakit_kepala','pegal','sakit_tenggorokan','sesak_nafas','anosmia','ageusia','kontak','masuk_kampus'];
    use HasFactory;
    
    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function lokasi_pem_rutin()
    {
        return $this->hasMany(lokasi_pem_rutin::class);
    }
}
