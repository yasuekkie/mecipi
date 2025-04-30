<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 材料品物マスタモデル
 */
class IngredientGood extends Model
{
    protected $table = 'm_ingredient_goods';
    protected $fillable = [
        'goods_name',
        'ingredient_category_id',
        'display_order',
        'created_at',
        'updated_at',
    ];

    public function ingredientCategory()
    {
        return $this->belongsTo(IngredientCategory::class, 'ingredient_category_id', 'id');
    }
}
