<?php

namespace App\Widgets\Anggaran;

use Arrilot\Widgets\AbstractWidget;
use Modules\Anggaran\Entities\Ditem;

class RealisasiPpis extends AbstractWidget
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
        $ppis = Ditem::where('kdprogram', 'GG')
                ->groupBy(['kddept', 'kdunit', 'kdprogram'])
                ->selectRaw('kddept, kdunit, kdprogram, sum(jumlah) as jumlah')
                ->first();
        return view('widgets.anggaran.realisasi_ppis', [
            'config' => $this->config,
            'ppis' => $ppis
        ]);
    }
}
