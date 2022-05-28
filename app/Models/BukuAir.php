<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class BukuAir extends Model
{
    use HasFactory;

    protected $table = 'buku_air';

    protected $fillable = [
        'id_anggota',
        'tahun',
        'bulan',
        'foto',
        'meteran_air',
        'kubik',
        'tarif',
        'status',
        'tgl_bayar',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
