<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * レシピ情報モデル
 */
class Recipe extends Model
{
    protected $table = 'recipes';
    protected $fillable = [
        'recipe_name',
        'url',
        'memo',
        'created_at',
        'updated_at',
    ];

    public function recipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::class, 'recipe_id', 'id');
    }
}
