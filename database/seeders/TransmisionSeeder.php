<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class TransmisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transmission')->insert([
            ['transmission_type' => 'Manual'],
            ['transmission_type' => 'Automática'],
        ]);
    }
}
