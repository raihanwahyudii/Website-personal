<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hafalan extends Model
{
    protected $fillable = [
        'user_id',
        'surat',
        'ayat',
        'tanggal_setoran',
        'penerima_setoran',
        'status',
    ];

    // Tambahkan ini supaya tanggal_setoran di-cast ke Carbon instance
    protected $casts = [
        'tanggal_setoran' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

