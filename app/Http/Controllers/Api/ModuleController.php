<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ModuleResource;
use App\Http\Requests\StoreUpdateModule;
use App\Services\ModuleService;

class ModuleController extends Controller
{
    protected $moduleService;

    public function __construct(ModuleService $moduleService){
        $this->moduleService = $moduleService;
    }

    public function index(string $course)
    {

        $modules = $this->moduleService->getModulesByCourse($course);

        return ModuleResource::collection($modules);
    }


    public function store(StoreUpdateModule $request, $course)
    {
        $module = $this->moduleService->createNewModule($request->validated());

        return new ModuleResource($module);
    }


    public function show($course, $id)
    {
        $module = $this->moduleService->getModuleByCourse($course, $id);

        return new ModuleResource($module);
    }

    public function update(StoreUpdateModule $request, $course, $id)
    {
        $module = $this->moduleService->updateModule($id, $request->validated());

        return response()->json(['message' => 'updated']);
    }


    public function destroy($course, $id)
    {
        $module = $this->moduleService->deleteModule($id);

        return response()->json([], 204);
    }
}
