<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemantau extends Model
{
    protected $table = 'pemantau';
    protected $fillable = ['nama','no_induk_pegawai','user_id'];
    use HasFactory;
}
