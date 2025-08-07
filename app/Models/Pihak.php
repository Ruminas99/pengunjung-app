<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pihak extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    protected $connection = 'mysql';
>>>>>>> efb13bd (kehadiran)
    protected $fillable = [
        'nama_pihak',
        'nomor_perkara',
        'hadir_sebagai',
    ];
}
