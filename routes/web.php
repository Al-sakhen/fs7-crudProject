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
});

// =============== before resource route ===============
// Route::get('posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
// Route::delete('posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
// Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('posts/update/{id}', [PostController::class, 'update'])->name('posts.update');

// =============== after resource route ===============
Route::resource('posts', PostController::class);
Route::get('posts/toggle/{id}', [PostController::class, 'toggleStatus'])->name('posts.toggleStatus');


Route::resource('test' , TestController::class); // 7 named routes