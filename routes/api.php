<?php

use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\ApointmentController;
use App\Http\Controllers\AppointmentDoctorController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
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

Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('/auth/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::get('/auth/me', [AuthController::class, 'me'])
    ->middleware('auth:sanctum');

Route::get('animal-types/pre-requisite', [AnimalTypeController::class, 'preRequisite'])
    ->middleware('auth:sanctum');;

Route::resource('appointments', ApointmentController::class)
    ->middleware('auth:sanctum');

Route::resource('appointments-doctor', AppointmentDoctorController::class)
    ->middleware('auth:sanctum');

Route::get('/users/pre-requisite/medicos', [UserController::class, 'medicos'])
    ->middleware('auth:sanctum');


