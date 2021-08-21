<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partidos')->insert([
            'nombre' => 'Partido Justicialista',
        ]);
        DB::table('partidos')->insert([
            'nombre' => 'Juntos por el Cambio',
        ]);
        DB::table('partidos')->insert([
            'nombre' => 'Fuerza Republicana',
        ]);
    }
}
