<?php

namespace App\Services;

use App\Repositories\{
    ModuleRepository,
    LessonRepository
};


class LessonService
{
    protected $lessonRepository, $moduleRepository;

    public function __construct(LessonRepository $lessonRepository, ModuleRepository $moduleRepository)
    {
        $this->lessonRepository = $lessonRepository;
        $this->moduleRepository = $moduleRepository;
    }

    public function getLessonsByModule(string $module){

        $module = $this->moduleRepository->getModuleByUuid($module);

        return $this->lessonRepository->getLessonsByModule($module->id);
    }

    public function createNewLesson(array $data){
        $module = $this->moduleRepository->getModuleByUuid($data['module']);
        return $this->lessonRepository->createNewLesson($module->id,$data);
    }

    public function getLessonByModule(string $module, string $id){
        $module = $this->moduleRepository->getModuleByUuid($module);

        return $this->lessonRepository->getLessonByModule($module, $id);
    }

    public function updateLesson(string $id, array $data){
        $module = $this->moduleRepository->getModuleByUuid($data['module']);

        return $this->lessonRepository->updateLessonByUuid($module->id, $id, $data);
    }

    public function deleteLesson(string $id){
        return $this->lessonRepository->deleteLessonByUuid($id);
    }
}
