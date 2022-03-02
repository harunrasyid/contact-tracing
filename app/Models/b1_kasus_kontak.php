<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class b1_kasus_kontak extends Model
{
    protected $table = 'b1_kasus_kontak';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    use HasFactory;
}
