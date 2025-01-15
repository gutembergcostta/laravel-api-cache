<?php

namespace App\Services;

use App\Repositories\{
    CourseRepository,
    ModuleRepository
};


class ModuleService
{
    protected $moduleRepository, $courseRepository;

    public function __construct(ModuleRepository $moduleRepository, CourseRepository $courseRepository)
    {
        $this->moduleRepository = $moduleRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getModulesByCourse(string $course){

        $course = $this->courseRepository->getCourseByUuid($course);

        return $this->moduleRepository->getModulesByCourse($course->id);
    }

    public function createNewModule(array $data){
        $course = $this->courseRepository->getCourseByUuid($data['course']);
        return $this->moduleRepository->createNewModule($course->id,$data);
    }

    public function getModuleByCourse(string $course, string $id){
        $course = $this->courseRepository->getCourseByUuid($course);

        return $this->moduleRepository->getModuleByCourse($course, $id);
    }

    public function updateModule(string $id, array $data){
        $course = $this->courseRepository->getCourseByUuid($data['course_id']);

        return $this->moduleRepository->updateModule($course->id, $data);
    }

    public function deleteModule(string $id){
        return $this->moduleRepository->deleteModuleByUuid($id);
    }
}
