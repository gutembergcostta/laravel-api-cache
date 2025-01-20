<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Module;
use App\Models\Course;

class ModuleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_modules_by_course()
    {
        $course = Course::factory()->create();

        Module::factory()->count(10)->create([
            'course_id' => $course->id
        ]);

        $response = $this->getJson('/courses/'.$course->uuid.'/modules');

        $response->assertStatus(200)->assertJsonCount(10, 'data');
    }

    public function test_get_not_found_module(){
        $response = $this->getJson("/courses/faker_value/modules");

        $response->assertStatus(404);
    }

    public function test_get_module(){
        $course = Course::factory()->create();

        $module = Module::factory()->create([
            'course_id' => $course->id
        ]);


        $response = $this->getJson('/courses/'.$course->uuid.'/modules/'.$module->id);

        $response->assertStatus(200);
    }

    public function test_create_module(){
        $course = Course::factory()->create();

        $response = $this->postJson("/courses/{$course->uuid}/modules", [
            'course_id' => $course->id,
            'name' => 'Test Module'
        ]);


       $response->assertStatus(201);
    }


    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
