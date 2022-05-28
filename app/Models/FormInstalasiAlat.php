<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormInstalasiAlat extends Model
{
    use HasFactory;

    protected $table = 'form_instalasi_alat';

    protected $fillable = [
        'id_instalasi',
        'nama_barang',
        'jumlah',
        'harga_satuan',
        'subtotal',
    ];

    public function instalasi()
    {
        return $this->belongsTo(Instalasi::class, 'id_instalasi');
    }
}
