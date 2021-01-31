<?php

namespace Modules\Anggaran\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Anggaran\Entities\Program;
use Modules\Anggaran\Entities\Dkro;
use Modules\Anggaran\Entities\Ditem;
use Illuminate\Support\Facades\DB;

class DipaController extends Controller
{
    public function __invoke()
    {
        $kro = Dkro::first();
        $ditem = Ditem::groupBy(['kdsatker'])
                ->selectRaw('kdsatker, sum(jumlah) as jumlah')
                ->first();
        $prog = Program::with('giat')->paginate(1);
        return view('anggaran::dipa', compact('ditem', 'kro', 'prog'));
    }
}
