<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipesIngredients extends Model
{
    use HasFactory;

    protected $table = 'recipes_ingredients';

    protected $fillable = [
        'recipes_id',
        'ingredients_id'
    ];

    public function recipes()
    {
        return $this->belongsTo(Recipes::class, 'recipes_id', 'id');
    }

    public function ingredients()
    {
        return $this->belongsTo(Ingredients::class, 'ingredients_id', 'id');
    }
}
