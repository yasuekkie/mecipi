<?php

namespace App\Http\Actions\top;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Collection;

class SearchTopAction
{
    /**
     * 検索条件から検索結果を取得する
     *
     * @param array $inputs 検索条件
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe>
     */
    public function search(array $inputs): Collection
    {
        $recipeName = $inputs['recipe-name'];

        if (isset($recipeName)) {
            return Recipe::where('recipe-name', 'like', '%' . $recipeName . '%')->get();
        }

        return Recipe::all();
    }
}
