<?php

use App\Http\Controllers\MovieController;
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

// NO NEED TO LOGIN SO THERE IS NO SENSE TO PASS THE MIDDLEWARE

Route::get('allmovies', [MovieController::class, 'index']);
Route::post('createmovie', [MovieController::class, 'create']);
Route::post('updatemovie', [MovieController::class, 'update']);
Route::post('deletemovie', [MovieController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
