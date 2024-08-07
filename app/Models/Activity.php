<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jenis_aktivitas',
        'item',
        'jumlah',
        'ip_address',
    ];
}
