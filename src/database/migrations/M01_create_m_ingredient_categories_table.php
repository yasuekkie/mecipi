<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 材料カテゴリーマスタ
 *
 * レシピに登録される材料のカテゴリーを管理
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_ingredient_categories', function (Blueprint $table) {
            $table->id()->comment('材料カテゴリーID');
            $table->string('category_name')->comment('カテゴリー名');
            $table->integer('display_order')->comment('表示順');
            $table->timestamp('created_at')->comment('登録日時');
            $table->timestamp('updated_at')->comment('更新日時');

            $table->comment('材料カテゴリーマスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_ingredient_categories');
    }
};
