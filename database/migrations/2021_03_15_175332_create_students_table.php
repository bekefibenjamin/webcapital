<?php

use Database\Seeders\StudentSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('first_name',250);
            $table->string('last_name',250);
            $table->string('group',250);
            $table->tinyInteger('age');
            $table->timestamps();
        });

        $seeder = new StudentSeeder();
        $seeder->run();
    }
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
