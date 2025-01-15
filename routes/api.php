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

Route::get('/courses', [CourseController::class, 'index']);

Route::post('/courses', [CourseController::class, 'store']);

Route::delete('/courses/{course}', [CourseController::class, 'destroy']);

Route::put('/course/{id}', [CourseController::class, 'update']);
