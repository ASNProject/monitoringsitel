<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Monitoring extends Model
{
    use HasFactory;
    protected $fillable = [
        'cel1',
        'cel2',
        'cel3',
        'cel4',
        'total',
        'current',
        'soc',
        'resistance',
        'temperature',
        'fuzzy'
    ];
}
