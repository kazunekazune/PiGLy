<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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
    return redirect('/weight_logs');
});

// 認証ルート
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// 認証後のメイン画面
Route::middleware(['auth'])->group(function () {
    // 体重管理画面（トップページ）
    Route::get('/weight_logs', [App\Http\Controllers\WeightLogController::class, 'index'])->name('weight_logs.index');

    // 体重登録
    Route::get('/weight_logs/create', [App\Http\Controllers\WeightLogController::class, 'create'])->name('weight_logs.create');
    Route::post('/weight_logs/create', [App\Http\Controllers\WeightLogController::class, 'store'])->name('weight_logs.store');

    // 体重検索
    Route::get('/weight_logs/search', [App\Http\Controllers\WeightLogController::class, 'search'])->name('weight_logs.search');

    // 目標設定（本来のコントローラに戻す）
    Route::get('/weight_logs/goal_setting', [App\Http\Controllers\WeightTargetController::class, 'edit'])->name('weight_targets.edit');
    Route::post('/weight_logs/goal_setting', [App\Http\Controllers\WeightTargetController::class, 'update'])->name('weight_targets.update');

    // 体重詳細
    Route::get('/weight_logs/{weightLogId}', [App\Http\Controllers\WeightLogController::class, 'show'])->name('weight_logs.show');
    // 体重更新
    Route::get('/weight_logs/{weightLogId}/update', [App\Http\Controllers\WeightLogController::class, 'edit'])->name('weight_logs.edit');
    Route::post('/weight_logs/{weightLogId}/update', [App\Http\Controllers\WeightLogController::class, 'update'])->name('weight_logs.update');
    // 体重削除
    Route::post('/weight_logs/{weightLogId}/delete', [App\Http\Controllers\WeightLogController::class, 'destroy'])->name('weight_logs.destroy');
});

// 会員登録（2段階）
Route::get('/register/step1', [App\Http\Controllers\Auth\RegisterController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [App\Http\Controllers\Auth\RegisterController::class, 'storeStep1'])->name('register.store.step1');
Route::get('/register/step2', [App\Http\Controllers\Auth\RegisterController::class, 'showStep2'])->name('register.step2');
Route::post('/register/step2', [App\Http\Controllers\Auth\RegisterController::class, 'storeStep2'])->name('register.store.step2');
