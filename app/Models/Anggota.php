<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'id_users',
        'nama',
        'alamat',
        'tgl_gabung',
        'nowa',
        'foto',
        'instalasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function buku_air()
    {
        return $this->hasMany(BukuAir::class, 'id_anggota');
    }

    public function keluhan()
    {
        return $this->hasMany(Keluhan::class, 'id_anggota');
    }

    public function instalasi()
    {
        return $this->hasOne(Instalasi::class, 'id_anggota');
    }
}
