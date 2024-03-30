<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;

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
Route::get("products",[ApiController::class,"Product"]);
Route::get("products/{id}",[ApiController::class,"Single"]);
Route::post("products",[ApiController::class,"Create"]);
Route::put("products/{id}",[ApiController::class,"Update"]);
Route::delete("products/{id}",[ApiController::class,"Delete"]);