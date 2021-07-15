<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\UserController;
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

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::get('games', [GameController::class, 'index']);
Route::get('games/{title}', [GameController::class, 'bytitle']);

Route::middleware('auth:api')->group(function(){
    
    Route::resource('users', UserController::class);

    Route::post('games', [GameController::class, 'store']);
    Route::put('games', [GameController::class, 'update']);
    Route::get('games/{id}', [GameController::class, 'show']);
    Route::delete('games', [GameController::class, 'destroy']);
    
});

