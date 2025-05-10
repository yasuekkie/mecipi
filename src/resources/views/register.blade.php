<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>レシピ登録 / mecipi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function toggleAccordion(id, element) {
            const content = document.getElementById(id);
            const isOpen = !content.classList.toggle("hidden");
            const icon = element.querySelector("span.icon");

            if (isOpen) {
                content.classList.remove("hidden");
                element.classList.add("bg-orange-200");
                element.classList.remove("bg-gray-100");
                icon.textContent = "-";
            } else {
                content.classList.add("hidden");
                element.classList.remove("bg-orange-200");
                element.classList.add("bg-gray-100");
                icon.textContent = "+";
            }
        }
    </script>
</head>

<body
    class="flex items-center justify-center min-h-screen bg-gradient-to-r from-orange-100 to-yellow-100 overflow-hidden">
    <div class="w-full max-w-md mx-4 p-8 bg-white rounded-lg shadow-md h-[calc(100vh-40px)] flex flex-col">
        <h1 class="text-4xl font-extrabold text-center text-orange-500 mb-3">mecipi</h1>

        <form action="/store" method="POST" class="flex flex-col flex-grow overflow-hidden">
            @csrf

            <div class="flex-grow overflow-y-auto space-y-6">
                @if ($errors->any())
                    <div
                        class="bg-red-100 border-l-4 border-r-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mx-1 my-3">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label for="recipe_name" class="block text-lg font-semibold">料理名</label>
                    <input class="w-full px-4 py-3 mt-2 border rounded-lg focus:ring-2 focus:ring-orange-400"
                        type="text" id="recipe_name" name="recipe_name" placeholder="料理名を記入">
                </div>

                <div>
                    <label for="url" class="block text-lg font-semibold">URL</label>
                    <input class="w-full px-4 py-3 mt-2 border rounded-lg focus:ring-2 focus:ring-orange-400"
                        type="url" id="url" name="url" placeholder="URLを記入">
                </div>

                <div>
                    <div class="bg-gray-100 p-3 rounded-lg cursor-pointer flex justify-between items-center transition-all duration-300 hover:bg-orange-200"
                        onclick="toggleAccordion('ingredient-options', this)">
                        <span class="text-lg font-semibold">材料</span>
                        <span class="icon text-orange-500 font-bold transition-transform duration-300">＋</span>
                    </div>
                    <div id="ingredient-options"
                        class="hidden space-y-2 mt-2 transition-all duration-300 overflow-hidden">
                        <div class="flex justify-between items-center bg-gray-100 p-3 rounded-lg cursor-pointer"
                            onclick="toggleAccordion('meat-options', this)">
                            <span>肉</span>
                            <span class="icon text-orange-500 font-bold">＋</span>
                        </div>
                        <div id="meat-options"
                            class="hidden p-4 border border-orange-300 bg-gray-50 rounded-lg shadow-md">
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="meat[]" value="1"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span>豚</span>
                            </label>
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="meat[]" value="2"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span class="text-lg font-medium">鶏</span>
                            </label>
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="meat[]" value="3"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span class="text-lg font-medium">牛</span>
                            </label>
                        </div>

                        <div class="flex justify-between items-center bg-gray-100 p-3 rounded-lg cursor-pointer"
                            onclick="toggleAccordion('fish-options', this)">
                            <span>魚</span>
                            <span class="icon text-orange-500 font-bold">＋</span>
                        </div>
                        <div id="fish-options"
                            class="hidden p-4 border border-orange-300 bg-gray-50 rounded-lg shadow-md">
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="fish[]" value="4"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span>ブリ</span>
                            </label>
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="fish[]" value="5"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span class="text-lg font-medium">鯛</span>
                            </label>
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="fish[]" value="6"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span class="text-lg font-medium">マグロ</span>
                            </label>
                        </div>

                        <div class="flex justify-between items-center bg-gray-100 p-3 rounded-lg cursor-pointer"
                            onclick="toggleAccordion('vegetable-options', this)">
                            <span>野菜</span>
                            <span class="icon text-orange-500 font-bold">＋</span>
                        </div>
                        <div id="vegetable-options" class="hidden p-3 border rounded-lg">
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="vegetable[]" value="7"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span>キャベツ</span>
                            </label>
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="vegetable[]" value="8"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span class="text-lg font-medium">白菜</span>
                            </label>
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="vegetable[]" value="9"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span class="text-lg font-medium">大根</span>
                            </label>
                        </div>

                        <div class="flex justify-between items-center bg-gray-100 p-3 rounded-lg cursor-pointer"
                            onclick="toggleAccordion('other-options', this)">
                            <span>その他</span>
                            <span class="icon text-orange-500 font-bold">＋</span>
                        </div>
                        <div id="other-options" class="hidden p-3 border rounded-lg">
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="other[]" value="10"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span>バジル</span>
                            </label>
                            <label
                                class="flex items-center space-x-2 hover:bg-orange-100 p-2 rounded-lg transition-all duration-300">
                                <input type="checkbox" name="other[]" value="11"
                                    class="w-5 h-5 text-orange-500 accent-orange-500">
                                <span class="text-lg font-medium">鷹の爪</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="memo" class="block text-lg font-semibold">メモ</label>
                    <input class="w-full px-4 py-3 mt-2 border rounded-lg focus:ring-2 focus:ring-orange-400"
                        type="text" id="memo" name="memo" placeholder="メモを記入">
                </div>
            </div>

            {{-- ボタンエリア --}}
            <div class="bg-white py-3 flex justify-between mt-4">
                <button type="button" class="px-6 py-3 text-gray-700 bg-gray-300 rounded-lg hover:bg-gray-400"
                    onclick="location.href='/';">
                    戻る
                </button>
                <button type="submit" class="px-6 py-3 text-white bg-orange-500 rounded-lg hover:bg-orange-600">
                    登録
                </button>
            </div>
        </form>
    </div>
</body>

</html>
