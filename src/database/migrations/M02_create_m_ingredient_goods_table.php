<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 材料品物マスタ
 *
 * レシピに登録される材料品目を管理
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_ingredient_goods', function (Blueprint $table) {
            $table->id()->comment('材料品物ID');
            $table->string('goods_name')->comment('材料品物名');
            $table->foreignId('ingredient_category_id')->constrained('m_ingredient_categories')->comment('材料カテゴリーID');
            $table->integer('display_order')->comment('表示順');
            $table->timestamp('created_at')->comment('登録日時');
            $table->timestamp('updated_at')->comment('更新日時');

            $table->comment('材料品物マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_ingredient_goods');
    }
};
