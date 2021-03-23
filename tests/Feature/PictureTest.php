<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

/**
 * @method visit(string $string)
 */
class PictureTest extends TestCase
{
    use WithoutMiddleware;

    public function test_picture_upload(){
        $this->withoutMiddleware(); // authentikáció nélkül végezzük el a tesztet

        Storage::fake('public_uploads'); // Létrehozunk a teszteléshez egy fake public_uploads mappát
        $file = UploadedFile::fake()->image('sign.jpg'); // Egy fake képet használunk a feltöltéshez

        $this->json('POST',route('students.store'), array( //students.store route-ra POST-olunk az alábbi adatokkal
            'first_name' => 'Horváth',
            'last_name' => 'Péter',
            'age' =>  4,
            'group' =>  'kiscsoport',
            'sign' => $file,
            'street_name' =>  'Rákóczi út',
            'street_number' =>  35,
            'zip' =>  7621,
            'city' =>  'Pécs',
            'siblings_num' => 0,
        ));

        Storage::disk('public_uploads')->assertExists('signs/3_Horváth.jpg'); // Teszteljük, hogy sikeresen lementettük a képet
        $student = Student::find(3);
        $student->delete(); // kitöröljük a teszt miatt létrehozott record-ot.
    }
}
