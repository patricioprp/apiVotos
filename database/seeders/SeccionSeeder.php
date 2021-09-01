<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i < 18; $i++){
            DB::table('seccions')->insert([
                'nombre' => 'Seccion '.$i,
                'created_at'=>'2021-08-29 00:42:08',
                'updated_at'=> '2021-08-29 00:42:08',
            ]);
        }
    }
}
