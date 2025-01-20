<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;

class CourseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_courses()
    {
        $response = $this->getJson('/courses');

        $response->assertStatus(200);
    }

    public function test_get_count_courses(){
        Course::factory()->count(10)->create();

        $response = $this->getJson('/courses');

        $response->assertJsonCount(10, 'data');
        $response->assertStatus(200);
    }

    public function test_get_not_found_courses(){
        $response = $this->getJson('/course/fake_value');

        $response->assertStatus(404);
    }

    public function test_get_course(){
        $course = Course::factory()->create();

        $response = $this->getJson('/course/'.$course->uuid);

        $response->assertStatus(200);
    }

    public function test_validations_create_course(){
        $response = $this->postJson('/courses', [
            'name' => 'Novo Curso',
            'description' => 'Descricao do Novo Curso'
        ]);

        $response->assertStatus(201);
    }

    public function test_validations_update_course(){
        $course   = Course::factory()->create();

        $response = $this->putJson("/course/{$course->uuid}", []);


        $response->assertStatus(422);
    }

    public function test_update_course(){
        $course   = Course::factory()->create();

        $response = $this->putJson("/course/{$course->uuid}", [
            'name' => 'Novo Curso 2',
            'description' => 'Descricao do Novo Curso 2'
        ]);


        $response->assertStatus(200);
    }
}
