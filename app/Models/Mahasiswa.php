<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    protected $connection = 'mysql';
>>>>>>> efb13bd (kehadiran)
    protected $fillable = [
        'nama',
        'no_hp',
        'universitas',
        'jumlah_klinis',
    ];
}
