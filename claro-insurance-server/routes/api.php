<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/login/{type}', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::apiResource('students', StudentController::class);
Route::apiResource('courses', CourseController::class);

Route::get('top/courses', [CourseController::class, 'top_courses']);

Route::delete('students/{student}/courses/{course}', [StudentController::class, 'delete_course']);
