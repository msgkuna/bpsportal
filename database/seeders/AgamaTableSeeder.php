<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agama = [
            ['agama_id' => '1', 'uraian' => 'Islam'],
            ['agama_id' => '2', 'uraian' => 'Protestan'],
            ['agama_id' => '3', 'uraian' => 'Katolik'],
            ['agama_id' => '4', 'uraian' => 'Hindu'],
            ['agama_id' => '5', 'uraian' => 'Budha'],
            ['agama_id' => '6', 'uraian' => 'Khonghucu'],
        ];

        DB::table('master_agama')->insert($agama);        //
    }
}
