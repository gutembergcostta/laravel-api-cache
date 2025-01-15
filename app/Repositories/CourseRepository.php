<?php
namespace App\Repositories;

use App\Models\Course;

 class CourseRepository{
    protected $entity;

    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return $this->entity->get();
    }

    public function createNewCourse($data){
        return $this->entity->create($data);
    }

    public function deleteCourseByUuid($id){
        return $this->entity->where('uuid', $id)->delete();
    }

    public function updateCourse($id, $data){
        return $this->entity->where('uuid', $id)->update($data);
    }

    public function getCourseByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrfail();
    }
 }
