<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KawinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kawin = [
            ['kawin_id' => '1', 'uraian' => 'Belum kawin'],
            ['kawin_id' => '2', 'uraian' => 'Kawin'],
            ['kawin_id' => '3', 'uraian' => 'Cerai hidup'],
            ['kawin_id' => '4', 'uraian' => 'Cerai mati'],
        ];

        DB::table('master_kawin')->insert($kawin);        //
    }
}
