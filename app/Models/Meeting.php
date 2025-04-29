<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'location',
        'participants',
        'agenda',
        'notes',
    ];

    public function getDateAttribute($value)
    {
        return Carbon::parse($value);  // Mengonversi string menjadi objek Carbon
    }
}
