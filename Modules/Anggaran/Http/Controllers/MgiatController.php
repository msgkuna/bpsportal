<?php
namespace Modules\Anggaran\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Modules\Anggaran\Entities\Giat;

class MgiatController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __invoke()
    {
        $giat = Giat::orderBy('kddept', 'asc')
            ->orderBy('kdunit', 'asc')
            ->orderBy('kdprogram', 'asc')
            ->orderBy('kdgiat', 'asc')
            ->paginate(20);
        return view('anggaran::master.giat', compact('giat'));
    }
}
