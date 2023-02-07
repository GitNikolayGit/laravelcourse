<?php

use App\Http\Controllers\CarController;
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

Route::get('/car/edit/{id}', [CarController::class, 'edit']);
Route::post('car/edit/{id}', [CarController::class, 'edit_res']);

Route::get('/car/update', [CarController::class, 'edit']);
Route::post('car/update', [CarController::class, 'edit-res']);

Route::get('/car/sort_brand', [CarController::class, 'sort_brand']);
