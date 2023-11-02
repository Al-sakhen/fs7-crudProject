<?php

use App\Http\Controllers\PostController;
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

Route::get('posts' , [PostController::class ,'index'] );
Route::get('posts/create' , [PostController::class ,'create'] );
Route::post('posts/store' , [PostController::class ,'store'] );
Route::delete('posts/delete/{id}' , [PostController::class ,'destroy'] );
Route::get('posts/edit/{id}' , [PostController::class ,'edit'] );
Route::put('posts/update/{id}' , [PostController::class ,'update'] );

Route::get('posts/toggle/{id}' , [PostController::class ,'toggleStatus'] );


