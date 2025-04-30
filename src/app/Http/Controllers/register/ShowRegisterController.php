<?php

namespace App\Http\Controllers\register;

use Illuminate\Contracts\View\View;

/**
 * レシピ情報登録画面を表示する
 */
class ShowRegisterController
{
    public function __invoke(): View
    {
        // Todo: マスタから各種値を取得する
        return view('register');
    }
}
