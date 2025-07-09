<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DisplacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('displacement')->insert([
            ['engine_displecement' => '0.8L'],
            ['engine_displecement' => '1.0L'],
            ['engine_displecement' => '1.3L'],
            ['engine_displecement' => '1.6L'],
            ['engine_displecement' => '2.0L'],
            ['engine_displecement' => '2.5L'],
            ['engine_displecement' => '3.0L'],
            ['engine_displecement' => '3.5L'],
            ['engine_displecement' => '4.0L'],
            ['engine_displecement' => '4.5L'],
            ['engine_displecement' => '5.0L'],
        ]); 
    }
}
