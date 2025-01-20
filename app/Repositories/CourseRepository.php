<?php
namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\Cache;

 class CourseRepository{
    protected $entity;

    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return Cache::remember('courses', 60, function(){
            return $this->entity
                    ->with('modules.lessons')
                    ->get();
        });
    }

    public function createNewCourse($data){
        Cache::forget('courses');
        return $this->entity->create($data);
    }

    public function deleteCourseByUuid($id){
        Cache::forget('courses');
        return $this->entity->where('uuid', $id)->delete();
    }

    public function updateCourse($id, $data){
        Cache::forget('courses');
        return $this->entity->where('uuid', $id)->update($data);
    }

    public function getCourseByUuid(string $identify, bool $loadRelations = true)
    {
        $query = $this->entity->where('uuid', $identify);

        if ($loadRelations)
            $query->with('modules.lessons');

        return $query->firstOrfail();
    }
 }
