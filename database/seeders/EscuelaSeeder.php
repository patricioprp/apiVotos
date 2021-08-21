<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escuelas')->insert([
            'nombre' => 'ESC LICEO VOCACIONAL SARMIENTO',
            'domicilio' => 'VIRGEN DE LA MERCED 29',
            'comuna_id' => 1,
        ]);
    }
}
