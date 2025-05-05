<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class MaximunSpeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maximun_speed')->insert([
            ['speed' => '90 km/h'],
            ['speed' => '100 km/h'],        
            ['speed' => '120 km/h'],
            ['speed' => '150 km/h'],
            ['speed' => '180 km/h'],
            ['speed' => '200 km/h'],
            ['speed' => '220 km/h'],
            ['speed' => '240 km/h'],
            ['speed' => '260 km/h'],
            ['speed' => '280 km/h'],
            ['speed' => '300 km/h'],
        ]);
    }
}
