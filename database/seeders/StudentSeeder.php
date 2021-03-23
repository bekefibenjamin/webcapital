<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'first_name' => 'Horváth',
            'last_name' => 'Péter',
            'group' => 'kiscsoport',
            'age' => 4,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        DB::table('students')->insert([
            'first_name' => 'Kovács',
            'last_name' => 'Julia',
            'group' => 'kiscsoport',
            'age' => 4,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
    }
}
