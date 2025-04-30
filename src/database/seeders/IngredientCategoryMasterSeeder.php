<?php

namespace Database\Seeders;

use App\Models\IngredientCategory;
use Illuminate\Database\Seeder;

/**
 * 材料カテゴリーマスタ シーダー
 */
class IngredientCategoryMasterSeeder extends Seeder
{
    /**
     * シーダーにアイテムを追加したい場合はこの変数に追加してください。
     *
     * @var array $items 材料カテゴリーマスターに初期投入するデータ
     */
    private array $items = [
        [
            'category_name' => '肉',
            'display_order' => 1,
        ],
        [
            'category_name' => '魚',
            'display_order' => 2,
        ],
        [
            'category_name' => '野菜',
            'display_order' => 3,
        ],
        [
            'category_name' => 'その他',
            'display_order' => 4,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->items as $item) {
            IngredientCategory::updateOrCreate(
                [
                    'category_name' => $item['category_name'],
                ],
                [
                    'display_order' => $item['display_order'],
                ]
            );
        }
    }
}
