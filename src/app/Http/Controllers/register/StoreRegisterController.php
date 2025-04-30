<?php

namespace App\Http\Controllers\register;

use App\Http\Actions\register\StoreRegisterAction;
use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Http\RedirectResponse;

/**
 * レシピ情報を登録する
 */
class StoreRegisterController
{
    private StoreRegisterAction $action;

    function __construct(StoreRegisterAction $action)
    {
        $this->action = $action;
    }

    public function __invoke(StoreRegisterRequest $request): RedirectResponse
    {
        $inputs = $request->all();

        $this->action->create($inputs);

        return redirect('register');
    }
}
