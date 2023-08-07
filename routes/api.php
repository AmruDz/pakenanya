<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories/post', [CategoriesController::class, 'store']);
Route::patch('/categories/{id}', [CategoriesController::class, 'update']);
Route::get('/categories/{id}', [CategoriesController::class, 'destroy']);

Route::get('/products', [ProductsController::class, 'index']);
Route::post('/products/post', [ProductsController::class, 'store']);
