<?php

namespace App\Widgets\Anggaran;

use Arrilot\Widgets\AbstractWidget;
use Modules\Anggaran\Entities\Ditem;

class RealisasiGiat extends AbstractWidget
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
        $giat = Ditem::groupBy(['kddept', 'kdunit', 'kdprogram', 'kdgiat'])
            ->selectRaw('kddept, kdunit, kdprogram, kdgiat, sum(jumlah) as jumlah')
            ->orderBy('kdprogram', 'asc')
            ->orderBy('kdgiat', 'asc')
            ->get();
        return view('widgets.anggaran.realisasi_giat', [
            'config' => $this->config,
            'giat' => $giat
        ]);
    }
}
