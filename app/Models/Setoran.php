<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'penerima_id',
        'tanggal',
        'surat',
        'ayat_start',
        'ayat_end',
        'catatan',
        'hafalan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penerima()
    {
        return $this->belongsTo(User::class, 'penerima_id');
    }
}
