<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PropertyController;
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

// Property Routes
// Get all properties
Route::get('/properties', [PropertyController::class, 'index']);
// Get a single property
Route::get('/properties/{property}', [PropertyController::class, 'show']);
// Create a property
Route::post('/property', [PropertyController::class, 'store'])->middleware('auth:sanctum', 'is_admin');
// Update a property
Route::put('/properties/{property}', [PropertyController::class, 'update'])->middleware('auth:sanctum', 'is_admin');
// Delete a property
Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->middleware('auth:sanctum', 'is_admin');
// Upload a picture
Route::post('/picture', [PropertyController::class, 'uploadImage'])->middleware('auth:sanctum', 'is_admin');

// Order Routes
//Get all orders
Route::get('/orders', [OrderController::class, 'index'])->middleware('auth:sanctum', 'is_admin');
// Get a user orders
Route::get('/order', [OrderController::class, 'show'])->middleware('auth:sanctum');
// Create an order
Route::post('/orders', [OrderController::class, 'store'])->middleware('auth:sanctum');
// Update an order
Route::put('/orders/{order}', [OrderController::class, 'update'])->middleware('auth:sanctum', 'is_admin');
// Delete an order
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->middleware('auth:sanctum', 'is_admin');


// Auth Routes
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');;
    // Get authenticated user
    Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');
    // Update authenticated user
    Route::put('/user', [AuthController::class, 'update'])->middleware('auth:sanctum');

    // Admin methods
    // Get All users method for Admin
    Route::get('/users', [AuthController::class, 'allUsers'])->middleware('auth:sanctum', 'is_admin');;
    // Update User method for Admin
    Route::put('/users/{user}', [AuthController::class, 'adminUpdateUser'])->middleware('auth:sanctum', 'is_admin');
    // Delete User method for Admin
    Route::delete('/users/{user}', [AuthController::class, 'destroy'])->middleware('auth:sanctum', 'is_admin');
});
