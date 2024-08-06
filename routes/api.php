<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;

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
// Route::post('login', [UserController::class, 'login']);
// http://127.0.0.1:8000/api/register
Route::post('register', [UserController::class, 'register']);
// http://127.0.0.1:8000/api/users
Route::get('users', [UserController::class, 'index']);
// http://127.0.0.1:8000/api/users/1
Route::get('users/{id}', [UserController::class, 'show']);
// http://127.0.0.1:8000/api/users/1/password
Route::put('users/{id}/password', [UserController::class, 'updatePassword']);
// http://127.0.0.1:8000/api/users/15
Route::delete('users/{id}', [UserController::class, 'destroy']);

