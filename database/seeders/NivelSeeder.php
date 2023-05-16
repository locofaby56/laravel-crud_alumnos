<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=NivelSeeder
     * @return void
     */
    public function run()
    {
        $niveles=['PRIMERO','SEGUNDO','TERCERO','CUARTO','QUINTO','SEXTO'];

        foreach ($niveles as $nivel) {
            DB::table('niveles')->insert([
                'nombre' => $nivel
            ]);
        }
    }
}
