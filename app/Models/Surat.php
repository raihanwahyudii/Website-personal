<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setoran;  // <--- Import model Setoran

class Surat extends Model
{
    protected $fillable = ['nama_surat'];

    public function setorans()
    {
        return $this->hasMany(Setoran::class);
    }
}
