<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\LessonResource;
use App\Http\Requests\StoreUpdateLesson;
use App\Services\LessonService;

class LessonController extends Controller
{
    protected $lessonService;

    public function __construct(LessonService $lessonService){
        $this->lessonService = $lessonService;
    }

    public function index(string $module)
    {

        $lessons = $this->lessonService->getLessonsByModule($module);

        return LessonResource::collection($lessons);
    }


    public function store(StoreUpdateLesson $request, $module)
    {
        $lesson = $this->lessonService->createNewLesson($request->validated());

        return new LessonResource($lesson);
    }


    public function show($module, $id)
    {
        $lesson = $this->lessonService->getLessonByModule($module, $id);

        return new LessonResource($lesson);
    }

    public function update(StoreUpdateLesson $request, $module, $id)
    {
        $lesson = $this->lessonService->updateLesson($id, $request->validated());

        return response()->json(['message' => 'updated']);
    }


    public function destroy($module, $id)
    {
        $lesson = $this->lessonService->deleteLesson($id);

        return response()->json([], 204);
    }
}
