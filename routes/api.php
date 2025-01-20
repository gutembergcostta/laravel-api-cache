<?php

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController,
    LessonController
};

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        'message' => 'Hello World'
    ]);
});

Route::apiResource('/courses/{course}/modules', ModuleController::class);

Route::apiResource('/modules/{module}/lessons', LessonController::class);


Route::put('/course/{course}', [CourseController::class, 'update']);
Route::delete('/courses/{course}', [CourseController::class, 'destroy']);
Route::get('/course/{course}', [CourseController::class, 'show']);
Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses', [CourseController::class, 'index']);







