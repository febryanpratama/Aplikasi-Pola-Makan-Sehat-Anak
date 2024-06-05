<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standar extends Model
{
    use HasFactory;

    protected $fillable = [
        'old',
        'gender',
        'type',
        'minus_3_sd',
        'minus_2_sd',
        'minus_1_sd',
        'median',
        'plus_1_sd',
        'plus_2_sd',
        'plus_3_sd',
        'standar_protein',
        'standar_energy',
        'standar_lemak',
        'standar_carbohydrat',
        'description',
    ];
}
