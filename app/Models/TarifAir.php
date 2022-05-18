<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifAir extends Model
{
    use HasFactory;

    protected $table = 'tarif_air';

    protected $fillable = [
        'kubik',
        'tarif',
    ];
}
