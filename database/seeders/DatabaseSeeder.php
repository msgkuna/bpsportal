<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AgamaTableSeeder::class);
        $this->call(DidikTableSeeder::class);
        $this->call(JabatanTableSeeder::class);
        $this->call(KawinTableSeeder::class);
        $this->call(PangkatTableSeeder::class);
        $this->call(SatkerTableSeeder::class);
    }
}
