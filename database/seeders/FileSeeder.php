<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([
            'student_id' => '1',
            'sign' => 'labda_jel.svg',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        DB::table('files')->insert([
            'student_id' => '2',
            'sign' => 'cseresznye_jel.svg',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
    }
}
