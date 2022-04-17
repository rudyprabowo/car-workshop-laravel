<?php

use App\Http\Controllers\ListServiceController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/listservices', [ListServiceController::class, 'index']); 

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [\App\Http\Controllers\AuthController::class, 'profile']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
});

Route::group(
    [
        // 'middleware' => 'api',
        'middleware' => 'auth:sanctum',
        'namespace' => 'App\Http\Controllers',
    ],
    function ($router) {
        Route::resource('listservice', 'ListServiceController');
    }
);

Route::group(
    [
        // 'middleware' => 'api',
        'middleware' => 'auth:sanctum',
        'namespace' => 'App\Http\Controllers',
    ],
    function ($router) {
        Route::resource('listcustomer', 'UserController');
    }
);

Route::group(
    [
        // 'middleware' => 'api',
        'middleware' => 'auth:sanctum',
        'namespace' => 'App\Http\Controllers',
    ],
    function ($router) {
        Route::resource('services', 'ServiceController');
        // Route::resource('showservice2', 'ServiceController@show');
    }
);