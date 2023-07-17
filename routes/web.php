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

Route::controller(QuizController::class)->group(function(){
    //トップページ
    Route::get('/','index')->name('quiz.index');

    //クイズのページ
    Route::get('/quiz/{questionId}','show')->name('quiz.show');

    //クイズを作成
    Route::get('/create','create')->name('quiz.create');

    //クイズの保存
    Route::post('/quiz/store','store')->name('quiz.store');

    //解答
    Route::get('/answer','answer')->name('quiz.answer');
});
