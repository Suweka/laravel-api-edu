<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Public authentication routes
Route::post('register', [AuthController::class, 'register']); // Route for user registration
Route::post('login', [AuthController::class, 'login']);       // Route for user login

// Route to fetch the authenticated user's data
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API v1 routes
Route::group([
    'prefix' => 'v1',
], function () {
    // Publicly accessible routes
    Route::apiResource('students', \App\Http\Controllers\Api\V1\StudentController::class)->only(['index', 'show']);
    Route::apiResource('courses', \App\Http\Controllers\Api\V1\CourseController::class)->only(['index', 'show']);
    Route::apiResource('enrollments', \App\Http\Controllers\Api\V1\EnrollmentController::class)->only(['index', 'show']);

    // Protected routes for admin only
    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::post('/students', [\App\Http\Controllers\Api\V1\StudentController::class, 'store']);
        Route::put('/students/{id}', [\App\Http\Controllers\Api\V1\StudentController::class, 'update']);
        Route::delete('/students/{id}', [\App\Http\Controllers\Api\V1\StudentController::class, 'destroy']);

        Route::post('/courses', [\App\Http\Controllers\Api\V1\CourseController::class, 'store']);
        Route::put('/courses/{id}', [\App\Http\Controllers\Api\V1\CourseController::class, 'update']);
        Route::delete('/courses/{id}', [\App\Http\Controllers\Api\V1\CourseController::class, 'destroy']);

        Route::post('/enrollments/bulk', [\App\Http\Controllers\Api\V1\EnrollmentController::class, 'bulkStore']);
    });
});
