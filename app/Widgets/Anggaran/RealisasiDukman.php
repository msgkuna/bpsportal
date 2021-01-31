<?php

namespace App\Widgets\Anggaran;

use Arrilot\Widgets\AbstractWidget;
use Modules\Anggaran\Entities\Ditem;

class RealisasiDukman extends AbstractWidget
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
        $dukman = Ditem::where('kdprogram', 'WA')
                ->groupBy(['kddept', 'kdunit', 'kdprogram'])
                ->selectRaw('kddept, kdunit, kdprogram, sum(jumlah) as jumlah')
                ->first();
        return view('widgets.anggaran.realisasi_dukman', [
            'config' => $this->config,
            'dukman' => $dukman
        ]);
    }
}
