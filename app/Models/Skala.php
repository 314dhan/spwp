<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skala extends Model
{
    use HasFactory;
    protected $table = "skala";
    public $timestamps = false;

    protected $fillable = [
        'nama_skala',
        'nilai_skala',
    ];
}
