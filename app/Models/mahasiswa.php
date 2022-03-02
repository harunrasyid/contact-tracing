<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama','nim','fakultas','prodi','user_id','no_telp','no_telp_darurat','hub_no_telp_darurat','alamat','tgl_lahir','status_kesehatan'];
    use HasFactory;
}
