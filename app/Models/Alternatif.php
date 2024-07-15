<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = "alternatif";
    public $timestamps = false;

    protected $primaryKey = 'id_alternatif';

    protected $fillable = [
        'alternatif',
        'k1',
        'k2',
        'k3',
        'k4',
        'k5',
    ];
}

