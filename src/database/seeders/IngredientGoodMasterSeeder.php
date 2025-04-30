<?php

namespace Database\Seeders;

use App\Models\IngredientGood;
use Illuminate\Database\Seeder;

/**
 * 材料品物マスタ シーダー
 */
class IngredientGoodMasterSeeder extends Seeder
{
    /**
     * シーダーにアイテムを追加したい場合はこの変数に追加してください。
     *
     * @var array $items 材料カテゴリーマスターに初期投入するデータ
     */
    private array $items = [
        // category1
        [
            'goods_name' => '豚',
            'ingredient_category_id' => 1,
            'display_order' => 1,
        ],
        [
            'goods_name' => '鶏',
            'ingredient_category_id' => 1,
            'display_order' => 2,
        ],
        [
            'goods_name' => '牛',
            'ingredient_category_id' => 1,
            'display_order' => 3,
        ],

        // category2
        [
            'goods_name' => 'ブリ',
            'ingredient_category_id' => 2,
            'display_order' => 1,
        ],
        [
            'goods_name' => '鯛',
            'ingredient_category_id' => 2,
            'display_order' => 2,
        ],
        [
            'goods_name' => 'マグロ',
            'ingredient_category_id' => 2,
            'display_order' => 3,
        ],

        // category3
        [
            'goods_name' => 'キャベツ',
            'ingredient_category_id' => 3,
            'display_order' => 1,
        ],
        [
            'goods_name' => '白菜',
            'ingredient_category_id' => 3,
            'display_order' => 2,
        ],
        [
            'goods_name' => '大根',
            'ingredient_category_id' => 3,
            'display_order' => 3,
        ],

        // category4
        [
            'goods_name' => 'バジル',
            'ingredient_category_id' => 4,
            'display_order' => 1,
        ],
        [
            'goods_name' => '鷹の爪',
            'ingredient_category_id' => 4,
            'display_order' => 2,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->items as $item) {
            IngredientGood::updateOrCreate(
                [
                    'goods_name' => $item['goods_name'],
                    'ingredient_category_id' => $item['ingredient_category_id'],
                ],
                [
                    'display_order' => $item['display_order'],
                ]
            );
        }
    }
}
