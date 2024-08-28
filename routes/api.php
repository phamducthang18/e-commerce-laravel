<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\API\CategoryController;

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
Route::prefix('auth')->group(function (){
    Route::post('/login', LoginController::class);
    Route::post('/register', RegisterController::class);
    Route::middleware('auth:api')->post('/logout', function (Request $request) {
        $user = $request->user();
    
        // Xóa tất cả các tokens của người dùng
        $user->tokens()->delete();
    
        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
    });
});

Route::middleware('auth:api')->group(function(){
    Route::apiResource('categories', CategoryController::class);
   
});