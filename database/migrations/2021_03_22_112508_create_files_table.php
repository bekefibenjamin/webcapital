<?php

use Database\Seeders\FileSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('student_id');
            $table->string('sign',250)->nullable();
            $table->timestamps();

            $table ->foreign('student_id') //A student_id foreign key, és ha a student táblából kitöröljük a record-ot, akkor a hozzá tartozó file-okat is töröljük.
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
        });

        $seeder = new FileSeeder();
        $seeder->run();
    }

    public function down()
    {
        Schema::dropIfExists('files');
    }
}
