<?php
namespace App\Repositories;

use App\Models\Lesson;

 class LessonRepository{
    protected $entity;

    public function __construct(Lesson $lesson)
    {
        $this->entity = $lesson;
    }

    public function getLessonsByModule(int $module){
        return $this->entity->where('module_id', $module)->get();
    }

    public function getAllLessons()
    {
        return $this->entity->get();
    }

    public function createNewLesson(int $module_id, array $data){
        $data['module_id'] = $module_id;
        return $this->entity->create($data);
    }

    public function getLessonByModule(int $module_id, $id){
        return $this->entity->where('module_id', $module_id)->where('uuid', $id)->firstOrfail();
    }

    public function updateLessonByUuid(string $id, string $identify, array $data){
        $lesson = $this->getLessonByUuid($identify);

        $data['module_id'] = $id;

        return $lesson->update($data);
    }

    public function getLessonByUuid($id){
        return $this->entity->where('uuid', $id)->firstOrfail();
    }

    public function deleteLessonByUuid($id){
        return $this->entity->where('uuid', $id)->delete();
    }

    public function updateLesson($id, $data){
        $data['module_id'] = $id;
        return $this->entity->where('uuid', $id)->update($data);
    }
 }
