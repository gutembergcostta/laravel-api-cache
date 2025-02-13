<?php
namespace App\Repositories;

use App\Models\Module;
use Illuminate\Support\Facades\Cache;

 class ModuleRepository{
    protected $entity;

    public function __construct(Module $module)
    {
        $this->entity = $module;
    }

    public function getModulesByCourse($courseId){
        return $this->entity->where('course_id', $courseId)->get();
    }


    public function getAllModules()
    {
        return $this->entity->get();
    }

    public function createNewModule(int $courseId, array $data){
        Cache::forget('courses');
        $data['course_id'] = $courseId;
        return $this->entity->create($data);
    }

    public function getModuleByCourse($courseId, $id){
        return $this->entity->where('course_id', $courseId)->where('uuid', $id)->firstOrfail();
    }

    public function updateModuleByUuid(string $id, $data){
        Cache::forget('courses');
        $data['course_id'] = $id;
        return $this->entity->where('uuid', $id)->update($data);
    }

    public function getModuleByUuid(string $id){
        $module = $this->entity->where('uuid', $id)->firstOrfail();
        return $module;
    }

    public function deleteModuleByUuid($id){
        Cache::forget('courses');
        $module = $this->getModuleByUuid($id);
        return $module->delete();
    }

    public function updateModule($id, $data){
        Cache::forget('courses');
        $data['course_id'] = $id;
        return $this->entity->where('id', $id)->update($data);
    }
 }
