<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'student_id' => '1',
            'zip' => '7621',
            'city' => 'Pécs',
            'street_name' => 'Rákóczi út',
            'street_number' => 35,
            'siblings_num' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        DB::table('addresses')->insert([
            'student_id' => '2',
            'zip' => '7624',
            'city' => 'Pécs',
            'street_name' => 'Kodály Zoltán utca',
            'street_number' => 22,
            'siblings_num' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
    }
}
