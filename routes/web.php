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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/game/{id}', [App\Http\Controllers\GameController::class, 'game'])->name('game');
Route::get('/category/{id}', [App\Http\Controllers\GameController::class, 'category'])->name('category');
Route::get('/order/buy/{id}', [App\Http\Controllers\OrderController::class, 'buy'])->name('buy');
Route::get('/order/current', [App\Http\Controllers\OrderController::class, 'current'])->name('order.current');
Route::get('/order/process', [App\Http\Controllers\OrderController::class, 'process'])->name('order.process');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {
    Route::get('categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('admin.categories');
    Route::get('games', [App\Http\Controllers\AdminController::class, 'games'])->name('admin.games');
    Route::get('orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('admin.orders');
});

Route::group(['prefix' => 'admin/categories', 'middleware' => ['auth','admin']], function() {
    Route::get('create', [App\Http\Controllers\AdminController::class, 'category_create'])->name('categories.create');
    Route::get('edit/{id}', [App\Http\Controllers\AdminController::class, 'category_edit'])->name('categories.edit');
    Route::post('add', [App\Http\Controllers\AdminController::class, 'category_add'])->name('categories.add');
    Route::post('save/{id}', [App\Http\Controllers\AdminController::class, 'category_save'])->name('categories.save');
    Route::get('delete/{id}', [App\Http\Controllers\AdminController::class, 'category_delete'])->name('categories.delete');
});

Route::group(['prefix' => 'admin/games', 'middleware' => ['auth','admin']], function() {
    Route::get('create', [App\Http\Controllers\AdminController::class, 'game_create'])->name('games.create');
    Route::get('edit/{id}', [App\Http\Controllers\AdminController::class, 'game_edit'])->name('games.edit');
    Route::post('add', [App\Http\Controllers\AdminController::class, 'game_add'])->name('games.add');
    Route::post('save/{id}', [App\Http\Controllers\AdminController::class, 'game_save'])->name('games.save');
    Route::get('delete/{id}', [App\Http\Controllers\AdminController::class, 'game_delete'])->name('games.delete');
});

//Route::get('edit/{book}', 'BookController@edit')->name('books.edit');//Route::post('add', 'BookController@add')->name('books.add');
//Route::post('save/{id}', 'BookController@save')->name('books.save');
//Route::get('delete/{id}', 'BookController@delete')->name('books.delete');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
//require __DIR__.'/auth.php';

//Auth::routes();
//
//Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/good/{id}', 'GoodController@good')->name('good');
//Route::get('/category/{id}', 'GoodController@category')->name('category');
//Route::get('/order/buy/{id}', 'OrderController@buy')->name('buy');
//Route::get('/order/current', 'OrderController@current')->name('order.current');
//Route::get('/order/process', 'OrderController@process')->name('order.process');
//
//Route::group(['middleware' => \App\Http\Middleware\AdminMiddleware::class], function () {
//    Route::get('/admin/categories', 'AdminController@categories')->name('admin.categories');
//    Route::get('/admin/goods', 'AdminController@categories')->name('admin.categories');
//});


