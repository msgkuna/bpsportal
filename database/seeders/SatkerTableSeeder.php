<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satker = [
            ['satker_id' => '62000', 'uraian' => 'BPS Provinsi Kalimantan Tengah', 'eselon' => '2'],
            ['satker_id' => '62510', 'uraian' => 'Bagian Umum', 'eselon' => '3'],
            ['satker_id' => '62010', 'uraian' => 'BPS Kabupaten Kotawaringin Barat', 'eselon' => '3'],
            ['satker_id' => '62011', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62020', 'uraian' => 'BPS Kabupaten Kotawaringin Timur', 'eselon' => '3'],
            ['satker_id' => '62021', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62030', 'uraian' => 'BPS Kabupaten Kapuas', 'eselon' => '3'],
            ['satker_id' => '62031', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62040', 'uraian' => 'BPS Kabupaten Barito Selatan', 'eselon' => '3'],
            ['satker_id' => '62041', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62050', 'uraian' => 'BPS Kabupaten Barito Utara', 'eselon' => '3'],
            ['satker_id' => '62051', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62060', 'uraian' => 'BPS Kabupaten Sukamara', 'eselon' => '3'],
            ['satker_id' => '62061', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62070', 'uraian' => 'BPS Kabupaten Lamandau', 'eselon' => '3'],
            ['satker_id' => '62071', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62080', 'uraian' => 'BPS Kabupaten Seruyan', 'eselon' => '3'],
            ['satker_id' => '62081', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62090', 'uraian' => 'BPS Kabupaten Katingan', 'eselon' => '3'],
            ['satker_id' => '62091', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62100', 'uraian' => 'BPS Kabupaten Pulang Pisau', 'eselon' => '3'],
            ['satker_id' => '62101', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62110', 'uraian' => 'BPS Kabupaten Gunung Mas', 'eselon' => '3'],
            ['satker_id' => '62111', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62120', 'uraian' => 'BPS Kabupaten Barito Timur', 'eselon' => '3'],
            ['satker_id' => '62121', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62130', 'uraian' => 'BPS Kabupaten Murung Raya', 'eselon' => '3'],
            ['satker_id' => '62131', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
            ['satker_id' => '62710', 'uraian' => 'BPS Kota Palangka Raya', 'eselon' => '3'],
            ['satker_id' => '62711', 'uraian' => 'Subbagian Umum', 'eselon' => '4'],
        ];

        DB::table('master_satker')->insert($satker);        //
    }
}
