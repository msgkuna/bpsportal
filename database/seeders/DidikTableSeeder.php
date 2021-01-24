<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DidikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $didik = [
            ['didik_id' => '01', 'uraian' => 'Tidak/belum tamat SD'],
            ['didik_id' => '02', 'uraian' => 'Tamat SD/MI/sederajat'],
            ['didik_id' => '03', 'uraian' => 'Tamat SLTP/MTs/sederajat'],
            ['didik_id' => '04', 'uraian' => 'Tamat SLTA/MA/sederajat'],
            ['didik_id' => '05', 'uraian' => 'Tamat SM Kejuruan'],
            ['didik_id' => '06', 'uraian' => 'Tamat Dipl I/II'],
            ['didik_id' => '07', 'uraian' => 'Tamat Dipl III/Akademi'],
            ['didik_id' => '08', 'uraian' => 'Tamat Dip IV/S1'],
            ['didik_id' => '09', 'uraian' => 'Tamat S2'],
            ['didik_id' => '10', 'uraian' => 'Tamat S3'],
        ];

        DB::table('master_didik')->insert($didik);        //
    }
}
