<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * レシピ材料情報モデル
 */
class RecipeIngredient extends Model
{
    protected $table = 'recipe_ingredients';
    protected $fillable = [
        'recipe_id',
        'ingredient_goods_id',
        'created_at',
        'updated_at',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'id');
    }
}
