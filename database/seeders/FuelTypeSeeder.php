<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fuel_type')->insert([
            ['type' => 'Gasolina'],
            ['type' => 'Diésel'],
            ['type' => 'Eléctrico'],
            ['type' => 'GLP (Gas Licuado de Petróleo'],
            ['type' => 'Biodisel'],
            ['type' => 'GNC (Gas Natural Comprimido)'],
            ['type' => 'GNL (Gas Natural Licuado)'],          
        ]);
    }
}
