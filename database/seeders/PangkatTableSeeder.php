<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PangkatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pangkat = [
            ['pangkat_id' => '11', 'gol_ruang' => 'I/a', 'uraian' => 'Juru Muda'],
            ['pangkat_id' => '12', 'gol_ruang' => 'I/b', 'uraian' => 'Juru Muda Tingkat I'],
            ['pangkat_id' => '13', 'gol_ruang' => 'I/c', 'uraian' => 'Juru'],
            ['pangkat_id' => '14', 'gol_ruang' => 'I/d', 'uraian' => 'Juru Tingkat I'],
            ['pangkat_id' => '21', 'gol_ruang' => 'II/a', 'uraian' => 'Pengatur Muda'],
            ['pangkat_id' => '22', 'gol_ruang' => 'II/b', 'uraian' => 'Pengatur Muda Tingkat I'],
            ['pangkat_id' => '23', 'gol_ruang' => 'II/c', 'uraian' => 'Pengatur '],
            ['pangkat_id' => '24', 'gol_ruang' => 'II/d', 'uraian' => 'Pengatur Tingkat I'],
            ['pangkat_id' => '31', 'gol_ruang' => 'III/a', 'uraian' => 'Penata Muda'],
            ['pangkat_id' => '32', 'gol_ruang' => 'III/b', 'uraian' => 'Penata Muda Tingkat I'],
            ['pangkat_id' => '33', 'gol_ruang' => 'III/c', 'uraian' => 'Penata'],
            ['pangkat_id' => '34', 'gol_ruang' => 'III/d', 'uraian' => 'Penata Tingkat I'],
            ['pangkat_id' => '41', 'gol_ruang' => 'IV/a', 'uraian' => 'Pembina'],
            ['pangkat_id' => '42', 'gol_ruang' => 'IV/b', 'uraian' => 'Pembina Tingkat I'],
            ['pangkat_id' => '43', 'gol_ruang' => 'IV/c', 'uraian' => 'Pembina Utama Muda'],
            ['pangkat_id' => '44', 'gol_ruang' => 'IV/d', 'uraian' => 'Pembina Utama Madya'],
            ['pangkat_id' => '45', 'gol_ruang' => 'IV/e', 'uraian' => 'Pembina Utama'],
        ];

        DB::table('master_pangkat')->insert($pangkat);        //
    }
}
