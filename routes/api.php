<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PartyUserController;
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

// Login and register endpoints
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

// Find all games or game by title
Route::get('games', [GameController::class, 'index']);
Route::get('games/title/{title}', [GameController::class, 'bytitle']);

Route::middleware('auth:api')->group(function(){

    // Logout endpoint
    Route::post('logout', [PassportAuthController::class, 'logout']);
    
    // Create, update, delete or find users enpoints 
    Route::resource('users', UserController::class);

    // Create, update, delete or find game by id enpoints
    Route::post('games', [GameController::class, 'store']);
    Route::put('games', [GameController::class, 'update']);
    Route::get('games/{id}', [GameController::class, 'show']);
    Route::delete('games', [GameController::class, 'destroy']);

    // Create, update, delete or find parties enpoints 
    Route::resource('parties', PartyController::class);
    Route::get('parties/name/{name}', [PartyController::class, 'byname']);

    // Create, update, delete or find messages enpoints 
    Route::resource('messages', MessageController::class);
    Route::get('messages/party/{party_id}', [MessageController::class, 'byparty']);

     // Create, update, delete or find party-user enpoints 
    Route::resource('partyuser', PartyUserController::class);
    Route::get('partyuser/user', [PartyUserController::class, 'byuser']);
    Route::get('partyuser/party', [PartyUserController::class, 'byparty']);
    Route::delete('partyuser/delete', [PartyUserController::class, 'destroy']);
    
});

