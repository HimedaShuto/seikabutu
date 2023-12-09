<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CircleController;

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

Route::get('/', [CircleController::class, 'index']);

Route::get('/circles/create', [CircleController::class , 'create']);

Route::get('/circles/{circle}', [CircleController::class ,'show']);
// '/circles/{対象データのID}'にGetリクエストが来たら、CircleControllerのshowメソッドを実行する

Route::post('/circles', [CircleController::class, 'store']);

Route::get('/circles/{circle}/edit', [CircleController::class, 'edit']);

Route::put('/circles/{circle}', [CircleController::class, 'update']);

Route::delete('/circles/{circle}', [CircleController::class, 'delete']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

