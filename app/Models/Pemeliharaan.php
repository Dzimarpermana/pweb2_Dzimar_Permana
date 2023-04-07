<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $table = 'pemeliharaan';

    protected $fillable = [
        'nama_jalan',
        'jenis_pemeliharaan',
        'nama_kontraktor',
        'status',
    ];
}
