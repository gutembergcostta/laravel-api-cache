<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Services\CourseService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateCourse;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService){
        $this->courseService = $courseService;
    }

    public function index()
    {
        $coursers = $this->courseService->getCourses();

        return CourseResource::collection($coursers);
    }


    public function store(StoreUpdateCourse $request)
    {
        $course = $this->courseService->createNewCourse($request->validated());

        return new CourseResource($course);
    }


    public function show($id)
    {
        //
    }

    public function update(StoreUpdateCourse $request, $id)
    {
        $course = $this->courseService->updateCourse($id, $request->validated());

        return response()->json(['message' => 'updated']);
    }


    public function destroy($id)
    {
        $course = $this->courseService->deleteCourse($id);

        return response()->json([
            'message' => 'Course deleted successfully'
        ], 204);
    }
}
