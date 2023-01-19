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


use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->group(function() {
    Route::get('admin/news/create', 'add')->middleware('auth');
});


#PHP/Laravel 09 Routingについて理解する
#3.「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
#    Route::controller(AAAController::class)->group(function()
#
#{
#    Route::get('XXX', 'bbb');
#    
#});


#4.【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の add Action に、admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください
use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->group(function() {
    Route::get('admin/profile/create', 'add')->middleware('auth');
    Route::get('admin/profile/edit', 'edit')->middleware('auth');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
