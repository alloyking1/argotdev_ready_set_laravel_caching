<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.all');
    Route::post('/', [PostController::class, 'store'])->name('post.store');
    Route::post('/show/{id}', [PostController::class, 'show'])->name('post.show');
    Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::post('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
});
