<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = "kriteria";
    public $timestamps = false;

    protected $primaryKey = 'id_kriteria';

    protected $fillable = [
        'kriteria',
        'kepentingan',
        'cost_benefit',
    ];
}
