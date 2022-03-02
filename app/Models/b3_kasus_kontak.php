<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class b3_kasus_kontak extends Model
{
    protected $table = 'b3_kasus_kontak';
    protected $fillable = ['id','kasus_kontak_id','demam','flu_pilek','batuk','sakit_tenggorokan','sesak_nafas','anosmia','ageusia','diagnosa lain', 'created_at', 'updated_at'];
    use HasFactory;

    public function kasus_kontak()
    {
        return $this -> belongsTo(kasus_kontak::class);
    }
}
