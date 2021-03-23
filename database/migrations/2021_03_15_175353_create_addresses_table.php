<?php

use Database\Seeders\AddressSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->string('street_name',250);
            $table->string('street_number',250);
            $table->smallInteger('zip');
            $table->string('city',250);
            $table->tinyInteger('siblings_num');
            $table->timestamps();

            $table ->foreign('student_id') //A student_id foreign key, és ha a student táblából kitöröljük a record-ot, akkor a hozzá tartozó címet is töröljük.
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
        });

        $seeder = new AddressSeeder();
        $seeder->run();
    }
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
