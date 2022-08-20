<?php

use App\Http\Controllers\ArticleController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::resource('/articles', ArticleController::class)->except(['index', 'show']);
});
Route::resource('/articles', ArticleController::class)->only(['show']);
// 教材通りにやるとここがわかりずらいので後で、全てのルーティングを作るのもアリ
// そもそもresourceメソッドは、あまり多用しないほうがよさそう。可読性が下がる。
