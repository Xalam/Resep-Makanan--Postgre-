<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    protected $fillable = [
        'ingredients_name'
    ];

    public function recipes_ingredients()
    {
        return $this->hasMany(RecipesIngredients::class, 'ingredients_id');
    }
}
