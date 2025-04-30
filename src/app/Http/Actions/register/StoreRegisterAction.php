<?php

namespace App\Http\Actions\register;

use App\Data\register\RecipeRegisterData;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use Illuminate\Support\Facades\DB;

/**
 * レシピ情報とレシピ材料情報をDBに登録する
 */
class StoreRegisterAction
{
    /**
     * レシピ登録フォームの入力値を元にレシピ情報と材料情報を登録する
     * この操作はトランザクション内で実行され、2つのテーブルにデータが登録できなかった場合自動でロールバックされる
     *
     * @param array $inputs レシピ登録フォームの入力値
     * @return void
     */
    public function create(array $inputs): void
    {
        $data = RecipeRegisterData::from($inputs);

        DB::transaction(function () use ($data) {
            // レシピ情報を登録
            $recipe = Recipe::create($data->recipeInfos);

            // 材料情報を登録
            foreach ($data->ingredientInfos as $category => $ingredients) {
                foreach ($ingredients as $ingredient) {
                    RecipeIngredient::create([
                        'recipe_id' => $recipe->id,
                        'ingredient_goods_id' => $ingredient,
                    ]);
                }
            }
        });
    }
}
