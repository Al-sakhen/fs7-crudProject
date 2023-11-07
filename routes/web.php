<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // view() => helper function to return a view that located in "resources/views"
})->name('home');

// =============== before resource route ===============
Route::controller(PostController::class)->prefix('posts')->name('posts.')->middleware('testMiddleware')->group(function () {
    Route::get('/', 'index')->name('index'); 
    Route::get('/create',  'create')->name('create'); 
    Route::post('/store',  'store')->name('store');
    Route::delete('/delete/{id}',  'destroy')->name('destroy');
    Route::get('/edit/{id}',  'edit')->name('edit');
    Route::put('/update/{id}',  'update')->name('update');
});

// =============== after resource route ===============
// Route::resource('posts', PostController::class)->middleware('testMiddleware');
Route::get('posts/toggle/{id}', [PostController::class, 'toggleStatus'])->name('posts.toggleStatus');


Route::resource('test', TestController::class); // 7 named routes