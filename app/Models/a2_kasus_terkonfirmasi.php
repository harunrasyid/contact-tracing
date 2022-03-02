<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class a2_kasus_terkonfirmasi extends Model
{
    protected $table = 'a2_kasus_terkonfirmasi';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    use HasFactory;

    public function user()
    {
        return $this -> belongsTo(User::class);
    }
}
