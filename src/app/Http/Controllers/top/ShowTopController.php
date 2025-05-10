<?php

namespace App\Http\Controllers\top;

class ShowTopController
{
    public function __invoke()
    {
        $recipes = collect();
        $searched = false;

        return view('top', compact('recipes', 'searched'));
    }
}
