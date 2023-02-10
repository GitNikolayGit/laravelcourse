<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RepairController;
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
// добавление машины
Route::post('car/create', [CarController::class, 'create']);


// добавление цвета
Route::post('/car/add_color', [CarController::class, 'add_color']);
// добавление бренда
Route::post('/car/add_brand', [CarController::class, 'add_brand']);

// клиент
Route::get('/client', [ClientController::class, 'index']);
// редактировать
Route::get('/client/edit/{id}', [ClientController::class, 'edit']);

// добавить клиента
Route::post('/client/create', [ClientController::class, 'create']);

// ремонт
Route::get('/repair', [RepairController::class, 'index']);
// заявки
Route::get('/repair/create', [RepairController::class, 'create']);
Route::post('/repair/create', [RepairController::class, 'create_res']);

// работники
Route::get('/worker', [\App\Http\Controllers\WorkerController::class, 'index']);
// редактировать
Route::get('/worker/edit/{id}', [\App\Http\Controllers\WorkerController::class, 'edit']);
Route::post('/worker/edit/{id}', [\App\Http\Controllers\WorkerController::class, 'edit_res']);
// удаление
Route::get('/worker/delete/{id}', [\App\Http\Controllers\WorkerController::class, 'delete']);
// добавление
Route::get('/worker/create', [\App\Http\Controllers\WorkerController::class, 'create']);
Route::post('/worker/create', [\App\Http\Controllers\WorkerController::class, 'create_res']);
