<?php

namespace App\Data\register;

/**
 * レシピ登録フォームのデータクラス
 */
class RecipeRegisterData
{
    /**
     * @var array $recipeInfos レシピ情報
     * @var array $ingredientInfos 材料情報
     */
    function __construct(
        public array $recipeInfos,
        public array $ingredientInfos
    ) {}

    /**
     * レシピ登録フォームのデータを生成する
     *
     * @param array $inputs レシピ登録フォームの入力値
     * @return RecipeRegisterData
     */
    public static function from(array $inputs): self
    {
        $recipeInfos = [
            'recipe_name' => $inputs['recipe_name'],
            'url' => $inputs['url'],
            'memo' => $inputs['memo'],
        ];

        $ingredientInfos = [];
        foreach (['meat', 'fish', 'vegetable', 'other'] as $category) {
            $ingredientInfos[$category] = $inputs[$category] ?? [];
        }

        return new self($recipeInfos, $ingredientInfos);
    }
}
