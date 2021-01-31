<?php
namespace Modules\Anggaran\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Modules\Anggaran\Entities\Satker;

class MsatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $satker = Satker::orderBy('kddept', 'asc')
            ->orderBy('kdunit', 'asc')
            ->orderBy('kdlokasi', 'asc')
            ->orderBy('kdkabkota', 'asc')
            ->paginate(20);
        return view('anggaran::master.satker', compact('satker'));
    }
}
