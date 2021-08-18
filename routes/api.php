<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login']);

//Route::middleware('auth:api')->group( function () {
//    Route::resource('tasks', TaskController::class);
//});

Route::middleware('auth:api')->get('/tasks', [TaskController::class, 'index'])->name('task.index');
Route::middleware('auth:api')->prefix('/tasks')->group( function () {
    Route::post('/store', [TaskController::class, 'store'])->name('task.store');
    Route::put('/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});
