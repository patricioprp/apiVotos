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
            'name' => 'User Test',
            'email' => 'test@test.com',
            'type' => 'admin',
            'dni' => 12345678,
            'password' => bcrypt(12345678),
            'mesa_id' => 1,
        ]);
    }
}
