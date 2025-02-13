<?php

namespace App\Services;
use App\Repositories\CourseRepository;

class CourseService
{
    protected $repository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;
    }

    public function getCourses()
    {
        return $this->repository->getAllCourses();
    }

    public function getCourseByUuid(string $identify)
    {
        return $this->repository->getCourseByUuid($identify);
    }

    public function createNewCourse(array $data)
    {
        return $this->repository->createNewCourse($data);
    }

    public function deleteCourse($id)
    {
        return $this->repository->deleteCourseByUuid($id);
    }

    public function updateCourse(string $id, array $data)
    {
        return $this->repository->updateCourse($id, $data);
    }
}
