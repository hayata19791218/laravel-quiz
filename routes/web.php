<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//無効なURLはトップページにリダイレクト
Route::fallback(function () {
	return redirect('/');
});

Route::controller(QuizController::class)->group(function(){
    //トップページ
    Route::get('/', 'index')->name('quiz.index');

    //クイズのページ
    Route::get('/quiz/{questionId}', 'show')->name('quiz.show');

    //クイズを作成
    Route::get('/create', 'create')->name('quiz.create');

    //クイズの保存
    Route::post('/quiz/store', 'store')->name('quiz.store');

    //解答
    Route::post('/answer', 'answer')->name('quiz.answer');
});

Route::controller(ProfileController::class)->group(function(){
    //プロフィールの編集ページ
    Route::get('/profile/{user}/edit', 'edit')->name('profile.edit');

    //プロフィールの更新
    Route::get('/profile/{user}', 'update')->name('profile.update');
});

Route::controller(AdminController::class)->group(function(){
    //問題一覧
    Route::get('/admin/index', 'index')->name('admin.index');

    //問題の編集ページ
    Route::get('/admin/{id}/edit', 'edit')->name('admin.edit');

    //問題の更新
    Route::put('/admin/{question}/update', 'update')->name('admin.update');

    //問題の削除
    Route::delete('/admin/delete/{question}', 'delete')->name('admin.delete');
});