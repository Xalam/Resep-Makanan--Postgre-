<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    protected $fillable = [
        'recipes_name',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function recipes_ingredients()
    {
        return $this->hasMany(RecipesIngredients::class, 'recipes_id');
    }
}
