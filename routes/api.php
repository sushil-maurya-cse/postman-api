<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\VeiwersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register',[AuthController::class,'register']);


// Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('viewers/add', [ VeiwersController::class, 'store']);
    Route::get('viewers', [ VeiwersController::class, 'index']);
    Route::get('viewers/{id}/show', [ VeiwersController::class, 'show']);
    // Route::put('viewers/{id}/update', [ VeiwersController::class, 'update']);
    Route::post('viewers/{id}/update', [ VeiwersController::class, 'update']);
    Route::get('viewers/{id}/delete', [ VeiwersController::class, 'delete']);
// });



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


