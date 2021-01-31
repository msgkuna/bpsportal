<?php
namespace Modules\Anggaran\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Modules\Anggaran\Entities\Unit;

class MunitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $unit = Unit::orderBy('kddept', 'asc')
            ->orderBy('kdunit', 'asc')
            ->paginate(20);
        return view('anggaran::master.unit', compact('unit'));
    }
}
