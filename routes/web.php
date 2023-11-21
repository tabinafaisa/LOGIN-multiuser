<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;

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
});

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'auth']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/vote', [SiswaController::class, 'vote']);
Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/store', [AdminController::class, 'store']);
    Route::delete('/delete/{id}', [AdminController::class, 'delete']);
    Route::get('/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/update', [AdminController::class, 'update']);
});
