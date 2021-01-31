<?php
namespace Modules\Anggaran\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Modules\Anggaran\Entities\Kabkota;

class MkabkotaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $kabkota = Kabkota::orderBy('kdlokasi', 'asc')
            ->orderBy('kdkabkota', 'asc')
            ->paginate(20);
        return view('anggaran::master.kabkota', compact('kabkota'));
    }
}
