<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\DeleteController;
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

Route::get('/', [ReadController::class, 'showTable']);
Route::get('/create', [CreateController::class, 'index']);
Route::post('/create-action', [CreateController::class, 'action'])->name('create-action');
Route::get('/update/{id}', [UpdateController::class, 'index']);
Route::put('/update-action/{id}', [UpdateController::class, 'action'])->name('update-action');
Route::delete('/delete/{id}', [DeleteController::class, 'delete']);