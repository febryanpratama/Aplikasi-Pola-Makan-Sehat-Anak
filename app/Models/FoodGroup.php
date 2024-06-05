<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodGroup extends Model
{
    use HasFactory;

    // Protected properties
    protected $fillable = [
        'name',
        'slug',
        'code_name', // Add this line
        'description',
    ];

    // Relationships
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
