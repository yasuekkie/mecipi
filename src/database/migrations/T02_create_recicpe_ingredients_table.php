<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * レシピ材料情報
 *
 * レシピに登録される材料情報を管理
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->id()->comment('レシピ材料ID');
            $table->foreignId('recipe_id')->constrained('recipes')->comment('レシピID');
            $table->foreignId('ingredient_goods_id')->constrained('m_ingredient_goods')->comment('材料品物ID');
            $table->timestamp('created_at')->comment('登録日時');
            $table->timestamp('updated_at')->comment('更新日時');

            // レシピIDと材料品物IDの組み合わせにインデックスを作成
            $table->index(['recipe_id', 'ingredient_goods_id']);

            $table->comment('レシピ材料情報');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_ingredients');
    }
};
