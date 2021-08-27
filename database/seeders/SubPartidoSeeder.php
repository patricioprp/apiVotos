<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubPartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_partidos')->insert([
            'nombre' => 'Lealtad Peronista',
            'partido_id' => 1,
        ]);
        DB::table('sub_partidos')->insert([
            'nombre' => 'Peronismo Verdadero',
            'partido_id' => 1,
        ]);
       
        DB::table('sub_partidos')->insert([
            'nombre' => 'Juntos para Construir',
            'partido_id' => 2,
        ]);
        DB::table('sub_partidos')->insert([
            'nombre' => 'Cambia Tucuman',
            'partido_id' => 2,
        ]);
        DB::table('sub_partidos')->insert([
            'nombre' => 'Cambiemos',
            'partido_id' => 2,
        ]);

        DB::table('sub_partidos')->insert([
            'nombre' => 'Fuerza Republicana',
            'partido_id' => 3,
        ]);
    }
}
