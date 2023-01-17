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


Route::controller(NewsController::class)->group(function() {
    Route::get('admin/news/create', 'add');
});


#PHP/Laravel 09 Routingについて理解する
#「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
#    Route::controller(AAAController::class)->group(function()
#
#{
#    Route::get('XXX', 'bbb');
#    
#});

Route::controller(ProfileController::class)->prefix('admin')->group(function() {
    Route::get('admin/profile/create', 'add');
    Route::get('admin/profile/edit', 'edit');

});