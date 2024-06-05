<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'food';
    protected $fillable = [
        'food_group_id',
        'name',
        'slug',
        'description',
        'image',
        'energy',
        'protein',
        'fat',
        'carbohydrates',
        'calcium',
        'phosphorus',
        'iron',
        'vitamin_a',
        'vitamin_b1',
        'vitamin_c',
        'f_edible',
        'f_weight',
    ];

    public function foodGroup()
    {
        return $this->belongsTo(FoodGroup::class, 'food_group_id', 'id');
    }
}
