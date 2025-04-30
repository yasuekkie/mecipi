<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 材料カテゴリーマスタモデル
 */
class IngredientCategory extends Model
{
    protected $table = 'm_ingredient_categories';
    protected $fillable = [
        'category_name',
        'display_order',
        'created_at',
        'updated_at',
    ];

    public function ingredientGoods()
    {
        return $this->hasMany(IngredientGood::class, 'ingredient_category_id', 'id');
    }
}
