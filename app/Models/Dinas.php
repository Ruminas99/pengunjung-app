<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    protected $connection = 'mysql';
>>>>>>> efb13bd (kehadiran)
    protected $fillable = [
        'nama',
        'nama_kantor',
        'ke_bagian',
    ];
}
