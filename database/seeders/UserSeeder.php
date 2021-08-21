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
            'name' => 'Patricio Polito',
            'email' => 'patricioprp06@gmail.com',
            'type' => 'admin',
            'dni' => 32460264,
            'password' => bcrypt(32460264),
            'mesa_id' => 1,
        ]);
    }
}
