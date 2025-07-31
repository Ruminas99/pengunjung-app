<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pihak extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pihak',
        'nomor_perkara',
        'hadir_sebagai',
    ];
}
