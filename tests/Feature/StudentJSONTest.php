<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class StudentJSONTest extends TestCase
{
    use WithoutMiddleware;

    public function test_student_json(){
        $this->withoutMiddleware(); // authentikáció nélkül végezzük el a tesztet

        $response = $this->json('GET', 'studentJson/1');
        $response -> assertJson(['id' => 1]);
    }
}

