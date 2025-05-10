<?php

namespace App\Http\Controllers\top;

use App\Http\Actions\top\SearchTopAction;

class SearchTopController
{
    private SearchTopAction $action;

    function __construct(SearchTopAction $action)
    {
        $this->action = $action;
    }

    public function __invoke()
    {
        $inputs = request()->except('_token');

        $recipes = $this->action->search($inputs);
        $searched = true;

        return view('top', compact('recipes', 'searched'));
    }
}
