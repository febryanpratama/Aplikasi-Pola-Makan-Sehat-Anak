<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRecommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'food_id',
        'time',
        'notes'
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
