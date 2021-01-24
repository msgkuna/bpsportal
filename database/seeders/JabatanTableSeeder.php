<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = [
            ['jabatan_id' => '1', 'uraian' => 'Jabatan Pimpinan Tinggi'],
            ['jabatan_id' => '2', 'uraian' => 'Jabatan Administrasi'],
            ['jabatan_id' => '3', 'uraian' => 'Jabatan Fungsional'],
        ];

        DB::table('master_jabatan')->insert($jabatan);        //
    }
}
