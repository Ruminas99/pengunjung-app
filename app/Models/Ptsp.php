<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptsp extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama',
        'no_hp',
        'ke_meja',
    ];
}
