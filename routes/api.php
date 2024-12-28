<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Public authentication routes
Route::post('register', [AuthController::class, 'register']); // Route for user registration
Route::post('login', [AuthController::class, 'login']);       // Route for user login

// Route to fetch the authenticated user's data
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API v1 routes with Sanctum middleware protection
Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\V1',
    'middleware' => 'auth:sanctum', // Protect all routes in this group
], function () {
    // Define API resource routes
    Route::apiResource('students', StudentController::class);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('enrollments', EnrollmentController::class);

    // Example custom route for bulk operation (optional)
    Route::post('enrollments/bulk', [EnrollmentController::class, 'bulkStore']);
});
