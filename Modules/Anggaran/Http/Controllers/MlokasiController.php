<?php
namespace Modules\Anggaran\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Modules\Anggaran\Entities\Lokasi;

class MlokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $lokasi = Lokasi::orderBy('kdlokasi', 'asc')
            ->paginate(20);
        return view('anggaran::master.lokasi', compact('lokasi'));
    }
}
