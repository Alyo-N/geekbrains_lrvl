<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController;

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
Route::group(['prefix'=>'admin','as' => 'admin.'], function() {
    Route::get('/',[IndexController::class, 'index']) ->name('admin');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', CategoryController::class);
});

Route::get('/news', [NewsController::class, 'index'])
->name('news.index');

Route::get('/news/{id}', [NewsController::class, 'show'])
-> where('id','\d+')
-> name('news.show');