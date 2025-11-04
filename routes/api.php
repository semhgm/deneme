<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AuthorBookController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TaskController;
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

Route::post('/products', [ProductController::class,'store']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);

Route::get('/authors/{author}/books', [AuthorBookController::class, 'index']);
Route::get('/calculate-price', [PriceController::class, 'show']);




