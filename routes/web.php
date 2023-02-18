<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ParkController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\ServiseController;
use App\Http\Controllers\WorkerController;
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
//
Route::post('/car/sort_model', [CarController::class, 'sort_model']);


// добавление цвета
Route::post('/car/add_color', [CarController::class, 'add_color']);
// добавление бренда
Route::post('/car/add_brand', [CarController::class, 'add_brand']);
// добавление модели
Route::post('/car/add_model', [CarController::class, 'add_model']);

// клиент
Route::get('/client', [ClientController::class, 'index']);
// редактировать
Route::get('/client/edit/{id}', [ClientController::class, 'edit']);
Route::post('/client/edit/{id}', [ClientController::class, 'edit_res']);

// добавить клиента
Route::post('/client/create', [ClientController::class, 'create']);

// ремонт
//Route::get('/repair', [RepairController::class, 'index']);
// заявки
Route::get('/repair/create/{id}', [RepairController::class, 'create']);
Route::post('/repair/create/{id}', [RepairController::class, 'create_res']);
// выдача справки
Route::post('/repair/reception/{id}', [RepairController::class, 'reception']);
Route::post('/repair/reception_return/{id}', [RepairController::class, 'reception_return']);

// работники
Route::get('/worker', [WorkerController::class, 'index']);
// редактировать
Route::get('/worker/edit/{id}', [WorkerController::class, 'edit']);
Route::post('/worker/edit/{id}', [WorkerController::class, 'edit_res']);
// удаление
Route::get('/worker/delete/{id}', [WorkerController::class, 'delete']);
// добавление
Route::get('/worker/create', [WorkerController::class, 'create']);
Route::post('/worker/create', [WorkerController::class, 'create_res']);

// запчасти
Route::get('/park', [ParkController::class, 'index']);
// добавить
Route::get('/park/create', [ParkController::class, 'create']);
Route::post('park/create', [ParkController::class, 'create_res']);
// изменить
Route::get('/park/edit/{id}', [ParkController::class, 'edit']);
Route::post('/park/edit/{id}', [ParkController::class, 'edit_res']);

// услуги
Route::get('/service', [ServiseController::class, 'index']);
Route::post('/service/create', [ServiseController::class, 'create']);
Route::post('/service/sort', [ServiseController::class, 'sort']);

// заявка
Route::get('/application', [ApplicationController::class, 'index']);
// добавление
Route::get('/application/create', [ApplicationController::class, 'create']);
Route::post('/application/create', [ApplicationController::class, 'create_res']);
