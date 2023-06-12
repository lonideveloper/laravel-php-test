<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::middleware('auth:sanctum')->group(function () {

Route::post('/store-company', [CompanyController::class, 'store']);
Route::get('/view-company', [CompanyController::class, 'index']);
Route::get('/edit-company/{id}', [CompanyController::class, 'edit']);
Route::post('/update-company/{id}', [CompanyController::class, 'update']);
Route::delete('/delete-company/{id}', [CompanyController::class, 'destroy']);
Route::get('/view-employee', [EmployeeController::class, 'index']);
Route::post('/store-employee', [EmployeeController::class, 'store']);
Route::get('/edit-employee/{lastName}', [EmployeeController::class, 'edit']);
Route::post('/update-employee/{id}', [EmployeeController::class, 'update']);
Route::delete('/delete-employee/{id}', [EmployeeController::class, 'destroy']);
    
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
