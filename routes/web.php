<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
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

Route::get('/', [CarController::class, 'index'] );
// редакция машины
Route::get('/car/edit/{id}', [CarController::class, 'edit']);
Route::post('car/edit/{id}', [CarController::class, 'edit_res']);
// добавление цвета
Route::post('/car/add_color', [CarController::class, 'add_color']);

Route::get('/client', [ClientController::class, 'index']);
