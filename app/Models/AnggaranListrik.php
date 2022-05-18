<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggaranListrik extends Model
{
    use HasFactory;

    protected $table = 'anggaran_listrik';

    protected $fillable = [
        'tahun',
        'bulan',
        'anggaran',
        'tgl_bayar',
    ];
}
