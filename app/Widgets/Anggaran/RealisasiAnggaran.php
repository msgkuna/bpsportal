<?php

namespace App\Widgets\Anggaran;

use Arrilot\Widgets\AbstractWidget;
use Modules\Anggaran\Entities\Ditem;

class RealisasiAnggaran extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $anggaran = Ditem::groupBy(['kddept', 'kdunit'])
                ->selectRaw('kddept, kdunit, sum(jumlah) as jumlah')
                ->first();
        return view('widgets.anggaran.realisasi_anggaran', [
            'config' => $this->config,
            'anggaran' => $anggaran
        ]);
    }
}
