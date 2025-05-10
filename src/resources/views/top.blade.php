<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>今日何にする? / mecipi</title>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 材料スライド
            const openPanelButton = document.getElementById('open-panel-button');
            const panel = document.getElementById('ingredient-panel');
            openPanelButton.addEventListener('click', () => {
                panel.classList.remove('translate-y-full');
            });

            // 削除モーダル
            const modal = document.getElementById('delete-modal');
            const cancelButton = document.getElementById('cancel-delete');
            const deleteForm = document.getElementById('deleteForm');
            const deleteButtons = document.querySelectorAll('.delete-button');

            // 各ゴミ箱ボタンのactionにrecipe-idを紐づける
            deleteButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const recipeId = button.getAttribute('data-id');
                    deleteForm.action = `/recipe/${recipeId}`;
                    modal.classList.remove('hidden');
                })
            });

            cancelButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        });
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="flex items-center justify-center min-h-screen bg-gradient-to-r from-orange-100 to-yellow-100 overflow-hidden">
    <div class="w-full max-w-md mx-4 p-8 bg-white rounded-lg shadow-md h-[calc(100vh-40px)] flex flex-col">
        <h1 class="text-4xl font-extrabold text-center text-orange-500 mb-3">mecipi</h1>

        {{-- 帯 --}}
        <div class="mb-4">
            <a href="/register"
                class="block text-center bg-amber-100 text-amber-800 font-semibold py-3 rounded-md shadow hover:bg-amber-200 transition">
                レシピを登録する！
            </a>
        </div>

        {{-- 検索エリア --}}
        <form action="/" method="POST" class="border-t border-gray-300 pt-4">
            {{-- 検索条件 --}}
            @csrf
            {{-- 条件エリア --}}
            <div>
                <label for="recipe-name" class="block text-lg font-semibold">レシピ名</label>
                <input type="text" name="recipe-name" id="recipe-name"
                    class="w-full px-4 py-3 mt-2 border rounded-lg focus:ring-2 focus:ring-orange-400"
                    placeholder="レシピ名を入力">
            </div>

            {{-- Todo: 材料から検索できる仕組みを作成 --}}
            <div class="mt-4">
                <button type="button" id="open-panel-button"
                    class="w-full bg-orange-100 text-slate-600 font-semibold py-3 rounded-md shadow hover:bg-orange-200 transition">
                    材料から検索
                </button>
            </div>

            {{-- ボタンエリア --}}
            <div class="flex justify-between pb-4 border-b border-gray-300 mt-4">
                <a href="/" class="px-6 py-3 text-gray-700 bg-gray-300 rounded-lg hover:bg-gray-400">
                    クリア
                </a>
                <button type="submit" class="px-6 py-3 text-white bg-orange-500 rounded-lg hover-bg-orange-600">
                    検索
                </button>
            </div>
        </form>

        {{-- 検索結果 --}}
        <div class="mt-4 overflow-y-auto flex-grow space-y-4">
            @if ($searched)
                <h2 class="text-lg font-semibold text-gray-700 mb-2">検索結果</h2>

                @if ($recipes->isEmpty())
                    <p class="text-gray-500">該当するレシピはありませんでした。</p>
                @else
                    @foreach ($recipes as $recipe)
                        <div
                            class="p-4 bg-orange-50 border border-orange-200 rounded-xl shadow-sm hover:shadow-md transition-shadow relative">
                            <a href="{{ $recipe->url }}" target="__blank" rel="noopener noreferrer" class="block">
                                <h3 class="text-xl font-bold text-orange-600 hover:underline">
                                    {{ $recipe->recipe_name }}
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">詳しく見る</p>
                            </a>

                            <!-- ゴミ箱アイコン（右上） -->
                            <button type="button" data-id="{{ $recipe->id }}"
                                class="delete-button absolute top-1/2 right-4 transform -translate-y-1/2 focus:outline-none active:scale-90 p-2 transition-transform duration-150">
                                <i
                                    class="fas fa-trash-alt text-3xl text-gray-500 hover:text-red-500 transition-colors duration-200"></i>
                            </button>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>

    {{-- 材料スライド --}}
    <div id="ingredient-panel"
        class="fixed bottom-0 w-full max-w-md mx-auto bg-white border-t border-gray-300 rounded-t-2xl shadow-lg transform translate-y-full transition-transform duration-300 z-40">

        <div class="w-full max-w-md mx-auto px-4 py-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">材料から検索</h2>

            <!-- 材料のチェックボックスなどここに配置 -->
            <div class="space-y-2">
                <label class="block">
                    <input type="checkbox" name="ingredient[]" value="肉" class="mr-2">
                    肉
                </label>
                <label class="block">
                    <input type="checkbox" name="ingredient[]" value="魚" class="mr-2">
                    魚
                </label>
                <label class="block">
                    <input type="checkbox" name="ingredient[]" value="野菜" class="mr-2">
                    野菜
                </label>
            </div>

            <!-- 閉じるボタン -->
            <div class="mt-6 flex justify-end">
                <button id="close-panel-button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                    閉じる
                </button>
            </div>
        </div>
    </div>


    {{-- 削除確認モーダル --}}
    <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full text-center">
            <p class="text-lg font-semibold mb-4">本当に削除しますか？</p>
            <div class="flex justify-center space-x-4">
                <button id="cancel-delete" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                    キャンセル
                </button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        削除
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
