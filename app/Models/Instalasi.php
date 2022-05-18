<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalasi extends Model
{
    use HasFactory;

    protected $table = 'instalasi';

    protected $fillable = [
        'id_anggota',
        'tgl_buat',
        'tgl_survey',
        'tarif_instalasi',
        'tgl_pemasangan',
        'tgl_selesai',
        'status',
    ];
}
