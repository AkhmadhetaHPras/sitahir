<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;

    protected $table = 'keluhan';

    protected $fillable = [
        'id_anggota',
        'tgl_pengajuan',
        'jenis_keluhan',
        'deskripsi',
        'tgl_survey',
        'tgl_selesai',
        'status',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
