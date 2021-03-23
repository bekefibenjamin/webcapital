<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteStudentTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_student(){
        $student = Student::find(1);

        $student->delete();

        $this->assertDeleted($student);
    }
}
