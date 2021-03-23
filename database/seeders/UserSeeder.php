<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@admin.admin',
            'password' => '$2y$10$y0pkyP7oIEb8DX6LGOOMp.LNOTT50ceU4bUwm8ToAznvK1X0wT8Cq'
        ]);
    }
}
